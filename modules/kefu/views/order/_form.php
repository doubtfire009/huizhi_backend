<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Category ;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;

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
	<input type="hidden" name="preview" value="1" />
	<input type="hidden" class="hidden_addrindex" name="customer_addrindex" value="0" />
	
	<?= $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-lg-6">
			<?= $form->field($model, 'source')->dropDownList(Yii::$app->params['order_sourcelist'])  ?>
		</div>
		<div class="col-lg-6">
			 <div class="input-group">
			<?= $form->field($model, 'source_no')->textInput(['maxlength' => true]) ?>
			<span class="input-group-btn" style="vertical-align:top" >
					<button class="btn btn-default" title="检查唯一性" type="button"><span class="glyphicon glyphicon-ok"></span></button>
			</span>
			</div>
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-lg-6">
			
			 <div class="input-group">
				  <?= $form->field($model_customer, 'mobile')->textInput( ) ?> 
				 
				 
				   <span class="input-group-btn" style="vertical-align:top" >
						<button class="btn btn-default btn-searchcustomer" title="查找已存在的用户"   >
							<span class="glyphicon glyphicon-search"></span>
						</button> 
				  </span>

	  
			</div>

		</div>
		<div class="col-lg-6">
			 <?= $form->field($model_customer, 'name')->textInput() ?> 
		</div>
	</div>
	<div class="row addrlist hidden">
		
	
	
	</div>
	<div class="row">
		<div class="col-lg-3">
			 <?= $form->field($model_customer, 'city')->dropDownList(Yii::$app->params['citylist']) ?> 
			  
		</div>
		<div class="col-lg-3"> 
			 <?= $form->field($model_customer, 'zone')->dropDownList(Yii::$app->params['zonelist'])  ?>
		</div>
		<div class="col-lg-6">
			 <?= $form->field($model_customer, 'address')->textInput()->label('详细地址')->hint(' ') ?> 
		</div> 
		 
	</div>
	<div class="row">
		<div class="col-lg-6">
			 <?= $form->field($model, 'contact_name')->textInput() ?>  
		</div>
		<div class="col-lg-6"> 
			 <?= $form->field($model, 'contact_phone')->textInput( )  ?>
		</div> 
		 
	</div>
	
	<h2>服务内容 <small>
	
	<div class="btn-group btn-pricegroup">
	  <button type="button" class="btn btn-default btn-primary" data-priceindex="1" >官方价</button>
	  <button type="button" class="btn btn-default" data-priceindex="2" >VIP价</button>
	  <button type="button" class="btn btn-default" data-priceindex="3" >亲友价</button>
	</div>
	 

	</small>

	</h2> 
	 
	<div class="row">
	
	<table class="table table-condensed ">
		<tr><th>序号</th><!--th>服务目录</th--><th width="15%">产品</th><th width="15%" >属性</th><th width="15%" >单价</th><th>数量</th><th>总价</th><th>总时间(分钟)</th></tr>
		<?php 
			$i = 0 ;foreach  ($arr_skulist as $v_sku) { ?>
		<tr>
		  <td><?= ++$i ?> 
		   <?=  Html::hiddenInput('sku_ids[]', $v_sku->id ,   ['class' => 'input_sku_ids '])  ?>
		  </td>
		  <td>  <?= $v_sku->product->title ?>
				<?=  Html::hiddenInput('product_ids[]', $v_sku->prod_id ,   ['class' => 'input_sku_product_ids '])  ?>
		  </td> 		  
		  <td> <?= $v_sku->name ?>  </td>

		  <td>  
			  <?=  Html::TextInput('sku_step_price[]',  $v_sku->step_price ,  
				['class' => 'input_sku_step_price ','readonly'=>'readonly', 
				'data-price1'=>$v_sku->step_price,'data-price2'=>$v_sku->step_price2,
				'data-price3'=>$v_sku->step_price3, 'data-price4'=>$v_sku->step_price4]
			  ) 
			  ?>
		  </td>
		  <td>
		  <?=  Html::TextInput('prod_num[]', null ,   ['class' => 'input_prod_num '])  ?>
		
		 
		  <?=  Html::hiddenInput('sku_base_mins[]', $v_sku->base_mins ,   ['class' => 'input_sku_base_mins '])  ?>
		  <?=  Html::hiddenInput('sku_step_mins[]',  $v_sku->step_mins ,   ['class' => 'input_sku_step_mins '])  ?>
		  <?=  Html::hiddenInput('sku_base_price[]',  $v_sku->base_price ,   ['class' => 'input_sku_base_price '])  ?>
		
		  <?=  Html::hiddenInput('sku_min_nums[]',  $v_sku->min_nums ,   ['class' => 'input_sku_min_nums '])  ?>
		  
		  </td>
		  <td> <?=  Html::TextInput('total_price[]', null ,   ['class' => 'input_total_price'])  ?>	</td>
		  <td> <?=  Html::TextInput('total_mins[]', null ,   ['class' => 'input_total_mins'])  ?> </td>
		  
		</tr>
		<?php } ?>
		<tfoot>
		<tr class="success" >
		  <td></td>
		    <td>  </td>
		  <td> </td>
		 
		 
		  <td></td>
		  <td></td>
		<td><b> 总计: <span id="span_totalprice"></span>元 </b></td>  <td><b> 总计: <span id="span_totalmin"></span>分钟 </b></td>
		
		</tr>
		
		
		
		</tfoot>
		
		
	</table>
 
		 
	</div>
	<h2></h2>
	<hr/>
	<div class="row">
		
		<div class="col-lg-3">
			 <?= $form->field($model, 'source_pay')->textInput()->label('渠道已收款') ?> 
		</div>
		 <div class="col-lg-3">
			 <?= $form->field($model, 'source_dikou')->textInput(['class'=>'input_dikou'])->label('抵扣') ?> 
		</div>
		<div class="col-lg-3">
			 <?= $form->field($model, 'payment_paid')->textInput(['class'=>'input_paymentpaid','disabled'=>'disabled'])->label('已支付') ?> 
		</div>
		<div class="col-lg-3">
			 <?= $form->field($model, 'payment_need')->textInput(['class'=>'input_paymentneed'])->label('需上门收款') ?> 
		</div>
		<div class="col-lg-12">
		  <?= $form->field($model, 'order_note')->textArea(['rows' => '6'])->hint('备注只能添加,不能删除')?>
		</div>
		
	</div>
	 
	 <?=  $form->field($model,'order_amt')->textInput()->hiddenInput(['class'=>'order_amt'])->label(false); ?>
	 <?=  $form->field($model,'minutes_need')->textInput()->hiddenInput(['class'=>'minutes_need'])->label(false); ?>
	 <?=  $form->field($model,'price_index')->textInput()->hiddenInput(['class'=>'input_priceindex'])->label(false); ?>
	  
  
	<div class="row">
	
		<div class="col-lg-6">
			<?= 
			 DatePicker::widget([
				'model' => $model,
				'attribute' => 'schedule_date',
				'clientOptions' => [
					'autoclose' => true,
					'format' => 'yyyy-mm-dd',
					 'language'=>'zh-CN'

				]
				//'language' => 'ru',
				//'dateFormat' => 'yyyy-MM-dd',
			]);
			?>
		</div>
		<div class="col-lg-6">  
			 <?= $form->field($model, 'schedule_timeinfo')->dropDownList(Yii::$app->params['timelist']) ?> 
		</div> 
		 
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      
      </div>
     
    </div>
  </div>
