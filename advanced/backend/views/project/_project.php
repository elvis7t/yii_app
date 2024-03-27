<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<a href="<?= Url::to(['project/view', 'id' => $model->id]) ?>">
    <?php
    $images = $model->imageAbsoluteUrls();
    if (count($images) > 0) {
        echo Html::img($images[0], ['class' => 'img-responsive']);
    }
    ?>
    <div class="d-flex">
        <?= $model->name; ?>
    </div>
</a>