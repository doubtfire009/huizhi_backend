<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = '新建订单';
$this->params['breadcrumbs'][] = ['label' => '订单列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?>  <button class='btn btn-primary btn-small'>点此查看未来一段时间的资源占用</button>   </h1>
	<p>新建订单后，记得更新资源占用表</p>

    <?= $this->render('_form', [
        'model' => $model,
		'model_customer'=>$model_customer,
		'model_orderitem'=>$model_orderitem,
		'model_product'=>$model_product,
		'cat_id'=>$cat_id,
		'arr_skulist'=>$arr_skulist,
    ]) ?>

</div>
