<?php

return [

    'man' => 'site/index',
    'test' => 'site/test',
    'login' => 'site/login',
    'logout' => 'site/logout',
    '' => 'site/index',
    'user' => 'user/index',
    'user/create' => 'user/create',
    'user/view' => 'user/view',
    'user/update' => 'user/update',
    'user/delete' => 'user/delete',
    
    'project/index'=> 'project/index',   
    'project/create'=> 'project/create',
    'project/update' => 'project/update',
    'project/update/<id:\d+>' => 'project/update',
    'project/update' => 'project/update',
    'project/delete/<id:\d+>' => 'project/delete',
    'project/delete-project-image' => 'project/delete-project-image',
    'project/view' => 'project/view',
    'project/view<id:\d+>' => 'project/view',        
    'project/details/<id:\d+>' => 'project/details',
    'project/details' => 'project/details',
    'project/delete' => 'project/delete',
    
    
    'testimonial/index'=> 'testimonial/index',
    'testimonial/create'=> 'testimonial/create',
    'testimonial/update/<id:\d+>' => 'testimonial/update',
    'testimonial/update' => 'testimonial/update',
    'testimonial/delete/<id:\d+>' => 'testimonial/delete',
    'testimonial/delete' => 'testimonial/delete',
    'testimonial/delete-custumer-image' => 'testimonial/delete-custumer-image',
    'testimonial/view/<id:\d+>' => 'testimonial/view',
    'testimonial/view' => 'testimonial/view',
    
    'blog' => 'blog/default/index',
    'blog/post/index' => 'blog/post/index',
    'blog/post/create' => 'blog/post/create',
    'blog/post/view/<id:\d+>' => 'blog/post/view',
    'blog/post/view' => 'blog/post/view',
    'blog/post/update/<id:\d+>' => 'blog/post/update',
    'blog/post/update' => 'blog/post/update',
    'blog/post/delete/<id:\d+>' => 'blog/post/delete',
    'blog/post/delete' => 'blog/post/delete',
    
];
