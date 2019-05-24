<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m190506_203302_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
            'protocol' => $this->string(20),
            'port' => $this->integer(5),
            'port_range' => $this->string(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
