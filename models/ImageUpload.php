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
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);

            $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

            $file->saveAs($this->getBasePath() . $filename);

            return $filename;
        }
    }

    public function deleteCurrentImage($currentImage)
    {
        if (file_exists($this->getBasePath() . $currentImage) && is_file($this->getBasePath() . $currentImage)) 
        {
            unlink($this->getBasePath() . $currentImage);
        }
    }

    private function getBasePath()
    {
        return 'C:\\xampp\\htdocs\\blog\\web\\uploads\\';
    }
}
