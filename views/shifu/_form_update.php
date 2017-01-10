<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shifu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shifu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'sex')->dropDownList(Yii::$app->params['sexlist']) ?>

    <?= $form->field($model, 'idcard')->textInput(['maxlength' => true])->hint('身份证,军官证等') ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

   
	<?= $form->field($model, 'city')->dropDownList(Yii::$app->params['citylist'])  ?>
 
	<?= $form->field($model, 'zone')->dropDownList(Yii::$app->params['zonelist'])->hint('城市划分为一个区域，一个师傅只接一个区域的单') ?>
 

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->hint('详细门牌号码') ?>

    <?= $form->field($model, 'skills_all')->textInput(['maxlength' => true])->hint('输入产品线ID,多个之间以|分割') ?>

    <?= $form->field($model, 'skills')->textInput(['maxlength' => true])->hint('输入产品线ID,多个之间以|分割') ?>
 
 
    <?= $form->field($model, 'join_date')->textInput() ?>

    <?= $form->field($model, 'leave_date')->textInput() ?>
		
	 <?= $form->field($model, 'sf_type')->dropDownList(Yii::$app->params['sftypelist'])  ?>
	 
	<p>以下信息仅管理员可改</p>
	<?= $form->field($model, 'total_jobs')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'avg_score')->textInput(['maxlength' => true])->hint('0到5分,这是根据所有评价的平均值') ?>
	<?= $form->field($model, 'avg_ontime')->textInput(['maxlength' => true])->hint('0到5分,这是根据所有评价的平均值') ?>
	<?= $form->field($model, 'avg_cloth')->textInput(['maxlength' => true])->hint('0到5分,这是根据所有评价的平均值') ?>
	<?= $form->field($model, 'avg_intro')->textInput(['maxlength' => true])->hint('0到5分,这是根据所有评价的平均值') ?>
	<?= $form->field($model, 'avg_clean')->textInput(['maxlength' => true])->hint('0到5分,这是根据所有评价的平均值') ?>
	
	<?= $form->field($model, 'latitude')->textInput(['maxlength' => true])->hint('纬度') ?>
	<?= $form->field($model, 'longitude')->textInput(['maxlength' => true])->hint('经度') ?>
	
	 
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
	 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
