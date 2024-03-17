<?php

namespace backend\models;

use Yii;
use yii\db\Exception;
use backend\models\Testimonial;
use backend\models\ProjectImage;

use backend\models\ProjectQuery;
use function PHPUnit\Framework\throwException;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $tech_stach
 * @property string $description
 * @property int $start_date
 * @property int|null $end_date
 * @property ProjectImage[] $images
 * @property Testimonial $testimonials
 */
class Project extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tech_stach', 'description', 'start_date', 'end_date'], 'required'],
            [['tech_stach', 'description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'tech_stach' => Yii::t('app', 'Tech Stach'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    public function getImages()
    {
        return $this->hasMany(ProjectImage::class, ['project_id' => 'id']);
    }

    public function getTestmonials()
    {
        return $this->hasMany(Testimonial::class, ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }

    public function saveImage()
    {
        Yii::$app->db->transaction(function ($db) {
            $file = new File();
            $file->name = uniqid(true) . '.' . $this->imageFile->extension;
            $file->mime_type = mime_content_type($this->imageFile->tempName);
            $file->base_url = Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->params['uploads']['projects']);
            if (!$file->save()) {
                throw new Exception("Error Processing Request", $file->errors());
            }

            $projectImage = new ProjectImage();
            $projectImage->project_id = $this->id;
            $projectImage->file_id = $file->id;
            if (!$projectImage->save()) {
                throw new Exception("Error Processing Request", $projectImage->errors());
            }
            if (!$this->imageFile->saveAs(Yii::$app->params['uploads']['projects'] . '/' . $file->name)) {
                throw new Exception("Error Processing Request", $file->errors());
                $db->transaction->rollBack();
            }
        });
    }

    public function hasImages()
    {
        return count($this->images) > 0;
    }
}
