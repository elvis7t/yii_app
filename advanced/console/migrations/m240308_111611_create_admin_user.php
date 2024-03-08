<?php

use yii\db\Migration;

/**
 * Class m240308_111611_create_admin_user
 */
class m240308_111611_create_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authKey = Yii::$app->security->generateRandomString();
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'email' => 'admin@system',
            'password_hash' => '$2y$13$UDor903byVlqQoqNQvZUyuqSAOpFHIDQkg/9ZojSgmoeTJhqdbIx6',
            'auth_key' => $authKey,
        ]);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['username' => 'admin']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240308_111611_create_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
