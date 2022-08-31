<?php

use yii\db\Migration;

/**
 * Class m220829_214128_new_tables
 */
class m220829_214128_new_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Create Usergroups Table
        $this->createTable('usergroups',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->unique()->notNull(),
            'update_dt' => $this->timestamp(),
            'create_dt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'inactive' => $this->boolean()->defaultValue(0)
        ]);

        //Create Users Table
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'usergroups_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->unique(),
            'mobile' => $this->string(10),
            'update_dt' => $this->timestamp(),
            'create_dt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'inactive' => $this->boolean()->defaultValue(0)
        ]);

        $this->addForeignKey('FK_user_usegroups', 'users', 'usergroups_id', 'usergroups', 'id');


        //Create Lessons Table
        $this->createTable('lessons', [
            'id' => $this->primaryKey(),
            'users_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(100),
            'update_dt' => $this->timestamp(),
            'create_dt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'inactive' => $this->integer()->defaultValue(0)
        ]);

        $this->addForeignKey('FK_lessons_users', 'lessons', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usergroups');
        $this->dropTable('users');
        $this->dropTable('lessons');
    }

}
