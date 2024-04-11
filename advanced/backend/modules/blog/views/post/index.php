<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\Pjax;
use nullref\datatable\DataTable;


/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

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
                            'title',
                            'created_at',
                            'updated_at',
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/blog/post/view/'],
                                'label' => '<i class="fas fa-eye"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/blog/post/delete'],
                                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post'],
                                'label' => '<i class="fas fa-trash-alt"></i>',
                            ],
                            [
                                'class' => 'nullref\datatable\LinkColumn',
                                'url' => ['/blog/post/update'],
                                'linkOptions' => ['data-method' => 'post'],
                                'label' => '<i class="fas fa-edit"></i>',
                            ],
                        ],

                    ]); ?>
                    <?php Pjax::end(); ?>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
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