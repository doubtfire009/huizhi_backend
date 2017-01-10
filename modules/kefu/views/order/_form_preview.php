<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
  
	

    <?php $form = ActiveForm::begin([
	  'options' => ['class' => 'form-horizontal'],
	    'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-offset-3 col-lg-9\">{error}{hint}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
	
	
	]); ?>
	<input type="hidden" name="preview" value="2" />
	<div class="" style="display:none">
	<?= $form->field($model, 'source')->hiddenInput()->label(false)   ?> 
	<?= $form->field($model, 'source_no')->hiddenInput()->label(false)   ?>
	<?= $form->field($model_customer, 'mobile')->hiddenInput()->label(false)   ?>
	<?= $form->field($model_customer, 'name')->hiddenInput()->label(false)   ?>
	<?= $form->field($model_customer, 'city')->hiddenInput()->label(false)   ?>
	<?= $form->field($model_customer, 'zone')->hiddenInput()->label(false)   ?>
	<?= $form->field($model_customer, 'address')->hiddenInput()->label(false)   ?>
	<?= $form->field($model, 'contact_name')->hiddenInput()->label(false)   ?>
	<?= $form->field($model, 'contact_phone')->hiddenInput()->label(false)   ?>
	<?= $form->field($model, 'schedule_date')->hiddenInput()->label(false)   ?>
	<?= $form->field($model, 'schedule_timeinfo')->hiddenInput()->label(false)   ?>
    <?= $form->field($model, 'source_pay')->hiddenInput()->label(false)   ?>
    <?= $form->field($model, 'source_dikou')->hiddenInput()->label(false)   ?>
    <?= $form->field($model, 'payment_need')->hiddenInput()->label(false)   ?>
    <?= $form->field($model, 'order_note')->hiddenInput()->label(false)   ?>
   </div>
	 
 
	 <div class="row">
	 
		<table class="table   table-bordered   ">
			<tr><th width="33%" >原</th><th width="33%" >新</th><th>变动</th> </tr>
			 
			 <tr>
				<td>日期: <?=$old_model->schedule_date ?>  <?=Yii::$app->params['timelist'][$old_model->schedule_timeinfo] ?>  </td>
				<td> <?=$model->schedule_date ?>  <?=Yii::$app->params['timelist'][$model->schedule_timeinfo] ?></td>
				<td>价格变动:XX</td> 
			 
			 </tr>
			 <tr>
				<td >地点: <?=$old_model->order_addr ?></td>
			 
				<td> <?=$model->order_addr ?> </td>
				<td>0</td>
				
			 
			 </tr> 
			 
		</table>
	 	<table class="table   table-bordered   ">
			<tr><th width="33%" >老服务项</th><th width="33%" >新服务项</th><th> 价格变动 </th> </tr>
			<?php for ($i=0;$i<3;$i++) { ?>
			<tr>
			  <td>老的服务项目</td>
			  <td>新的服务项目 </td>
			  <td>差价 </td> 		  
			  
			</tr>
			<?php } ?>
			 <tfoot>
			<tr class="success" >
			  <td></td>
				<td>  </td>
			  <td> </td>
			  <td> </td>
			 
			  <td><b> 总计: 100元 </b></td>
			  <td></td>
		 
			
			</tr>
			</tfoot>
			 
		</table>
	 
	 </div>
 
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '确定修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
