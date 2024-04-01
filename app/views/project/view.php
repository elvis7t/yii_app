<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use app\helpers\DateHelper;
use yii\bootstrap5\Carousel;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\Project $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="p-2 bg-light border mb-3">
        <?= DateHelper::brDate($model->start_date) . ' ' . Yii::t('app', 'to') . ' ' . DateHelper::brDate($model->end_date); ?>
    </div>

    <?= Carousel::widget([
        'items' => $model->corouselImages(),
        'options' => ['class' => 'carousel slide', 'data-ride' => 'carousel'],
    ])
    ?>
    <div>
        <span class="font-weight-bold mt-4"><?= Yii::t('app', 'Tech stack'); ?></span>
        <?= $model->tech_stach; ?>
    </div>

    <div class="mt-2">
        <?= $model->description; ?>
    </div>
    <?php if ($model->testimonials) : ?>
        <h2 class="mt-4"><?= Yii::t('app', 'Testimonials'); ?></h2>
    <?php endif; ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => ''],
        'itemView' => '_testimonial',
        'layout' => "<div style='display:flex; flex-wrap: wrap;'>{items}</div>{pager}",
    ]); ?>

</div>