<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = Yii::$app->name . ' My Portifolio';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <?= Html::img('@web/images/photo.png', [
            'alt' => Yii::t('app', 'My Profile Photo'),
            'style' => " width: 100%; max-width: 300px;"
        ]) ?>
        <h1 class="display-4"><?= Yii::t('app', "Hi, my name is Elvis") ?></h1>

        <p class="lead">Passionate for developing Yii 2 website and web applications!.</p>

        <p>
            <?= Html::a(Yii::t('app', 'See My work'), ['/project'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

</div>