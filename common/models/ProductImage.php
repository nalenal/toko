<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image; 

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $link
 * @property string $is_main
 */
class ProductImage extends \yii\db\ActiveRecord
{

    /**
     * @var Uploaded$imageFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         //   [['product_id', 'link', 'is_main'], 'required'],
            [['product_id', 'is_main'], 'integer'],
            [['link'], 'string', 'max' => 100],
         //ganti di common/models/UploadForm   [['imageFile'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'link' => 'Link',
            'is_main' => 'Gambar Utama',
        ];
    }


    /*
    *
    */
    /*
    public function upload($id)
    {
        if($this->validate()) {
            $dirSaving = Yii::getAlias('@frontend/web/uploads').'/'.$id;
            //mengecek keberadaan direktori  
            if((!file_exists($dirSaving))&&(!is_dir($dirSaving)))    
            {    
                mkdir ($dirSaving, 0777);         
            }
            $imageName = $this->imageFile->baseName;
            $imageExtension = $this->imageFile->extension;
            $this->imageFile->saveAs($dirSaving.'/'. $imageName . '.' . $imageExtension );

            Image::thumbnail($dirSaving.'/'. $imageName . '.' . $imageExtension , 130, 110)
                    ->save( $dirSaving.'/thumb-'. $imageName . '.' . $imageExtension, ['quality' => 60]);

            return true;
        }
        else {
            return false;
        }

    }
    */
    public function getUrl($product_id)
    {
        $imageUrl = Yii::getAlias('@frontendWebroot/uploads').'/'.$product_id;
        return $imageUrl;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
