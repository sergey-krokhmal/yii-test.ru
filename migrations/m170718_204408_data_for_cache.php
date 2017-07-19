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
            'a' => $this->string(32),
            'b' => $this->string(32),
            'user_id' => $this->integer()
		], $tableOptions);
    }

    public function safeDown()
    {
        $this->truncateTable('data_cache');
        $this->dropTable('data_cache');
    }

}
