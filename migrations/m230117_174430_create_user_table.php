<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230117_174430_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'login' => $this->string(),
            'password' => $this->string(),
            'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}