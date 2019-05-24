<?php
namespace common\models;

use common\models\helpers\ConstantsHelper;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use komer45\balance\models\Score;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function afterSave($p1, $p2)
    {
        $findUser = Score::find()->where(['user_id' => $this->getId()])->one();
        if (!$findUser){
            $userBalance = new Score;
            $userBalance->user_id = $this->getId();
            $userBalance->balance = 0;

            if($userBalance->validate()){
                return $userBalance->save();
            } else die('Uh-oh, somethings went wrong!');
        }
    }

    public function getUserbalance()
    {
        return $this->hasOne(Score::className(), ['user_id' =>'id']);
    }

    public function getNewprofit()
    {
      $b=  $this->userbalance->balance;
      $baseCalc= ConstantsHelper::DEFAULT_USER_CALCULATE_BALANCE_FOR_LEVEL;
      return ($b*100/$baseCalc)-100;

    }
    public function getNewprofitPeriod($period)
    {
       // todo  пока за основу берем баланс невозомжно высчтитать профит за период.
        //yii::error(['ji'=>$this->userbalance->id]);
        //SELECT * FROM `balance_transaction` WHERE `id` = ( SELECT max(r2.id) FROM balance_transaction r2 WHERE r2.balance_id = 68 and r2.date < '2019-04-02 00:00:00' );
      //  $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) * 100 as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id";

//        $sql="SELECT * FROM `balance_transaction` WHERE `id` = ( SELECT max(r2.id) FROM balance_transaction r2 WHERE r2.balance_id =  :u_balance_id and r2.date < '2019-04-02 00:00:00' )";
//        $result =   yii::$app->db->createCommand($sql, [
//            ':u_balance_id' => $this->userbalance->id,
//        ])->queryOne();
        $b=  $this->userbalance->balance;
        $baseCalc= ConstantsHelper::DEFAULT_USER_CALCULATE_BALANCE_FOR_LEVEL;
        return ($b*100/$baseCalc)-100;

    }




    public function isSubscriber(){
       // 'asd', 42, 44,
//        yii::error(['asd',Yii::$app->user->id,$this->id]);
       // $u=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$this->id])->one();
        $u=Subscriber::find()->where(['user_own_id'=>$this->id,'user_sub_id'=>Yii::$app->user->id])->one();
          if($u){
//              die();
           //if(Subscriber::find()->where(['user_own_id'=>$this->id,'user_sub_id'=>Yii::$app->user->id])->one()){
               return true;
           }
               return false;

    }

    public function isSubscriberfront(){
        // 'asd', 42, 44,
//        yii::error(['asd',Yii::$app->user->id,$this->id]);
         $u=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$this->id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->one();
        // $u=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$this->id])->one();
       // $u=Subscriber::find()->where(['user_own_id'=>$this->id,'user_sub_id'=>Yii::$app->user->id])->one();
        if($u){
//              die();
            //if(Subscriber::find()->where(['user_own_id'=>$this->id,'user_sub_id'=>Yii::$app->user->id])->one()){
            return true;
        }
        return false;

    }

    public function isSubscriberMailfront(){
        $u=SubscriberMail::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$this->id])->one();
        if($u){
            return true;
        }
        return false;
    }


    /**
     * количество ПОДПИСОК
     * @return int|string
     */
    public function getCountSubscriberMail(){
        return SubscriberMail::find()->where(['user_own_id'=>$this->id])->count();
    }

    /**
     * количество ПОДПИСЧИКОВ
     * @return int|string
     */
    public function getCountSubscribersMail(){
        yii::error($this->id);
        return SubscriberMail::find()->where(['user_sub_id'=>$this->id])->count();
    }

    /**
     * количество cтавок
     * @return int|string
     */
    public function getCountWagers(){
        return Wager::find()->where(['user_id'=>$this->id])->count();
    }


    //----------- access subscribe for account controller

    /**
     * открыто мной
     * @param $u_id
     * @return array|ActiveRecord[]
     */
    public function getOpenMe($u_id){
       return Subscriber::find()->where(['user_own_id'=>$u_id])->all();
    }

    //----------- access subscribe for account controller
    public function getCountOpenMe($u_id){
        return Subscriber::find()->where(['user_own_id'=>$u_id])->count();
    }

    /**
     * открыто для меня
     * @param $u_id
     * @return array|ActiveRecord[]
     */
    public function getOpenedForMe($u_id){
        return Subscriber::find()->where(['user_sub_id'=>$u_id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->all();
    }


    //----------- access subscribe for account controller
    public function getCountOpenedForMe($u_id){
//        yii::error($u_id);
        return Subscriber::find()->where(['user_sub_id'=>$u_id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->count();
    }


    public function check_openly_in_response($u_id)
    {
        return Subscriber::find()->where(['user_own_id'=>$this->id,'user_sub_id'=>$u_id])->one();
    }



    public function getImageurl()
    {

        $avaterPlaceholde='/images/avatar-placeholder.svg';
//      $r=  $this->hasOne(UserAvatars::className(), ['id' => 'uid']);
        if($this->imguse){  return  $this->imguse->avatar; }
        else return  $avaterPlaceholde;

    }

    // потом после переверски подставить  getImageurl
    public function getImageurlForPanel()
    {
        $avaterPlaceholde='/images/avatar-placeholder.svg';
        return $avaterPlaceholde;
//      $r=  $this->hasOne(UserAvatars::className(), ['id' => 'uid']);
        if($this->imguse){  return  $this->imguse->avatar; }
        else return  $avaterPlaceholde;

    }


    public function getUserinfo(){
        return    $this->hasOne(UserAttachmentInfo::className(), ['uid' => 'id']);
//        $userInfo=$this->hasOne(UserAttachmentInfo::className(), ['uid' => 'id']);
//        if($userInfo) var_dump($userInfo); die();  return $userInfo;
//        return new UserAttachmentInfo();
//        return    $this->hasOne(UserAttachmentInfo::className(), ['uid' => 'id']);
    }




    public function getImguse(){
     //   return    $this->hasOne(UserAvatars::className(), ['uid' => 'id']);
        $userAvatars=$this->hasOne(UserAvatars::className(), ['uid' => 'id'])->one();


        if(!$userAvatars){

            $userAvatars=new UserAvatars();
            $userAvatars->avatar=ConstantsHelper::DEFAULT_USER_AVATAR_IMAGE;
            yii::error($userAvatars->avatar);
        }

        return $userAvatars;

    }


    /**
     * подписки
     * @param $u_id
     * @return array|ActiveRecord[]
     */
    public function getMySubscriptions($u_id){

        return SubscriberMail::find()->where(['user_own_id'=>$u_id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->all();


    }


    /**
     * подписчики
     * @param $u_id
     * @return array|ActiveRecord[]
     */
    public function getMySubscribers($u_id){

        return SubscriberMail::find()->where(['user_sub_id'=>$u_id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->all();
        //return SubscriberMail::find()->where(['user_sub_id'=>$u_id])->andWhere(['>','expired_at',date('Y-m-d H:i:s')])->all();


    }








}
