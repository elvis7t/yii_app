<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m240304_231501_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'tech_stach' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(0)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}
