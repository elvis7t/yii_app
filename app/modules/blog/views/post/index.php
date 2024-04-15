<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\modules\blog\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['style' => 'margin-botton:8px;'],
        'layout' => "<div class='row'>{items}</div>\n<div class='row'>{pager}</div>",
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->title), ['/blog/post/view/' . $model->slug]);
        },
    ]) ?>


</div>