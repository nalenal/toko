<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-image-form">
	<?php print_r($modelForm);
		?>
    <?php // $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($modelForm, 'imageFile')->fileInput() ?>

    <button class="btn btn-primary">Upload</button>

    <?php ActiveForm::end(); ?>

</div>
