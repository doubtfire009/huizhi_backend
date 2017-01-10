<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MinutesRes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minutes-res-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'work_date')->textInput(['maxlength' => true]) ?>

   
	 <?= $form->field($model, 'line_id')->dropDownList(Yii::$app->params['linelist'])  ?> 
	

    <?= $form->field($model, 'minutes_morning')->textInput()->hint('以分钟数计数') ?>

    <?= $form->field($model, 'minutes_afternoon')->textInput()->hint('以分钟数计数') ?>

    <?= $form->field($model, 'minutes_night')->textInput()->hint('以分钟数计数') ?>

    <?= $form->field($model, 'minutes_allday')->textInput()->hint('以分钟数计数') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
