<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_main')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
