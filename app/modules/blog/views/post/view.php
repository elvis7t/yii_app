<?php

use yii\helpers\Html;
use yii\web\YiiAsset;

/** @var yii\web\View $this */
/** @var app\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="bg-light border mb-3">
        <?= Yii::$app->formatter->asDatetime($model->created_at); ?>
    </div>
    <div style="font-size: 1.2rem; font-weight:300; margin-bottom: .5em;">
        <?= Yii::$app->formatter->asParagraphs($model->body); ?>
    </div>

</div>