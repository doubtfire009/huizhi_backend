<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_status')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>
 
  
	<?= $form->field($model, 'order_city')->dropDownList(Yii::$app->params['citylist'])  ?>

    <?= $form->field($model, 'order_zone')->dropDownList(Yii::$app->params['zonelist'])  ?>

    <?= $form->field($model, 'order_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_geohash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_amt')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'minutes_need')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'payment_need')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'payment_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'schedule_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'schedule_timeinfo')->dropDownList(Yii::$app->params['timelist']) ?>

    <?= $form->field($model, 'final_time')->textInput(['maxlength' => true])->hint('预约时间,例如:12:35') ?>

    <?= $form->field($model, 'final_shifu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minutes_need')->textInput() ?>

    <?= $form->field($model, 'order_note')->textArea(['rows' => '6'])->hint('备注只能添加,不能删除')?>
	
	    <?= $form->field($model, 'order_note2')->textArea(['rows' => '6'])->hint('备注只能添加,不能删除')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
