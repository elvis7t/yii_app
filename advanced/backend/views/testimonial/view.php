<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonial */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',                            
                            [
                                'attribute' => 'project_id',
                                'format' => 'raw',
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
                                        'height' => 200,
                                        'width' => 200,
                                    ]);
                                }
                            ],                            
                            'title',
                            'custumer_name',
                            'review:ntext',
                            'rating',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>