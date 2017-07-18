<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170718_101222_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

		// Создание таблицы типов лиц
		$this->createTable('person_type', [
			'id' => $this->primaryKey(),
			'name' => $this->string(64),
		], $tableOptions);
		
		// Добавить существующие типы лиц
		$this->insert('person_type', ['name' => 'Физическое лицо']);
		$this->insert('person_type', ['name' => 'Юридическое лицо']);
		
		// Создание таблицы пользователей
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
			'id_person_type' => $this->integer()->notNull(),
			'inn' => $this->string(12),
			'company' => $this->string(128),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
			
        ], $tableOptions);
		
		// Создать индекс для внешнего ключа
		$this->createIndex(
            'idx-user-id_person_type',
            'user',
            'id_person_type'
        );
		
		// Добавить внешний ключ в таблицу user на таблицу person_type
		$this->addForeignKey(
			'fk-user-id_person_type',
			'user',
			'id_person_type',
			'person_type',
			'id',
			'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user');
		$this->truncateTable('person_type');
        $this->dropTable('person_type');
    }
}
