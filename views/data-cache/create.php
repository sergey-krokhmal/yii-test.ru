<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataCache */

$this->title = 'Create Data Cache';
$this->params['breadcrumbs'][] = ['label' => 'Data Caches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-cache-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
