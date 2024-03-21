<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m240304_232051_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'file_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            '{{%idx-image-project_id}}',
            '{{%image}}',
            'project_id'
        );

        $this->addForeignKey(
            '{{%fk-image-project_id}}',
            '{{%image}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-image-file_id}}',
            '{{%image}}',
            'file_id'
        );

        $this->addForeignKey(
            '{{%fk-image-file_id}}',
            '{{%image}}',
            'file_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-image-project_id}}',
            '{{%image}}',
        );

        $this->dropIndex(
            '{{%idx-image-project_id}}',
            '{{%image}}',
        );

        $this->dropForeignKey(
            '{{%fk-image-file_id}}',
            '{{%image}}',
        );

        $this->dropIndex(
            '{{%idx-image-file_id}}',
            '{{%image}}',
        );

        $this->dropTable('{{%image}}');
    }
}
