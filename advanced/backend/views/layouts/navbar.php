<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::home() ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['/project/index']) ?>" class="nav-link" <?= Yii::$app->user->can('manageProjects') ? '' : 'hidden'?>>Project</a>
        </li>        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['/testimonial/index']) ?>" class="nav-link" <?= Yii::$app->user->can('manageTestimonials') ? '' : 'hidden'?>>Testimonial</a>
        </li>        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['/blog/post/index']) ?>" class="nav-link" <?= Yii::$app->user->can('manageBlog') ? '' : 'hidden'?>>Blog</a>
        </li>        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">            
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
       
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?= Yii::$app->user->identity->name ?></span>
            </a>            
        </li>
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->