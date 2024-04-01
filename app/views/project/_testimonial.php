<?php

use yii\helpers\Html;
use kartik\rating\StarRating;
?>
<div>
    <?php
    if ($model->custumerImage) {
        echo Html::img($model->custumerImage->absoluteUrl(), [
            'style' => 'height: 75px; width: 75px; border-radius: 50%; object-fit: cover; margin-top:15px;'
        ]);
    }
    ?>
    <?= $model->custumer_name; ?>
    <?= StarRating::widget([
        'name' => 'rating',
        'value' => $model->rating,
        'pluginOptions' => [
            'displayOnly' => true,
            'size' => 'sm',
        ]
    ]); ?>

    <div class="font-weight-bold">
        <?= $model->title; ?>
    </div>
    <span class="align-baseline ">
        <?= $model->review; ?>
    </span>

</div>