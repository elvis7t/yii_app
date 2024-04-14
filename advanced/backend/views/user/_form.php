<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(['10' => 'Ativo', '9' => 'Inativo'])->label("Active")->error() ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Jhon Doe', 'required' => true])->label("Name")->error(); ?>
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'jhondoe', 'required' => true])->label("Userame")->error(); ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'name@domain.com'])->label("E-mail")->error() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>