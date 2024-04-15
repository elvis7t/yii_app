<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\bootstrap4\Carousel;
use kartik\rating\StarRating;
use common\helpers\DateHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = "Details";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['project/details']];
$this->params['breadcrumbs'] = [['label' => $this->title]];
YiiAsset::register($this);
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1><?= Html::encode($model->name) ?></h1>
    </div>

    <div class="d-flex justify-content-center bg-light border mb-3">
        <?= DateHelper::brDate($model->start_date) . ' ' . Yii::t('app', 'to') . ' ' . DateHelper::brDate($model->end_date); ?>
    </div>

    <?= Carousel::widget([
        'items' => $model->corouselImages(),
        'options' => ['class' => 'carousel slide', 'data-ride' => 'carousel'],
    ]);
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
    <div class="container">
        <div class="position-sticky">
            <div class="my-3">
                <?php foreach ($model->testimonials as $testimony) : ?>
                    <div class="row">
                        <div class="col-auto">
                        <?php
                        if ($testimony->custumerImage) {
                            echo Html::img($testimony->custumerImage->absoluteUrl(), ['class' => 'direct-chat-img img-circle img-bordered-sm']);
                        }
                        ?>
                        </div>
                        <a href="*" class="col mt-2">
                            <?= $testimony->custumer_name; ?>
                        </a>
                    </div>
                    <div class="row">

                        <?= StarRating::widget([
                            'name' => 'rating',
                            'value' => $testimony->rating,
                            'pluginOptions' => [
                                'displayOnly' => true,
                                'size' => 'sm',
                            ]
                        ]); ?>

                    </div>
                    <div class="row mt-2">
                        <div class="font-weight-bold">
                            <?= $testimony->title; ?>
                        </div>
                    </div>
                    <div class="row text-left">
                        <span class="align-baseline ">
                            <?= $testimony->review; ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>