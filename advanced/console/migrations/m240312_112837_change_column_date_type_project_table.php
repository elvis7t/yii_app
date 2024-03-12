<?php

use yii\db\Migration;

/**
 * Class m240312_112837_change_column_date_type_project_table
 */
class m240312_112837_change_column_date_type_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('project', 'start_date', $this->date());
        $this->alterColumn('project', 'end_date', $this->date());
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('project', 'start_date', $this->integer());
        $this->alterColumn('project', 'end_date', $this->integer());

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240312_112837_change_column_date_type_project_table cannot be reverted.\n";

        return false;
    }
    */
}
