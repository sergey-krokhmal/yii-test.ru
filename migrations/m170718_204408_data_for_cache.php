<?php

use yii\db\Migration;

class m170718_204408_data_for_cache extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

		// Создание таблицы типов лиц
		$this->createTable('data_cache', [
			'id' => $this->primaryKey(),
			'date' => $this->date(),
            'type' => $this->string(16),
            'user_id' => $this->integer()
		], $tableOptions);
        
        // Добавить тестовые данные
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Test', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Done', 'user_id' => 2]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Add', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Add', 'user_id' => 4]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Test', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Done', 'user_id' => 5]);
		$this->insert('data_cache', ['date' => '2017-07-18', 'type' => 'Test', 'user_id' => 4]);
		$this->insert('data_cache', ['date' => '2017-07-19', 'type' => 'Add', 'user_id' => 2]);
		$this->insert('data_cache', ['date' => '2017-07-19', 'type' => 'Done', 'user_id' => 3]);
		$this->insert('data_cache', ['date' => '2017-07-19', 'type' => 'Test', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-19', 'type' => 'Add', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-20', 'type' => 'Test', 'user_id' => 3]);
		$this->insert('data_cache', ['date' => '2017-07-20', 'type' => 'Add', 'user_id' => 4]);
		$this->insert('data_cache', ['date' => '2017-07-20', 'type' => 'Done', 'user_id' => 2]);
		$this->insert('data_cache', ['date' => '2017-07-20', 'type' => 'Add', 'user_id' => 5]);
		$this->insert('data_cache', ['date' => '2017-07-20', 'type' => 'Test', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-21', 'type' => 'Done', 'user_id' => 1]);
		$this->insert('data_cache', ['date' => '2017-07-21', 'type' => 'Done', 'user_id' => 3]);
		$this->insert('data_cache', ['date' => '2017-07-21', 'type' => 'Test', 'user_id' => 2]);
    }

    public function safeDown()
    {
        $this->truncateTable('data_cache');
        $this->dropTable('data_cache');
    }

}
