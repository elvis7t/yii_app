<?php

namespace app\models;

use Yii;
use app\models\File;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int $project_id
 * @property int $file_id
 */
class ProjectImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'file_id'], 'required'],
            [['project_id', 'file_id'], 'integer'],
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
            'file_id' => Yii::t('app', 'File ID'),
        ];
    }
    
    public function getFile()
    {
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }
}
