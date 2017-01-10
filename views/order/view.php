<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>订单ID: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_no',
            'order_status',
            'customer_id',
        
        
			['attribute'=>'order_city','value'=>Yii::$app->params['citylist'][$model->order_city]],
			['attribute'=>'order_zone','value'=>Yii::$app->params['zonelist'][$model->order_zone] ],
        
            'order_addr',
            'order_lat',
            'order_lng',
            'order_geohash',
            'order_amt',
			'minutes_need',
            'payment_need',
         
			 'date_created:datetime',
          //  'date_pay:datetime',
            'payment_paid',
            'schedule_date',
          
			['attribute'=>'schedule_timeinfo','value'=>Yii::$app->params['timelist'][$model->schedule_timeinfo] ],
            'final_time',
            'final_shifu',
            'minutes_need',
            ['attribute'=>'order_note','format'=>'ntext'],
			['attribute'=>'order_note2','format'=>'ntext'],
			 
        ],
    ]) ?>

</div>
