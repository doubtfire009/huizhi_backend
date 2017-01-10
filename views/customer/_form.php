<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->hint('不能为空，如果一时不知道手机号码，可以用微信号或QQ代替') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'sex')->dropDownList(Yii::$app->params['sexlist']) ?>

    <?= $form->field($model, 'city')->dropDownList(Yii::$app->params['citylist'])  ?>
	 
	<?= $form->field($model, 'zone')->dropDownList(Yii::$app->params['zonelist'])->hint('城市划分为多个区域，一个师傅只接一个区域的单') ?>

   
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->hint('详细地址，具体到门牌号码') ?>

 

 
   
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
