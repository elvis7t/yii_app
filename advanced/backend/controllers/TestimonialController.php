<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use backend\models\File;
use backend\models\Project;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\models\Testimonial;
use yii\web\NotFoundHttpException;
use backend\models\TestimonialSearch;

/**
 * TestimonialController implements the CRUD actions for Testimonial model.
 */
class TestimonialController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],                    
                ],
            ],
        ];
    }

    /**
     * Lists all Testimonial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestimonialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'projects' => $this->loadProjects(),
        ]);
    }

    /**
     * Displays a single Testimonial model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Testimonial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimonial();
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                $model->loadUploadedImageFile();

                if ($model->saveImage() && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->project_id = Yii::$app->request->get('project_id');
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'projects' => $this->loadProjects(),
        ]);
    }

    /**
     * Updates an existing Testimonial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
            $model->loadUploadedImageFile();
            if ($model->saveImage() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'projects' => $this->loadProjects(),
        ]);
    }

    /**
     * Deletes an existing Testimonial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteCustumerImage()
    {

        $file = File::findOne(Yii::$app->request->post('key'));

        if ($file->delete()) {
            return json::encode(null);
        }
        return Json::encode(['error' => true]);
    }

    /**
     * Finds the Testimonial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Testimonial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimonial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    private function loadProjects()
    {
        return ArrayHelper::map(Project::find()->asArray()->all(), 'id', 'name');
    }
}
