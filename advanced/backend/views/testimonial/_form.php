<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;

/** @var $this yii\web\View */
/** @var $model backend\models\Testimonial */
/** @var $form yii\bootstrap4\ActiveForm */
/** @var array $projects */

?>

<div class="testimonial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList($projects, ['prompt' => Yii::t('app', 'Select Project')]) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreview' => $model->imageAbsoluteUrls(),
            'initialPreviewAsData' => true,
            'showUpload' => false,
            'showRemove' => true,
            'dropZoneEnabled' => true,
            'deleteUrl' => Url::to(['/testimonial/delete-custumer-image']),
            'initialPreviewConfig' => $model->imageConfig(),
        ]
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custumer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
        'pluginOptions' => ['step' => 1]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>