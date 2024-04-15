<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

echo DataTables::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'project_id',
            'format' => 'raw',
            'filter' => $projects,
            'visible' => $isProjectColumnVisible,
            'value' => function ($model) {
                return Html::a($model->project->name, ['/project/view', 'id' => $model->project_id]);
            }
        ],
        [
            'attribute' => 'custumer_image_id',
            'format' => 'raw',
            'value' => function ($model) {
                if (!$model->custumerImage) {
                    return null;
                }
                return Html::img($model->custumerImage->absoluteUrl(), [
                    'alt' => $model->custumer_name,
                    'height' => 75,
                ]);
            }
        ],
        'title',
        'custumer_name',
        //'review:ntext',
        'rating',

        [
            'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
            'controller' => 'testimonial',
        ],
    ],
    'summaryOptions' => ['class' => 'summary mb-2'],
    'pager' => [
        'class' => 'yii\bootstrap4\LinkPager',
    ]
]);
