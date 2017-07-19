<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataCache;

/**
 * DataCacheSearch represents the model behind the search form about `app\models\DataCache`.
 */
class DataCacheSearch extends DataCache
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date', 'type', 'a', 'b'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataCache::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'type' => $this->type,
            'a' => $this->a,
            'b' => $this->b,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
    
    public function specialSearch($date, $type)
    {
        $userId = Yii::$app->user->id;
        $dataList = DataCache::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
        $result = [];

        if (!empty($dataList)) {
            foreach ($dataList as $dataItem) {
                $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
            }
        }

        return $result;
    }
    
    public function cachedSearch($date, $type)
    {
        $cache = Yii::$app->cache;
        $data = $cache->get($date.'-'.$type);

        if ($data === false) {
            $data = $this->specialSearch($date, $type);

            $cache->set($date.'-'.$type, $data);
        }
        return $data;
    }
}
