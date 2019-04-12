<?php
namespace app\components\routing;

use common\models\Categorysimple;
use dvizh\field\models\Category;
use dvizh\shop\models\Product;
use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class ExtprodUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {


        if ($route === 'product/index' || $route === 'product' ) {
//            yii::error([$route, $params]);
            if (isset($params['id'])) {
                $colect=[];
                $current_prod = Product::find()->where(['id'=>$params['id']])->one();
//                yii::error([$route, $params]);
                if ($current_prod){
                    $colect[]=$current_prod->slug;

                    $current_cat= Categorysimple::find()->where(['id'=>$current_prod->category_id])->one();
                    if ($current_cat){
                        $colect[]=$current_cat->slug;
                                            $ck=$current_cat;

                    // дерево родителей
                    for ($i=0;$i<=10;$i++){
                       $p= $ck->parent;
                       if ($p){
                           $colect[]=$p->slug;
                           $ck=$p;
                       }else{
                           break;
                       }
                    }
                    }

                    return  implode('/',array_reverse( $colect));
                }else{
                    return false;
                }

            }
        }
        return false;  // данное правило не применимо
    }



    /**
     * ОПИРАЮСЬ НА ТО ЧТО МОДУЛЬ ДЛЯ СЛАГОВ ДАЕТ УНИКАЛЬНЫЕ УРЛЫ,поетому беру только последнеий слаг и ищу ид продукта
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
        $current_cat = Product::find()->where(['slug'=>$last_slug])->one();
        if ($current_cat){
            yii::error($current_cat);
         return   ['product/index', ['id' => $current_cat->id]];
        }

        return false;  // данное правило не применимо
    }
}