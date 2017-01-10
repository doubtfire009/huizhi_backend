<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SrvZone;
/* @var $this yii\web\View */
/* @var $model app\models\Shifu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shifu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList(Yii::$app->params['sexlist']) ?>

    <?= $form->field($model, 'idcard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'city')->dropDownList(Yii::$app->params['citylist'])  ?>

    <?= $form->field($model, 'service_zone')->dropDownList((new SrvZone())->list_all() )?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_status')->dropDownList(Yii::$app->params['workstatuslist']) ?>

    <?= $form->field($model, 'line_id')->dropDownList(Yii::$app->params['linelist']) ?>

   
 
    <?= $form->field($model, 'join_date')->textInput() ?>

    <?= $form->field($model, 'leave_date')->textInput() ?>
    <?= $form->field($model, 'off_weekidx')->dropDownList(Yii::$app->params['off_weekidx_list']) ?>
	
	 <?= $form->field($model, 'sf_type')->dropDownList(Yii::$app->params['sftypelist'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
