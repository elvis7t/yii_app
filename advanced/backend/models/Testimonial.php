<?php

namespace backend\models;

use Yii;

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
        ];
    }
}
