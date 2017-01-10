<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'schedule_date')->textInput(['maxlength' => true]) ?> 
   
	<?= $form->field($model, 'schedule_timeinfo')->dropDownList(Yii::$app->params['timelist2']) ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'shifu_id')->textInput()->hint('一个记录只输入一个师傅的ID,如果一个订单需要多个师傅，会新建多个记录') ?>

    <?= $form->field($model, 'minutes')->textInput()->hint('这个师傅在这个订单上需要花的时间') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
