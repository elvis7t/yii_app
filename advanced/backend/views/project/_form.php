<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_stach')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
        'language' => 'Pt-br',
        'dateFormat' => 'dd--mm-yy',
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::class, [
        'language' => 'Pt-br',
        'dateFormat' => 'dd--mm-yy',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>