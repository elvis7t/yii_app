<?php

namespace app\models;

use Yii;
use Exception;
use app\models\File;
use yii\helpers\Html;
use yii\imagine\Image;
use yii\web\UploadedFile;
use app\models\Testimonial;
use app\models\ProjectImage;
use app\models\ProjectQuery;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $tech_stach
 * @property string $description
 * @property int $start_date
 * @property int|null $end_date
 */
class Project extends \yii\db\ActiveRecord
{
    public $imageFiles;
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
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10]
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

    public function getTestimonials()
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

    public function saveImages()
    {
        Yii::$app->db->transaction(function ($db) {
            /**
             * @var $db yii\db\Connection
             */

            foreach ($this->imageFiles as $imageFile) {
                /**
                 * @var $imageFile UploadedFile
                 */

                $file = new File();
                $file->name = uniqid(true) . '.' . $imageFile->extension;
                $file->path_url = Yii::$app->params['uploads']['projects'];
                $file->base_url = Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->params['uploads']['projects']);
                $file->mime_type = mime_content_type($imageFile->tempName);
                if (!$file->save()) {
                    throw new Exception("Error Processing Request", $file->errors());
                }

                $projectImage = new ProjectImage();
                $projectImage->project_id = $this->id;
                $projectImage->file_id = $file->id;
                $projectImage->save();

                $thumbnail = Image::thumbnail($imageFile->tempName, null, 1000);
                $didSave = $thumbnail->save($file->path_url . '/' . $file->name);
                if (!$didSave) {
                    throw new Exception("Error Processing Request", $file->errors());
                    $db->transaction->rollBack();
                }
            }
        });
    }

    public function hasImages()
    {
        return count($this->images) > 0;
    }

    public function imageAbsoluteUrls()
    {
        $urls = [];
        foreach ($this->images as $image) {
            $urls[] = $image->file->absoluteUrl();
        }
        return $urls;
    }

    public function imageConfigs()
    {
        $configs = [];
        foreach ($this->images as $image) {
            $configs[] = [
                'key' => $image->id,
            ];
        }

        return $configs;
    }

    public function loadUploadImageFiles()
    {
        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');
    }

    public function delete()
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            foreach ($this->images as $image) {
                $image->file->deleteInternal();
            }
            parent::deleteInternal();
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Failed to delete'));
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Failed to delete'));
            return false;
        }
    }

    public function corouselImages()
    {
        return array_map(function ($projectImage) {
            return Html::img($projectImage->file->absoluteUrl(), [
                'alt' => $this->name,
                'style' => 'object-fit:cover; width:100%; max-height:500px;'
            ]);
        }, $this->images);
    }
}
