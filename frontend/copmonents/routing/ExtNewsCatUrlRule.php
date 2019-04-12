<?php
namespace app\copmonents\routing;


use snapget\news\models\News;
use snapget\news\models\NewsCategory;
use Yii;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class ExtNewsCatUrlRule extends BaseObject implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
     //   yii::error(['ext seo',$route]);
        if ($route === 'news/index') { // категория новостей
//            yii::error([$route, $params]);
            yii::error(['ext seo',$params]);
            if (isset($params['id'])) {
                $colect=[];
                $current_cat = NewsCategory::find()->where(['id'=>$params['id']])->one();
                if ($current_cat){
                    $colect[]=$current_cat->slug;
                    foreach ($current_cat->parents(1111)->all() as $item) {
                        $colect[]=$item->slug;
                    }
                    $p=$params;
                    unset($p['id']);
                    if(!empty($p))  return  'news/'. implode('/',array_reverse( $colect))."?".http_build_query($p)   ;
                    else  return  'news/'. implode('/',array_reverse( $colect));
                }else{
                    return false;
                }
            }
        }
        return false;  // данное правило не применимо
    }


    /**
     * ОПИРАЮСЬ НА ТО ЧТО МОДУЛЬ ДЛЯ СЛАГОВ ДАЕТ УНИКАЛЬНЫЕ УРЛЫ,поетому беру только последнеий слаг и ищу ид категории
     * @param \yii\web\UrlManager $manager
     * @param \yii\web\Request $request
     * @return array|bool
     * @throws \yii\base\InvalidConfigException
     */

    public function parseRequest($manager, $request)
    {

        // если начинается на news

        $pathInfo = $request->getPathInfo();
     //   yii::error($pathInfo);
        if (!$pathInfo) {
            return false;
        }
        $slugs_list= explode('/',$pathInfo);
        $last_slug=end($slugs_list);
        $current_cat = NewsCategory::find()->where(['slug'=>$last_slug])->one();
        if ($current_cat){ //ищем цепочку родителей
           $parents= $current_cat->isRoot();
            yii::error($parents);
//            $parents= $current_cat->isLeaf();
//            yii::error($parents);
            return   ['news/index', ['id' => $current_cat->id]];
        }
        return false;  // данное правило не применимо
    }

}