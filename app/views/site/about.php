<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Helpe Center', 'url' => ['help/index']];
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
            <?= Html::a('About', Url::to(['site/about'])) ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
