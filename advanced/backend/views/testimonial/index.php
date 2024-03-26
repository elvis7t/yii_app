<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestimonialQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var \common\models\Project[] $projects */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a(Yii::t('app', 'Create Testimonial'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
                            [
                                'attribute' => 'project_id',
                                'format' => 'raw',
                                'filter' => $projects,
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

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
