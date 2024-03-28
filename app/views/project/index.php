<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['style' => 'max-width: 300px;  margin-bottom: 32px; margin-right: 28px'],
        'itemView' => '_project',
        'layout' => "<div style='display:flex; flex-wrap: wrap;'>{items}</div>{pager}",
    ]) ?>


</div>
