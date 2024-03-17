<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'] = [['label' => $this->title]];
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
                            'name',
                            [
                                'label' => Yii::t('app', 'Image'),
                                'format' => 'raw',
                                'value' => function ($model) {

                                    if (!$model->hasImages()) {
                                        return null;
                                    }

                                    $imageHtml = '';
                                    foreach ($model->images as $image) {                                        
                                        $imageHtml .= Html::img($image->file->absoluteUrl(), [
                                            'alt' => 'Demostration',
                                            'height' => 200,
                                            'width' => 200,
                                            'class' => 'm-3 d-block '
                                        ]);
                                    }

                                    return $imageHtml;
                                },
                            ],
                            'tech_stach:raw',
                            'description:ntext',
                            'start_date',
                            'end_date',
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