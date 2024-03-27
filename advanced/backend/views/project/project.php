<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'list-group-item'],
        'itemView' => '_project',
    ])

    ?>

</div>