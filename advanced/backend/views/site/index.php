<?php

use common\models\User;
use backend\models\File;
use backend\models\Project;
use backend\models\Testimonial;
use backend\models\ProjectImage;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Users',
                'number' => User::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Files',
                'number' => File::find()->count(),
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Images',
                'number' => ProjectImage::find()->count(),
                'icon' => 'far fa-image',
            ]) ?>
        </div>
        
    </div>

    <div class="row">
    
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Project::find()->count(),
                'text' => 'Projects',
                'icon' => 'fas fa-tasks',
                'linkText' => 'View All',
                'linkUrl' => '/project/index',
            ]) ?>
        </div>        
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => Testimonial::find()->count(),
                'text' => 'Testimonials',
                'icon' => 'fas fa-comment-dots',
                'linkText' => 'View All',
                'linkUrl' => '/testimonial/index',
            ]) ?>
        </div>        
    </div>
</div>