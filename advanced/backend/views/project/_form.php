<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\JqueryAsset;
use yii\bootstrap4\ActiveForm;

$this->registerJsFile('@web/js/projectForm.js', ['depends' => [JqueryAsset::class]]);

?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_stach')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
        'language' => 'pt-BR',
        'dateFormat' => 'dd-MM-yyyy'
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::class, [
        'language' => 'pt-BR',
        'dateFormat' => 'dd-MM-yyyy',
        'options' => ['readonly' => true]
    ]) ?>

    <?php foreach ($model->images as $image) : ?>
        <div id="project-form__image-container-<?= $image->id ?>" class="project-form__image-container">
            <?= Html::img($image->file->absoluteUrl(), [
                'alt' => 'yttt',
                'height' => 200,
                'width' => 300,
                'class' => 'm-3 d-block '
            ]) ?>

            <?= Html::button(Yii::t('app', 'Delete'), [
                'class' => 'btn btn-danger btn-delete-project',
                'data-project-image-id' => $image->id
            ]) ?>
            <div id="project-form__image-error-message-<?= $image->id ?>" class='text-danger'></div>
        </div>
    <?php endforeach; ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>