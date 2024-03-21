<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\JqueryAsset;
use kartik\file\FileInput;
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

    <?= $form->field($model, 'imageFiles')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*', 'multiple' => true],
        'pluginOptions' => [
            'initialPreview' => $model->imageAbsoluteUrls(),
            'initialPreviewAsData' => true,
            'showUpload' => false,
            'showRemove' => true,
            'dropZoneEnabled' => true,
            'deleteUrl' => Url::to('/project/delete-project-image'),
            'initialPreviewConfig' => $model->imageConfigs(),
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>