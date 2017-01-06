<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\ProductImage;

class ProdukController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
    *
    */
    public function actionDetail($produk = null) {
    	if ($produk !== null) {
 
    		$dataProduk = Product::find()->where(['slug' => $produk])->one();
            $gambarProduk = ProductImage::find()->where(['product_id' => $dataProduk->id])->orderBy('id DESC')->all();

        /*
    	print_r($dataProduk->attributes);
        foreach ($gambarProduk as $gp) {
            print_r($gp->attributes);
        }
        
    	exit();
       */
    	return $this->render('detail', [
    			'dataProduk' => $dataProduk,
                'gambarProduk' => $gambarProduk
    		]);
        }

    }

    

}
