<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use kartik\editors\Summernote;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_stach')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?php foreach ($model->images as $image) : ?>
        <?= Html::img($image->file->absoluteUrl(), [
            'alt' => 'yttt',
            'height' => 200

        ]) ?>
    <?php endforeach ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
        'language' => 'pt-BR',
        'dateFormat' => 'dd-MM-yyyy'
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::class, [
        'language' => 'pt-BR',
        'dateFormat' => 'dd-MM-yyyy',
        'options' => ['readonly' => true]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>