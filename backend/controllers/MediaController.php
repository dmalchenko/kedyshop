<?php

namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\UploadedFile;
use backend\models\Item;

class MediaController extends Controller
{
    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionUpload()
    {
        $model = new Item();

        $imageFile = UploadedFile::getInstance($model, 'image_file');

        $directory = Yii::getAlias('@frontend/web/images/content/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                return Json::encode([
                    'name' => $fileName,
                ]);
            }
        }

        return '';
    }
}