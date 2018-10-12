<?php
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Форма</h1>



        <?php $form = ActiveForm::begin(); ?>


        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php
            // Normal parent select
            $items = ArrayHelper::map($type_game,'id','name');
            echo $form->field($model, 'name')->dropDownList($items , ['prompt'=>'Выберите вид спорта','id'=>'cat-id']);

            ?>
        </div>
        <div class="col-sm-4"></div>
<div class="clearfix"></div>

        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php

            // Dependent Dropdown
            echo $form->field($model_two, 'name')->widget(DepDrop::classname(), [
                'options' => ['id'=>'typegames'],
                'pluginOptions'=>[
                    'name'=>'name',
                    'depends'=>['cat-id'],
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/games/leveltwo'])
                ]
            ]);

            ?>
        </div>
        <div class="col-sm-3"></div>
        <div class="clearfix"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <?php
            // Child # 2
            echo $form->field($model_three, 'id')->widget(DepDrop::classname(), [
                'pluginOptions'=>[
                    'depends'=>[ 'typegames'],
                    'placeholder'=>'Select...',
                    'url'=>Url::to(['/games/levelthree'])
                ]
            ])->label('Список игр');

            ?>
        </div>
        <div class="col-sm-2"></div>
        <div class="clearfix"></div>


        <?php ActiveForm::end(); ?>

    </div>

    <div class="body-content">


        <div class="row">
            <div class="col-lg-12">

                <h3 class="text-center">Правила</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate delectus minima soluta voluptates. Ab ad, animi aspernatur atque cum debitis deleniti dolor earum expedita facilis incidunt iste iusto laborum reprehenderit!
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam corporis delectus deleniti earum et ipsum laudantium nulla odio quaerat quidem! Alias animi iure laboriosam mollitia pariatur praesentium quos recusandae suscipit!
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