</div>
  <?php
    $this->registerJs(' 

		 // 数量改变
        $("tr .input_prod_num").change(function() {
            
			var num = $(this).val();
			
			var obj = $(this).closest("tr") ;
			console.log("changed:"+ num);
			var base_price = obj.find(".input_sku_base_price"  ).val();
			var step_price =  obj.find(".input_sku_step_price"  ).val();
			var base_mins =   obj.find(".input_sku_base_mins"  ).val();
			var step_mins =   obj.find(".input_sku_step_mins"  ).val();
            num = parseInt(num);
			if ( isNaN(num) ) num = 0;
			base_price = parseFloat(base_price) ;
			step_price = parseFloat(step_price) ;
			base_mins = parseFloat(base_mins) ;
			step_mins = parseFloat(step_mins) ;
			var total_price = base_price + num * step_price ;
			var total_mins = base_mins + num * step_mins ;
			
			if (num == "0") {
				total_price = "";
				total_mins = "";
			}
			
			$(this).closest("tr").find(".input_total_price").val(total_price);
			$(this).closest("tr").find(".input_total_mins").val(total_mins );
			js_update_total_price();
			js_update_total_mins();
		
			$(".input_dikou").trigger("change" );			
        });
		
		function js_update_total_price()
		{
				var total = 0 ;
				 $("tr .input_total_price").each(function (i, item) {
				  var tmp1 =  ( $(item).val()) ;
				  
					if (tmp1 > 0)
			      	total = parseFloat(total) + parseFloat(tmp1) ;  
			    }) ;
			
			    $("#span_totalprice").html(total) ;
				 $(".order_amt").val(total);

			
		}
		
		function js_update_total_mins()
		{
				var total = 0;
			 $("tr .input_total_mins").each(function (i, item) {
				  var tmp1 =  ( $(item).val()) ;
				 
				  if (tmp1 >0 )
			      total = parseInt( total) +  parseInt(tmp1) ;  
			    }) ;
			 $("#span_totalmin").html(total) ; 
			  $(".minutes_need").val(total);
			
			
		}
        //获取该类别下的商品列表
        function getProd(id, obj)
        {
            var href = "' . Url::to(['/kefu/order/getprodlist'], true). '";

            $.ajax({
                "type"  : "GET",
                "url"   : href,
                "data"  : {cat_id : id},
                success : function(d) { 
                    obj.append(d);
                }
            });
        }

        //获取商品下面的SKU列表
        function getSku(id,obj)
        {
            var href = "' . Url::to(['/kefu/product/getskulist'], true) . '";
            $.ajax({
                "type"  : "GET",
                "url"   : href,			 
                "data"  : {prod_id : id},
                success : function(d) {
                   console.log(d);
				   obj.append(d);
                }
            });
        }
		
		//获取SKU 的详细信息
        function getSkuinfo(id,obj)
        {
            var href = "' . Url::to(['/kefu/product/getskuinfo'], true) . '";
            $.ajax({
                "type"  : "GET",
                "url"   : href,		
				"dataType":"json",
                "data"  : {sku_id : id},
                success : function(d) {
                   obj.find(".input_skuid").val(d.id);
				   obj.find(".input_sku_base_mins").val(d.base_mins);
				   obj.find(".input_sku_step_mins").val(d.step_mins);
				   obj.find(".input_sku_base_price").val(d.base_price);
				   obj.find(".input_sku_step_price").val(d.step_price);
				   obj.find(".input_sku_min_nums").val(d.min_nums);
				   obj.find(".input_prod_num").val(d.min_nums);
				   obj.find(".input_prod_price").val(d.base_price);
				   obj.data("input_sku_base_price",d.base_price );
				   obj.data("input_sku_step_price",d.step_price );
				   obj.data("input_sku_base_mins",d.base_mins );
				   obj.data("input_sku_step_mins",d.step_mins );
				   
				   obj.find(".input_prod_num").trigger("change");
				   
                }
            });
        }

        //搜索小区
        $("#search-community").click(function() {
            var word   = $("#keyword").val();
            var areaid = $("#itemsearch-areaname option:selected").val();
            var href   = "' . Url::to(['/service/base/search-community'], true) . '";

            if (areaid > 0) {
                $.ajax({
                    "type"  : "GET",
                    "url"   : href,
                    "data"  : {id : areaid, word : word},
                    success : function(d) {
                        $("#itemsearch-communityname").html(d);
                    }
                });
            }
        });
		$(".btn-pricegroup button").click(function(){
			var obj=$(this);
			var price_index =  obj.data("priceindex");
		    $(".input_priceindex").val(price_index) ;
			console.log( obj.data("priceindex"));
			obj.closest("div").find("button").removeClass("btn-primary");
			obj.addClass("btn-primary");
			$("tr .input_sku_step_price").each(function (i, item) {
			  var price =  ( $(item).val()) ;
			  var price1 = ( $(item).data("price1")) ;
			  var price2 = ( $(item).data("price2")) ;
			  var price3 = ( $(item).data("price3")) ;
			  var price4 = ( $(item).data("price4")) ;
			  
			  if (price_index ==1)  price =price1;
			  if (price_index ==2)  price =price2;
			  if (price_index ==3)  price =price3;
			  if (price_index ==4)  price =price4;
			  $(item).val(price) ;
			  
			     
		    }) ;
			$("tr .input_prod_num").trigger("change") ;
			
			
		});
		$(".input_dikou").change(function(){
			 var dikou_price = $(this).val();
			 var total_price = $(".order_amt").val();
			 $(".input_paymentneed").val(total_price - dikou_price) ;
		});
	 
		$(".btn-searchcustomer").click(function() {
			var mobile = $("#customer-mobile").val();
			
			console.log("mobile:"+mobile) ;
			var href = "' . Url::to(['/kefu/order/getcustomerinfo'], true) . '";
			if (mobile !="") {
                $.ajax({
                    "type"  : "GET",
                    "url"   : href,
					"dataType":"json",
                    "data"  : {mobile : mobile},
                    success : function(d) {
						if (d.result =="1") {
							$("#customerModal .modal-title").html("查找:"+mobile);
							$("#customerModal .modal-body").html(d.addrhtml);
							$("#customer-name").val(d.name); 							
							$("#customerModal").modal("show" );
							$("#customerModal").data("addrlist",d.json_addrinfo);
						} else {
							alert("这个客户是新客户:"+mobile);
						}
					 
                    }
                });
            } else {
				alert("先输入手机号码");
			}
			
			return false ;
			
		});
		$( "#customerModal" ).on( "click", ".btn-addrclick", function( e ) {
			
				 var index =  $(this).data("addrindex");
				 var json_addrinfo = $("#customerModal").data("addrlist");
				 
				 if (index > 0) {
					 
					 $("#customer-city").val(json_addrinfo[index].city);
					 $("#customer-zone").val(json_addrinfo[index].zone);
					 $("#customer-address").val(json_addrinfo[index].address);
					 $("#order-contact_name").val(json_addrinfo[index].name);
					 $("#order-contact_phone").val(json_addrinfo[index].phone); 
					 
				 } else {
					 $("#customer-city").val("0");
					 $("#customer-zone").val("0");
					 $("#customer-address").val("");
					 $("#order-contact_name").val("");
					 $("#order-contact_phone").val(""); 
					 
					 
				 }
 				 
				 
				 $(".hidden_addrindex").val(index) ;
				 
				 // 
				 
				 
				 $("#customerModal").modal("hide" );
		} ); 
		 
		
		
		
		
    ');
?>