<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//AppAsset::register($this);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>汇至后台</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php foreach(AppAsset::css_display() as $k=>$v){
      if($k==1){
          echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">';
          echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">';
      }
      echo '<link rel="stylesheet" href="'.Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$v.'">';
  }?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>汇至</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>汇至</b>后台</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/img/user2-160x160.jpg"?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=Yii::$app->session->get('adminname');?></p>

        </div>
      </div>
      <!-- search form -->
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!--<li class="header"><span class="text-aqua">第一版</span></li>-->
        <li class="header text-aqua">第一版</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-arrow-down"></i> <span>订单管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=order"?>"><i class="fa fa-circle-o"></i> 订单添加</a></li>
            
          </ul>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=calendar"?>"><i class="fa fa-circle-o"></i> 订单日历</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-reorder"></i>
            <span>类别管理</span>
<!--            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>-->
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> 地区管理</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> 产品类别管理</a></li>
          </ul>
        </li>
        
        
        
        
        
      </ul>
    </section>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?= $content ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>制作</b> IT部
    </div>
    <strong>汇至出品 &copy; 2014-2016 </strong> 必属精品
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/js/jquery-2.2.3.min.js' ?>"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<?php foreach(AppAsset::js_display as $k=>$v){
    if($k==1){
        echo '<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>';
        ?>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
          </script>
            <?php
    }
    echo '<script src="'.Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$v.'"></script>';
}?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/js/bootstrap.min.js' ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<!-- AdminLTE App -->
<script src=<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/js/app.min.js"?>></script>
<!-- Calendar -->
<script src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/js/daterangepicker.js"?>"></script>
<script src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/js/bootstrap-datepicker.js"?>"></script>
<script src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/js/calendar.js"?>"></script>

</body>
</html>


