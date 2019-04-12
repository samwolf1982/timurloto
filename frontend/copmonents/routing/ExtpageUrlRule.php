<?php
namespace app\components\routing;

use common\models\Categorysimple;
use common\models\Page;
use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class ExtpageUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {

//        yii::error($route);
        if ($route === 'page/view') {
//            yii::error([$route, $params]);
            if (isset($params['id'])) {
                $colect=[];
                $current_cat = Page::find()->where(['id'=>$params['id']])->one();
//                yii::error([$route, $params]);
                if ($current_cat){
                    $colect[]=$current_cat->slug;

//                    $ck=$current_cat;
//                    // дерево родителей
//                    for ($i=0;$i<=10;$i++){
//                       $p= $ck->parent;
//                       if ($p){
//                           $colect[]=$p->slug;
//                           $ck=$p;
//                       }else{
//                           break;
//                       }
//                    }
                    return  implode('/',array_reverse( $colect));
                }else{
                    return false;
                }

            }
        }
        return false;  // данное правило не применимо
    }


    /**
     * ОПИРАЮСЬ НА ТО ЧТО МОДУЛЬ ДЛЯ СЛАГОВ ДАЕТ УНИКАЛЬНЫЕ УРЛЫ,поетому беру только последнеий слаг и ищу ид Page
     * @param \yii\web\UrlManager $manager
     * @param \yii\web\Request $request
     * @return array|bool
     * @throws \yii\base\InvalidConfigException
     */
    public function parseRequest($manager, $request)
    {

        $pathInfo = $request->getPathInfo();
//        yii::error($pathInfo);
        if (!$pathInfo) {
            return false;
        }
       $slugs_list= explode('/',$pathInfo);
       $last_slug=end($slugs_list);
        $current_cat = Page::find()->where(['slug'=>$last_slug])->one();
        if ($current_cat){
//            yii::error($current_cat);
         return   ['page/view', ['id' => $current_cat->id]];
        }
        return false;  // данное правило не применимо
    }
}