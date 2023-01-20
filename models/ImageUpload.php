<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

use yii\base\Model;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $basePath = 'C:\\xampp\\htdocs\\blog\\web\\uploads\\';
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);

            $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

            $file->saveAs($basePath . $filename);
            //$file->saveAs(Yii::getAlias('@web') . '/web/uploads/' . $file->name);
            return $filename;
        }
    }

    public function deleteCurrentImage($currentImage)
    {
        $basePath = 'C:\\xampp\\htdocs\\blog\\web\\uploads\\';
        if (file_exists($basePath . $currentImage) && is_file($basePath . $currentImage)) 
        {
            unlink($basePath . $currentImage);
        }
    }
}