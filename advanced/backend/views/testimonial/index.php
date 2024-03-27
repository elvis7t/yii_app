<?php

use yii\helpers\Html;

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
                    <?= $this->render('_gridview.php', [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                            'projects' => $projects,
                            'isProjectColumnVisible' => true,
                        ]
                    ); ?>
                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>