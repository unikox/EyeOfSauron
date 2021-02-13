<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_request_cat}}`
 */
class m210107_001423_create_user_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_request}}', [
            'id' => $this->primaryKey(),
            'applicant' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'cloused_at' => $this->integer(),
            'cat_request' => $this->integer(),
            'body' => $this->text(),
            'status' => $this->integer(),
            'quality_mark' => $this->integer(),
            'tel' => $this->string(),
            'email' => $this->string(),
        ]);

        // creates index for column `cat_request`
        $this->createIndex(
            '{{%idx-user_request-cat_request}}',
            '{{%user_request}}',
            'cat_request'
        );

        // add foreign key for table `{{%user_request_cat}}`
        $this->addForeignKey(
            '{{%fk-user_request-cat_request}}',
            '{{%user_request}}',
            'cat_request',
            '{{%user_request_cat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user_request_cat}}`
        $this->dropForeignKey(
            '{{%fk-user_request-cat_request}}',
            '{{%user_request}}'
        );

        // drops index for column `cat_request`
        $this->dropIndex(
            '{{%idx-user_request-cat_request}}',
            '{{%user_request}}'
        );

        $this->dropTable('{{%user_request}}');
    }
}
