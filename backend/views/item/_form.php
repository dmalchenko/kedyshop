<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUpload;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>


    <label for="item-image">Upload</label>
    <?php
    try {
         echo FileUpload::widget([
            'model' => $model,
            'attribute' => 'image',
            'url' => ['media/upload', 'id' => $model->id],
            'options' => ['accept' => 'image/*'],
            'clientOptions' => [
                'maxFileSize' => 2000000
            ],
            'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                                      $( "#item-img" ).val(JSON.parse(data.result).name)
                                }',
                'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            ],
        ]);
    } catch (Exception $e) {
        echo $e->getMessage();
    } ?>
    <?= $form->field($model, 'image')->textInput(['disabled' => true, 'id' =>'item-img']) ?>


    <div class="form-group" style="margin-top: 20px">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
