<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<div class="span-12 thumbnail">
    <div class="col-xs-12">
        <?php
        $images = $model->productImages;
        if (isset($images[0])) {
            $url = $images[0]->getUrl($images[0]->product_id);
            echo Html::img($url.'/'.$images[0]->link);
        //    echo Html::img($images[0]->getUrl(), ['width' => '100%']);
        }
        ?>
    </div>
    <div class="caption col-xs-12">
        <h3><?= Html::encode($model->title) ?></h3>
        <?= Markdown::process($model->description) ?>

        <h4>
            <div class="pull-left">Rp. <?= number_format( $model->price, 0 , '' , '.' );?></div>
            <div class="pull-right"><?= Html::a('Beli Ini', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-success'])?></div>
        </h4>
    </div>
</div>