<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-index">

    <?php // $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($modelForm, 'imageFile')->fileInput() ?>

    <button class="btn btn-primary">Upload</button>

    <?php ActiveForm::end(); ?>
    <?php /// ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var $model common\models\Image */
                //    return Html::img($model->getUrl());
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>
