<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerAddr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-addr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cust_id')->textInput() ?>

   <?= $form->field($model, 'city')->dropDownList(Yii::$app->params['citylist'])  ?>
   
   	<?= $form->field($model, 'zone')->dropDownList(Yii::$app->params['zonelist'])->hint('城市划分为一个区域，一个师傅只接一个区域的单') ?> 

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->hint('详细门牌号码') ?>  
	
	 <?= $form->field($model, 'name')->textInput(['maxlength' => true])->hint('联系人') ?> 
	 <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->hint('联系电话') ?> 
   
    <?= $form->field($model, 'main_addr')->dropDownList( Yii::$app->params['boollist'])->hint('一个客户只有一个默认地址，后设置的默认地址会覆盖前一个的') ?>

	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
