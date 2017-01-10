<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Category ;
use yii\helpers\Url;

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
				  <?= $form->field($model_customer, 'mobile')->textInput() ?> 
				 
				   <span class="input-group-btn" style="vertical-align:top" >
						<button class="btn btn-default" title="查找已存在的用户" >
							<span class="glyphicon glyphicon-search"></span>
						</button>
				  </span>

	  
			</div>

		</div>
		<div class="col-lg-6">
			 <?= $form->field($model_customer, 'name')->textInput() ?> 
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			 <?= $form->field($model_customer, 'city')->dropDownList(Yii::$app->params['citylist']) ?> 
			  
		</div>
		<div class="col-lg-3"> 
			 <?= $form->field($model_customer, 'zone')->dropDownList(Yii::$app->params['zonelist'])  ?>
		</div>
		<div class="col-lg-6">
			 <?= $form->field($model_customer, 'address')->textInput()->label('详细地址')->hint('根据详细地址得出服务区,LBS') ?> 
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
	
	
	<h2>服务内容<small>VIP价格 会员价  淘宝价</small></h2>
	<div class="row">
	
	<table class="table table-condensed ">
		<tr><th>序号</th><!--th>服务目录</th--><th>产品</th><th>属性</th><th>单价</th><th>数量</th><th>总价</th><th>总时间</th></tr>
		<?php for ($i=0;$i<25;$i++) { ?>
		<tr>
		  <td><?= $i+1 ?> 
		 
		  <?= Html::dropDownList('cat_id[]', $cat_id, 
			ArrayHelper::map(Category::find()->all(),'id', 'name'),
		  ['class' => 'dropdownlist dropdown_cat hidden','prompt'=>'选择类别']) ?> 
		  </td>
		  <td>  <?= Html::dropDownList('prod_name[]', null, 
			array(),
		  ['class' => 'dropdownlist dropdown_name','prompt'=>'选择名字']) ?> 

		  </td> 		  
		  <td> <?= Html::dropDownList('sku_id[]', null, 
				array(),
				['class' => 'dropdownlist dropdown_sku','prompt'=>'选择SKU']) ?> </td>

		  <td> <?=  Html::TextInput('prod_price[]', null ,   ['class' => 'input_prod_price'])  ?> </td>
		  <td>
		  <?=  Html::TextInput('prod_num[]', null ,   ['class' => 'input_prod_num '])  ?>
		
		 
		  <?=  Html::hiddenInput('sku_base_mins[]', null ,   ['class' => 'input_sku_base_mins '])  ?>
		  <?=  Html::hiddenInput('sku_step_mins[]', null ,   ['class' => 'input_sku_step_mins '])  ?>
		  <?=  Html::hiddenInput('sku_base_price[]', null ,   ['class' => 'input_sku_base_price '])  ?>
		  <?=  Html::hiddenInput('sku_step_price[]', null ,   ['class' => 'input_sku_step_price '])  ?>
		  <?=  Html::hiddenInput('sku_min_nums[]', null ,   ['class' => 'input_sku_min_nums '])  ?>
		  
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
		
		<div class="col-lg-4">
			 <?= $form->field($model, 'source_pay')->textInput()->label('渠道已收款') ?> 
		</div>
		 <div class="col-lg-3">
			 <?= $form->field($model, 'source_dikou')->textInput()->label('抵扣') ?> 
		</div>
		<div class="col-lg-5">
			 <?= $form->field($model, 'payment_need')->textInput()->label('需上门收款') ?> 
		</div>
		<div class="col-lg-12">
		  <?= $form->field($model, 'order_note')->textArea(['rows' => '6'])->hint('备注只能添加,不能删除')?>
		</div>
	</div>
	 
	 <?=  $form->field($model,'order_amt')->textInput()->hiddenInput(['class'=>'order_amt'])->label(false); ?>
	  <?=  $form->field($model,'minutes_need')->textInput()->hiddenInput(['class'=>'minutes_need'])->label(false); ?>
  
	<div class="row">
	
		<div class="col-lg-6">
			 <?= $form->field($model, 'schedule_date')->textInput() ?>  
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
  <?php
    $this->registerJs('
        // 类别改变
        $("tr .dropdown_cat").change(function() {
            //市id值
            var cat_id = $(this).val();
            $(this).closest("tr").find(".dropdown_name").html("<option value=\"0\">请选择服务名</option>");
			$(this).closest("tr").find(".dropdown_sku").html("<option value=\"0\">请选择SKU</option>");
			$(this).closest("tr").find(".input_price").val("0");
			$(this).closest("tr").find(".input_num").val("0");
			
          
            if (cat_id > 0) {
                getProd(cat_id, $(this).closest("tr").find(".dropdown_name") );
            }
        });
		//类别trigger
		$("tr .dropdown_cat").trigger("change") ;

        //服务名改变
        $("tr .dropdown_name").change(function() {
            //区id值
            var prod_id = $(this).val();
			$(this).closest("tr").find(".dropdown_sku").html("<option value=\"0\">请选择SKU</option>");
            if (prod_id > 0) {
                getSku(prod_id, $(this).closest("tr").find(".dropdown_sku"));
            }
        });
		
		 //SKU 改变
        $("tr .dropdown_sku").change(function() {
            //区id值
            var sku_id = $(this).val();
			// $(this).closest("tr").find(".input_price").val("0"+sku_id);
            if (sku_id > 0) {
                getSkuinfo(sku_id,$(this).closest("tr") );
            }
        });

		 // 数量改变
        $("tr .input_prod_num").change(function() {
            //区id值
			var num = $(this).val();
			var obj = $(this).closest("tr") ;
			console.log("changed:"+ num);
			var base_price = obj.data("input_sku_base_price"  );
			var step_price = obj.data("input_sku_step_price"  );
			var base_mins =  obj.data("input_sku_base_mins"  );
			var step_mins =  obj.data("input_sku_step_mins"  );
            num = parseInt(num);
			base_price = parseFloat(base_price) ;
			step_price = parseFloat(step_price) ;
			base_mins = parseFloat(base_mins) ;
			step_mins = parseFloat(step_mins) ;
			var total_price = base_price + num * step_price ;
			var total_mins = base_mins + num * step_mins ;
			
			if (num == "0") {
				total_price = 0;
				total_mins = 0;
			}
			
			$(this).closest("tr").find(".input_total_price").val(total_price);
			$(this).closest("tr").find(".input_total_mins").val(total_mins );
			js_update_total_price();
			js_update_total_mins();
			
        });
		
		function js_update_total_price()
		{
				var total = 0 ;
				 $("tr .input_total_price").each(function (i, item) {
				  var tmp1 =  ( $(item).val()) ;
				    console.log(tmp1);
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
				  console.log(tmp1);
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
    ');
?>