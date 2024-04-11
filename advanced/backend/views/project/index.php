<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use common\helpers\DateHelper;
use nullref\datatable\DataTable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">

                    </div>
                    <?php Pjax::begin(); ?>
                    <?= DataTable::widget([
                        'dataProvider' => $dataProvider,
                        'scrollY' => '200px',
                        'scrollCollapse' => false,
                        'paging' => true,
                        'tableOptions' => [
                            'class' => 'table table-responsive-sm table-striped  table-hover',
                        ],
                        'columns' => [
                            'id',
                            'name',
                            'tech_stach',
                            [
                                'attribute' => 'start_date'
                            ],
                            [
                                'attribute' => 'end_date',
                                'value' => function ($model) {
                                    return DateHelper::brDate($model->end_date);
                                }, 
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/project/view/'],
                                'label' => '<i class="fas fa-eye"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/project/delete'],
                                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post'],
                                'label' => '<i class="fas fa-trash-alt"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/project/update'],
                                'linkOptions' => ['data-method' => 'post'],
                                'label' => '<i class="fas fa-edit"></i>',
                            ],
                        ]
                    ]); ?>
                    <?php Pjax::end(); ?>
                    <div class="col-md-12">
                        <?= Html::a(Yii::t('app', 'Create Project'), [Url::to(['project/create'])], ['class' => 'btn btn-success']) ?>
                    </div>

                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>