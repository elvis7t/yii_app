<?php

use common\models\User;
use backend\models\File;
use backend\models\Project;
use backend\models\ProjectImage;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Users',
                'number' => User::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Files',
                'number' => File::find()->count(),
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Images',
                'number' => ProjectImage::find()->count(),
                'icon' => 'far fa-image',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Project',
                'number' => Project::find()->count(),
                'icon' => 'fa fa-tasks',
            ]) ?>
        </div>
    </div>

    <div class="row">
      
    </div>

    <div class="row">
        
    </div>
</div>