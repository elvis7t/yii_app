<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="My Portifolio Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?= \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Projects',
                        'icon' => 'clipboard-list',
                        'items' => [
                            ['label' => 'Project Page', 'url' => ['/project/index'], 'active' => $this->context->route === 'project/index' || $this->context->route === 'project/update' || $this->context->route === 'project/view' || $this->context->route === 'project/details', 'iconStyle' => 'far'],
                            ['label' => 'Project Create', 'url' => ['/project/create'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('manageProjects'),
                    ],
                    [
                        'label' => 'Testimonials',
                        'icon' => 'comment-dots',
                        'items' => [
                            ['label' => 'Testimonial Page', 'url' => ['/testimonial/index'], 'active' => $this->context->route === 'testimonial/index' || $this->context->route === 'testimonial/update' || $this->context->route === 'testimonial/view', 'iconStyle' => 'far'],
                            ['label' => 'Testimonial Create', 'url' => ['/testimonial/create'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('manageTestimonials'),
                    ],
                    [
                        'label' => 'Blog',
                        'icon' => 'blog',
                        'items' => [
                            ['label' => 'Blog Page', 'url' => ['/blog/post/index'], 'active' => $this->context->route === 'blog/post/index' || $this->context->route === 'blog/post/update' || $this->context->route === 'blog/post/view', 'iconStyle' => 'far'],
                            ['label' => 'Post Create', 'url' => ['/blog/post/create'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('manageBlog'),
                    ],
                    [
                        'label' => 'Users',
                        'icon' => 'user',
                        'items' => [
                            ['label' => 'User Page', 'url' => ['/user/index'], 'active' => $this->context->route === 'user/index' || $this->context->route === 'user/update' || $this->context->route === 'user/view', 'iconStyle' => 'far'],
                            ['label' => 'User Create', 'url' => ['/user/create'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('manageBlog'),
                    ]
                   
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>