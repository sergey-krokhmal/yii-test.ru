<?php

namespace app\controllers;

use app\models\DataCache;

class DataCacheController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = DataCache::find();

        $datas = $query->orderBy('date')->all();

        return $this->render('index', [
            'datas' => $datas
        ]);
        
    }

}
