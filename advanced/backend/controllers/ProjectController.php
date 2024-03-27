<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\UploadedFile;
use backend\models\Project;
use yii\filters\VerbFilter;
use backend\models\ProjectImage;
use backend\models\ProjectSearch;
use yii\web\NotFoundHttpException;
use backend\models\TestimonialSearch;
use yii\helpers\ArrayHelper;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
                    'delete-project-image' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionProject()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('project', [
            'model' => Project::find()->all(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new TestimonialSearch();
        $searchModel->project_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,    
            'projects' => ArrayHelper::map(Project::find()->all(), 'id', 'name'),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        if ($this->request->isPost) {

            if ($model->load(Yii::$app->request->post())) {
                $model->loadUploadImageFiles();
                if (!empty($model->start_date)) {
                    $model->start_date = date('Y-m-d H:i:s', strtotime($model->start_date));
                }

                if (!empty($model->end_date)) {
                    $model->end_date = date('Y-m-d H:i:s', strtotime($model->end_date));
                }

                if ($model->save()) {
                    $model->saveImages();
                    Yii::$app->session->setFlash('success', 'Sucessuly saved');
                    //  return $this->redirect(['index']);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->loadUploadImageFiles();

            if (!empty($model->start_date)) {
                $model->start_date = date('Y-m-d H:i:s', strtotime($model->start_date));
            }
            if (!empty($model->end_date)) {

                $model->end_date = date('Y-m-d H:i:s', strtotime($model->end_date));
            }
            if ($model->save()) {
                $model->saveImages();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Project model.
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

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDeleteProjectImage()
    {
        $image = ProjectImage::findOne($this->request->post('key'));
        if (!$image) {
            throw new NotFoundHttpException();
        }

        if ($image->file->delete()) {
            return Json::encode(null);
        }

        return Json::encode(['error' => true]);
    }
}
