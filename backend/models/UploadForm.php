<?php


namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image; 


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload($id)
    {
        if($this->validate()) {
            $dirSaving = Yii::getAlias('@frontend/web/uploads').'/'.$id;
            //mengecek keberadaan direktori  
            if((!file_exists($dirSaving))&&(!is_dir($dirSaving)))    
            {    
                mkdir ($dirSaving, 0777);         
            }
        //    $imageName = $this->imageFile->baseName.'-'.time();
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
}