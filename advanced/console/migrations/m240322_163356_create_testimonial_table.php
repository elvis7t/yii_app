<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testimonial}}`.
 */
class m240322_163356_create_testimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonial}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'custumer_image_id' => $this->integer(),
            'title' => $this->string()->notNull(),
            'custumer_name' => $this->string()->notNUll(),
            'review' => $this->text()->notNull(),
            'rating' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            '{{%idx-testimonial-project_id}}',
            '{{%testimonial}}',
            'project_id'
        );

        $this->addForeignKey(
            '{{%fk-testimonial-project_id}}',
            '{{%testimonial}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-testimonial-custumer_image_id}}',
            '{{%testimonial}}',
            'custumer_image_id'
        );

        $this->addForeignKey(
            '{{%fk-testimonial-custumer_image_id}}',
            '{{%testimonial}}',
            'custumer_image_id',
            '{{%file}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-testimonial-project_id}}',
            '{{%testimonial}}',
        );

        $this->dropIndex(
            '{{%idx-testimonial-project_id}}',
            '{{%testimonial}}',
        );

        $this->dropForeignKey(
            '{{%fk-testimonial-custumer_image_id}}',
            '{{%testimonial}}',
        );

        $this->dropIndex(
            '{{%idx-testimonial-custumer_image_id}}',
            '{{%testimonial}}',
        );
        $this->dropTable('{{%testimonial}}');
    }
}
