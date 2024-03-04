<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testimonial}}`.
 */
class m240304_233526_create_testimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonial}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'custumer_image_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'custumer_name' => $this->string()->notNUll(),
            'review' => $this->text()->notNull(),
            'rating' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%testimonial}}');
    }
}
