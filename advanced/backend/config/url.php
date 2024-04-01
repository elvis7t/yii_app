<?php

return [

    'man' => 'site/index',
    'test' => 'site/test',
    'login' => 'site/login',
    'logout' => 'site/logout',
    '' => 'site/index',
    'project/index'=> 'project/index',   
    'project/create'=> 'project/create',
    'project/update/<id:\d+>' => 'project/update',
    'project/delete/<id:\d+>' => 'project/delete',
    'project/delete-project-image' => 'project/delete-project-image',
    'project/view/<id:\d+>' => 'project/view',        
    'project/details/<id:\d+>' => 'project/details',
    
    'testimonial/index'=> 'testimonial/index',
    'testimonial/create'=> 'testimonial/create',
    'testimonial/update/<id:\d+>' => 'testimonial/update',
    'testimonial/delete/<id:\d+>' => 'testimonial/delete',
    'testimonial/delete-custumer-image' => 'testimonial/delete-custumer-image',
    'testimonial/view/<id:\d+>' => 'testimonial/view',
    
    'blog' => 'blog/default/index',
    'blog/post/index' => 'blog/post/index',
    'blog/post/create' => 'blog/post/create',
    'blog/post/view/<id:\d+>' => 'blog/post/view',
    'blog/post/update/<id:\d+>' => 'blog/post/update',
    'blog/post/delete/<id:\d+>' => 'blog/post/delete',
    
];
