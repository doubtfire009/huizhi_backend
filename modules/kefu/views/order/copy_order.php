<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = '复制订单: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '复制';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_copy', [
        'model' => $model,
		'model_customer'=>$model_customer,
		'model_orderitem'=>$model_orderitem,
		'model_product'=>$model_product,
		'arr_orderitems'=>$arr_orderitems,
		'arr_skulist'=>$arr_skulist,
    ]) ?>

</div>
