<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = '汇至美家后台管理';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>汇至美家后台管理!</h1>

        <p class="lead">多城市，多服务品类的上门服务管理系统</p>
	</div>
         

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>系统管理员</h2>

                <p>请用admin,admin登陆 
			 
				 </p> 
            </div>
           
           
        </div>
		<div class="row">
			<div class="col-lg-4">
				<ul  >
					 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('shifu/index', true);?>">师傅 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('customer/index', true);?>">客户 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('customeraddr/index', true);?>">客户地址 &raquo;</a></li>  
					<li role="presentation" class="divider"></li>

						 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute(['minutesres/index','sort'=>'allocated_minutes'], true);?>">某天是否可以接单 &raquo;</a></li>
					
					
				</ul>
			 
				
				
			</div>
			<div class="col-lg-4">
				<ul  >
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('srvzone/index', true);?>">服务区域 &raquo;</a></li> 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('category/index', true);?>">服务类别 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('skulist/index', true);?>">主SKU管理 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('product/index', true);?>">服务商品 &raquo;</a></li> 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('coupon/index', true);?>">优惠券管理 &raquo;</a></li>
				 
				</ul>
				
			</div>
			<div class="col-lg-4">
			
				<ul  > 
				 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('order/index', true);?>">订单 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('orderitem/index', true);?>">订单下的商品 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('orderlog/index', true);?>">订单处理日志 &raquo;</a></li> 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('payment/index', true);?>">支付记录 &raquo;</a></li> 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('review/index', true);?>">用户评价 &raquo;</a></li> 
				 
					
				</ul>
			<p>查看某天的师傅派单信息</p>	
				<ul>  
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('assign/index', true);?>">派单表 &raquo;</a></li> 
				</ul>
				
			</div>
		
		</div>
		<hr/>
		<div class="row">
			<div class="col-lg-6"> 
			<h2>客服功能</h2>
			
				<ul  > 
				 
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('assign/index', true);?>">派单表 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('orderitem/index', true);?>">订单统计 &raquo;</a></li>
					<li><a class="btn2 btn2-default" href="<?php echo Url::toRoute('minutesres/index', true);?>">某天是否可以接单 &raquo;</a></li>
					
				</ul>
				
			
			
			
			
			</div>
			<div class="col-lg-6">
			 <h2>财务人员登陆</h2>
			 

			 </div>
		</div>
		
		<div class="row">
			<h2>一些约定配置</h2>
			<p>为简化系统操作，一些城市,产品线的定义，在params.php中定义，不提供通过WEB增删改功能<br/>
	
			
			</p>
			 <div class="col-lg-4">
				<h2>城市</h2>
				<ul>
				<?php $arr_list = Yii::$app->params['citylist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul>
			 

               
            </div>
           
            <div class="col-lg-4">
                <h2>产品线</h2>
				 
				 <ul>
				<?php $arr_list = Yii::$app->params['linelist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul>
                 
            </div>
			  <div class="col-lg-4">
                <h2>服务的一级类别</h2>
				 
				 <ul>
				<?php $arr_list = Yii::$app->params['catlist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul>
                 
            </div>
			<div class="col-lg-4">
                <h2>商家ID</h2>
				  
				<ul>
				<?php $arr_list = Yii::$app->params['bizlist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul> 
                 
            </div>
			<div class="col-lg-4">
                <h2>上下班状态</h2>
				  
				<ul>
				<?php $arr_list = Yii::$app->params['worklist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul> 
                 
            </div>
			<div class="col-lg-4">
                <h2>区域列表</h2>
				<p>区域会针对每个城市都有定义，暂时我们只显示上海的几个区域</p>
				  
				<ul>
				<?php $arr_list = Yii::$app->params['zonelist']; 
					foreach ($arr_list as $k=>$v) {
				?>
					<li><?php echo $k;?>:<?php echo $v;?></li>
				<?php 
				
					}
				?>
				</ul> 
                 
            </div>
		
		</div>

    </div>
 
