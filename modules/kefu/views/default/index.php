<?php
	use yii\helpers\Url;
	$this->title = '汇至美家后台管理';

?>
<div class="kefu-default-index">
   
	
	  <div class="jumbotron">
        <h1>汇至美家客服功能! 
		<!--<?= $this->context->action->uniqueId ?> --> </h1>

        <p class="lead">多城市，多服务品类的上门服务管理系统</p>
	</div>
	
	
	   <div class="body-content">

        <div class="row">
		
			<div class="col-lg-4">
				<h3>接待客户</h3>
			 
				<ul> 
				 	<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute(['order/create','cat_id'=>1], true);?>">新建家电清洗订单 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute(['order/create','cat_id'=>2], true);?>">新建空气清洁订单 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/create', true);?>">派单处理 &raquo;</a></li> 
				</ul>
				
				 
			 
				
				
			</div>
			<div class="col-lg-4">
				<h3> 订单处理</h3>
				<ul> 	
				
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute(['order/view','id'=>1], true);?>">订单查询 &raquo;</a></li>	
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute(['order/update','id'=>1], true);?>">订单修改 &raquo;</a></li>
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>">订单列表 &raquo;</a></li>			
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>"><s>异常处理</s> &raquo;</a></li>
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>"><s>退款处理</s> &raquo;</a></li>
				<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>"><s>opencase 处理</s> &raquo;</a></li>
				
				
				</ul>
			</div>
			<div class="col-lg-4">
			 	<h3>后期处理</h3>
			 
				<ul>  
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('feedbacklater/index', true);?>"> 客户后期回访  &raquo;</a></li> 
				 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>"><s>一些报表 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>"><s>2周内的师傅资源分配</s> &raquo;</a></li>
					
					
					
				</ul>
				
			</div>
			
            
           
        </div>
 
		</div>
	
</div>
