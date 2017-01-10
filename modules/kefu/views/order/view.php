<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
	use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>订单ID: <?= Html::encode($this->title) ?></h1> 
	
	<div class="row">
		
		<table class="table   table-bordered   ">
			 <tr>
				<td width="33%">订单号:<?= $model->order_no.' '.$model->update_count  ?> </td>
			   <td> 
				渠道:<?= Yii::$app->params['order_sourcelist'][$model->source] ?><br/>
				渠道号:<?= $model->source_no ?>
			 </td>
			   <td  class="bg-primary" >状态: <?= Yii::$app->params['orderstatuslist'][$model->order_status] ?></td>
			 </tr>
			 <tr>
				<td>预约日期:</td>
				<td> <?=$model->schedule_date ?>  <?=Yii::$app->params['timelist'][$model->schedule_timeinfo] ?></td>
				<td>约定上门时间: <?=$model->final_time ?></td>
			 
			 
			 </tr>
			 <tr>
				<td >地点: </td>
			 
				<td> <?= Yii::$app->params['citylist'][$model->order_city] ?> <?=Yii::$app->params['zonelist'][$model->order_zone] ?> ,<?=$model->order_addr ?> </td>
				<td></td>
				
			 
			 </tr>
			 <tr>
				<td>联系人: <?=$model->contact_name ?></td>
				<td>联系号码:<?=$model->contact_phone  ?></td>
			 
				<td></td>
			 
			 </tr>
			 
		</table>
	 
	</div>
  
	<div class="row">
	
	
	<table class="table table-condensed ">
		<tr><th>序号</th><!--th>服务目录</th--><th>服务内容</th><th>属性</th><th>单价</th><th>数量</th><th>总价</th><th>总时间(分钟)</th></tr>
		<?php 
		$count = count($arr_orderitems) ;
		for ($i=0;$i<$count ;$i++) {
			if ($i >= count($arr_orderitems))  {
		?>		
	 
		<?php 		
			}  else {
		
			$v_orderitem = $arr_orderitems[$i];
			
			 
		?>
		<tr>
		  <td><?= $i+1 ?></td>
		  
		  <td>  
			<?= $v_orderitem->product->title ?>
		  </td> 		  
		  <td><?= $v_orderitem->sku->name  ?>   </td>

		  <td> <?= $v_orderitem->product_price ?>  </td>
		  <td>
		  <?= $v_orderitem->product_num ?>
		  
		  </td>
		  <td>   <?= $v_orderitem->total_price ?>	</td>
		  <td> <?= $v_orderitem->total_minutes ?>  </td>
		  
		</tr>
			<?php }
			} ?>
		<tfoot>
		<tr class="success" >
		  <td></td>
		    <td>  </td>
	 
		  <td> </td>
		 
		  <td></td>
		  <td></td>
	   <td><b> 总计: <span id="span_totalprice"><?= $model->order_amt ?></span>元 </b></td>  <td><b> 总计: <span id="span_totalmin"><?= $model->minutes_need ?></span>分钟 </b></td>
		
		</tr>
		</tfoot>
	</table>
	 
		 
	</div>
	<div class="row"> 
		<table class="table  table-bordered ">
			<tr>
				<td>已通过渠道支付: <?=$model->source_pay ?></td>
				<td>抵: <?=$model->source_dikou  ?></td>
				<td>渠道：<?=  Yii::$app->params['order_sourcelist'][$model->source] ?></td>
			</tr>
			<tr>
				<td>已通支付: <?=$model->payment_paid ?></td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td>优惠券抵:  : XX元</td>
				<td>优惠券编号: XXXXX</td>
				<td> </td>
			</tr>
			<?php if ($model->update_amount >= 0) { ?>
			<tr>
				<td>未支付: <?=$model->payment_need ?>  </td>
			 
				<td  class="bg-danger"  > 需上门收取 </td>
				<td class="bg-danger" >  <?=$model->payment_need ?></td>
			</tr>
			<?php } else { ?>
			<tr>
				<td>待退款:  : <?=$model->update_amount ?> </td>
			 
				<td> 退款状态: </td>
				<td></td>
			</tr>
			<?php } ?>
		
		</table>
		 
	</div>
	
	 
	<div class="row"> 
		<div class="col-lg-6">
		 
			<h3>备注:  </h3>
			 <?php

			echo \mcms\xeditable\XEditableTextArea::widget([
				'model' => $model,
				'placement' => 'right',
				'pluginOptions' => [
					'name' => 'order_note',
					
				],
				'pk'=>$model->id,
				'url'=>Url::toRoute(['order/save'], true) 
					 
			]);

			?>
			
		</div>
		<div class="col-lg-6">
			<h3>给师傅的备注: </h3>
			
			 <?php

			echo \mcms\xeditable\XEditableTextArea::widget([
				'model' => $model,
				'placement' => 'right',
				'pluginOptions' => [
					'name' => 'order_note2',
					
				],
				'pk'=>$model->id,
				'url'=>Url::toRoute(['order/save'], true) 
					 
			]);

			?>
			
			
		</div>
		 
	</div>
	<hr/>
	<div class="row"> 
		<div class="col-lg-12">
		 
			<h3>回访评价: </h3>
		 <?php
		 
			echo \mcms\xeditable\XEditableTextArea::widget([
				'model' => $model_feedbacklater,
				'placement' => 'right',
				'pluginOptions' => [
					'name' => 'content', 
				],
				'pk'=>$model_feedbacklater->id,
				'url'=>Url::toRoute(['feedbacklater/save','order_id'=>$model->id], true) 
					 
			]);

			?>
		</div>
	 
		 
	</div>
	
	<div class="btn-group btn-group-justified">
	  <div class="btn-group">
		 <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	  <div class="btn-group">
		 <?= Html::a('取消', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	  <div class="btn-group">
		 <?= Html::a('回访评价', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	  <div class="btn-group">
		 <?= Html::a('复制', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	  <div class="btn-group">
		 <?= Html::a('派单', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	   <div class="btn-group">
		 <?= Html::a('开启争议', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  </div>
	</div>
	
	<div class="row">
		<div class="col-lg-6">
			 <p>日志日志</p>
		</div>  
		
		<div class="col-lg-6">
			 <p>支付记录</p>
		</div>  
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<ul class="nav nav-pills nav-justified " role="tablist">
				<li role="presentation" class=" "><a href="#">历史订单</a></li>
				<li role="presentation"><a href="#">异常log</a></li>
				<li role="presentation"><a href="#">log</a></li>
				<li role="presentation"><a href="#">争议链接</a></li>
			</ul>
		</div>
	</div>
	 
 
</div>
