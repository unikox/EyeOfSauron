<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_request_cat}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_request_cat}}`
 */
class m210107_000725_create_user_request_cat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_request_cat}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'cat_name' => $this->string(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-user_request_cat-parent_id}}',
            '{{%user_request_cat}}',
            'parent_id'
        );

        // add foreign key for table `{{%user_request_cat}}`
        $this->addForeignKey(
            '{{%fk-user_request_cat-parent_id}}',
            '{{%user_request_cat}}',
            'parent_id',
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
            '{{%fk-user_request_cat-parent_id}}',
            '{{%user_request_cat}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-user_request_cat-parent_id}}',
            '{{%user_request_cat}}'
        );

        $this->dropTable('{{%user_request_cat}}');
    }
}
