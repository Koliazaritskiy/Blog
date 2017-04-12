<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2017
 * Time: 20:35
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\base\UploadFile;

class ImageUpload extends Model{


     public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions'=>'jpg,png']
        ];
    }


    public function uploadFile(  $file, $currentImage)
    {
        $this->image = $file;


        if ($this->validate())
        {

            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();

        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web').  'uploads/';
    }



    private function generateFilename()
    {
      return strtolower(md5(uniqid($this->image->baseName)) .'.'. $this->image->extension);
    }


    public function deleteCurrentImage($currentImage)
    {

        if ($this-> fileExist($currentImage))
        {
            unlink($this->getFolder(). $currentImage);
        }
    }



    public function fileExist($currentImage)
    {
        if (!empty($currentImage)&& $currentImage != null )
        {
            return file_exists($this->getFolder(). $currentImage);
        }
    }




    public function saveImage()
    {
        $filename = $this ->generateFilename();

        $this->image->saveAs($this->getFolder(). $filename);

        return $filename;


    }

}