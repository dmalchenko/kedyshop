<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUpload;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(\backend\models\Category::getCategoryList()) ?>

    <?= $form->field($model, 'sex')->dropDownList(['men' => 'мужская', 'women' => 'женская']) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

    <?php

    $images = $model->images;
    if ($images && is_array($images)) {
            $result = '';
            if ($images) {
                foreach ($images as $image) {
                    $url = Url::to($image);
                    $result .= Html::img(Yii::getAlias('@frontendUrl' . $url), ['height' => 100]);
                }
            }
            echo $result;
        }
    ?>

    <div class="form-group" style="margin-top: 20px">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
