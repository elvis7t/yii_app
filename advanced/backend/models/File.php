<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name
 * @property string|null $base_url
 * @property string $mime_type
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mime_type'], 'required'],
            [['name', 'base_url', 'mime_type'], 'string', 'max' => 255],
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
            'base_url' => Yii::t('app', 'Base Url'),
            'mime_type' => Yii::t('app', 'Mime Type'),
        ];
    }

    public function getProjectImages()
    {
        return $this->hasMany(ProjectImage::class, ['file_id' => 'id']);
    }

    public function getTestimonial()
    {
        return $this->hasMany(Testimonial::class, ['custumer_image_id' => 'id']);
    }


    public function absoluteUrl()
    {
        return $this->base_url . '/' . $this->name;
    }
}
