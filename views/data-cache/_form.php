<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DataCache */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-cache-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <? $model->date = date('Y-M-d') ?>
    
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropdownList($users) ?>
    
    <?= $form->field($model, 'a')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'b')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
