<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_cache".
 *
 * @property integer $id
 * @property string $date
 * @property string $type
 * @property string $a
 * @property string $b
 * @property integer $user_id
 */
class DataCache extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_cache';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['type'], 'string', 'max' => 16],
            [['a'], 'string', 'max' => 128],
            [['b'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'type' => 'Type',
            'a' => 'A',
            'b' => 'B',
            'user_id' => 'User ID',
        ];
    }
}
