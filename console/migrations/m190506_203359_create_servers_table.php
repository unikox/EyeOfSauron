<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%services}}`
 */
class m190506_203359_create_servers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%servers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
            'ip' => $this->string(16),
            'os' => $this->string(64),
            'location' => $this->string(32),
            'services' => $this->integer(),
        ]);

        // creates index for column `services`
        $this->createIndex(
            '{{%idx-servers-services}}',
            '{{%servers}}',
            'services'
        );

        // add foreign key for table `{{%services}}`
        $this->addForeignKey(
            '{{%fk-servers-services}}',
            '{{%servers}}',
            'services',
            '{{%services}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%services}}`
        $this->dropForeignKey(
            '{{%fk-servers-services}}',
            '{{%servers}}'
        );

        // drops index for column `services`
        $this->dropIndex(
            '{{%idx-servers-services}}',
            '{{%servers}}'
        );

        $this->dropTable('{{%servers}}');
    }
}
