<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\File;
use yii\web\UploadedFile;
use backend\models\Project;
use backend\models\Testimonial;
use yii\data\ActiveDataProvider;

/**
 * TestimonialQuery represents the model behind the search form of `backend\models\Testimonial`.
 */
class TestimonialQuery extends Testimonial
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;


    public function rules()
    {
        return [
            [['project_id', 'custumer_image_id', 'title', 'custumer_name', 'review', 'rating'], 'required'],
            [['project_id', 'custumer_image_id', 'rating'], 'integer'],
            [['review'], 'string'],
            [['title', 'custumer_name'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'custumer_image_id' => Yii::t('app', 'Custumer Image ID'),
            'title' => Yii::t('app', 'Title'),
            'custumer_name' => Yii::t('app', 'Custumer Name'),
            'review' => Yii::t('app', 'Review'),
            'rating' => Yii::t('app', 'Rating'),
            'imageFile' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[CUstumerImage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustumerImage()
    {
        return $this->hasOne(File::class, ['id' => 'custumer_Image_id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }

    public function loadUploadImageFile()
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
    }
    public function saveImage()
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $file = new File();
            $file->name = uniqid(true). '.'. $this->imageFile->extension;
            $file->path_url = Yii::$app->params['uploads']['testmonials'];
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
