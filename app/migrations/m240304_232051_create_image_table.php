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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
