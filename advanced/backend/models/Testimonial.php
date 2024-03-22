<?php

namespace backend\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "testimonial".
 *
 * @property int $id
 * @property int $project_id
 * @property int $custumer_image_id
 * @property string $title
 * @property string $custumer_name
 * @property string $review
 * @property int $rating
 */
class Testimonial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;
    public static function tableName()
    {
        return 'testimonial';
    }

    /**
     * {@inheritdoc}
     */
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

    public function loadUploadedImageFile()
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
    }
    public function saveImage()
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $file = new File();
            $file->name = uniqid(true) . '.' . $this->imageFile->extension;
            $file->path_url = Yii::$app->params['uploads']['testmonials'];
            $file->mime_type = mime_content_type($this->imageFile->tempName);
            $file->save();
            $this->custumer_image_id = $file->id;

            $thumbnail = Image::thumbnail($this->imageFile->tempName, null, 1880);
            $didSave = $thumbnail->save($file->base_url . '/' . $file->name);
            if (!$didSave) {
                $this->addError('imageFile', Yii::t('app', 'File to save failed'));
                return false;
            }

            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            $this->addError('imageFile', Yii::t('app', 'File to save failed') . '(' . $e->getMessage() . ')');
            return false;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            $this->addError('imageFile', Yii::t('app', 'File to save failed') . '(' . $e->getMessage() . ')');
            return false;
        }

        return true;
    }


    public function imageAbsoluteUrls()
    {
        return $this->custumerImage ? $this->custumerImage->absoluteUrl(): [];
    }
    
    public function imageConfig()
    {
        return $this->custumerImage ? [['key'=> $this->custumerImage->id]]: [];
    }
}
