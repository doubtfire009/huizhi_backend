<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = '预览订单: ' . $model->id.', 订单号后面一位+1';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_preview', [
        'model' => $model,
		'model_customer'=>$model_customer,
		'model_orderitem'=>$model_orderitem,
		'model_product'=>$model_product,
		'old_model' => $old_model,
		'old_model_customer'=>$old_model_customer,
		'arr_skulist'=>$arr_skulist,
    ]) ?>

</div>
