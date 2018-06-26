<?php

namespace backend\controllers;

use backend\models\Item;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\UploadedFile;

class MediaController extends Controller
{
    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionUpload()
    {
        $model = new Item();

        $imageFile = UploadedFile::getInstance($model, 'image');

        $directory = Yii::getAlias('@frontend/web/images/content/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                return Json::encode([
                    'name' => $fileName,
                    'img' => $path,
                ]);
            }
        }

        return '';
    }
}