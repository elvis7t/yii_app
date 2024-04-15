<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use nullref\datatable\DataTable;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
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
                            'username',
                            'email',
                            'status',                           
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/user/view/'],
                                'label' => '<i class="fas fa-eye"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/user/delete'],
                                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post'],
                                'label' => '<i class="fas fa-trash-alt"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/user/update'],
                                'linkOptions' => ['data-method' => 'post'],
                                'label' => '<i class="fas fa-edit"></i>',
                            ],
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>