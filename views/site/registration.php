<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Введите данные для регистрации:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-registration']) ?>
                <?php $model->person_type = 1 ?>
                <?= $form->field($model, 'person_type')
					->radioList([
						'1' => 'Физическое лицо',
						'2' => 'Юридическое лицо',
					])->label(false);?>
                <?= $form->field($model, 'fio')->textInput(['autofocus' => true, 'label']) ?>
                <?= $form->field($model, 'inn') ?>
                <?= $form->field($model, 'company') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary', 'name' => 'registration-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
 
        </div>
    </div>
</div>