<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataCacheSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-cache-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr/>
    <p>
        <?= Html::a('Create data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'type',
            'a',
            'b',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <hr/>
    <div>
        <h2>Cached Data</h2>
        <table class="table">
            <tr>
                <th>a</th>
                <th>b</th>
            </tr>
            <?php foreach($cached as $c): ?>
            <tr>
                <td> <?= $c['a'] ?> </td>
                <td> <?= $c['b'] ?> </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
