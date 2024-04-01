<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<a href="<?= Url::to(['project/view', 'id' => $model->id]) ?>" style="text-decoration: none;    color: #000;">
    <?php
    $images = $model->imageAbsoluteUrls();
    if (count($images) > 0) {
        echo Html::img($images[0], ['style' => 'width: 100%; border-radius: 10px;height: 200px; object-fit: cover; margin-top:15px;']);
    }
    ?>
    <div class="d-flex">
        <?= $model->name; ?>
    </div>
</a>
