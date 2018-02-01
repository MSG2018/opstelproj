<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180201_025617_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        

            //Create User Table
        $this->createTable('user', [
            'id' => $this->primaryKey(11),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50)->notNull(),
            'employee_id' => $this->string(64)->notNull()->unique(),
            'email' => $this->string(200)->notNull(),
            'tenant' => $this->integer(3)->notNull(),
            'username' => $this->string(255)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->notNull(),
            'group' => $this->integer(3),
            'state' => $this->string(2)->notNull(),
            'use_external_auth' => $this->boolean()->defaultValue(false),
            'external_id' => $this->string(255),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11),
            'last_login' => $this->integer(11),
        ] );

        //Index User Table
        $this->createIndex( 'idx_user_id', 'user', 'id');
        $this->createIndex( 'idx_user_first_name', 'user', 'first_name');
        $this->createIndex( 'idx_user_last_name', 'user', 'last_name');
        $this->createIndex( 'idx_user_tenant', 'user', 'tenant');
        $this->createIndex( 'idx_user_username', 'user', 'username');
        $this->createIndex( 'idx_user_employee_id', 'user', 'employee_id');


    }
      
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }

    
}
