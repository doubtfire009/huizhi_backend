<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        
    </p-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
         
			['attribute'=>'order_no',
					'value' => function ($model) { 
							return  $model->order_no.' '.$model->update_count ;
					}, 
					 
			
			],
        
         //   'customer_id',
        //    'date_created:datetime',
		//	'date_pay:datetime',
			'order_status',
			
        
		/* 	 ['attribute'=>'order_city',
					'value' => function ($model) { 
							return Yii::$app->params['citylist'][$model->order_city] ;
					}, 
					'filter' => Yii::$app->params['citylist'],   
			
			],
          
			 ['attribute'=>'order_zone',
					'value' => function ($model) { 
							return Yii::$app->params['zonelist'][$model->order_zone] ;
					}, 
					'filter' => Yii::$app->params['zonelist'], 
			
			],
			*/
			 
             'order_addr',
            // 'order_lat',
            // 'order_lng',
            // 'order_geohash',
             'order_amt',
            // 'jifen_used',
            // 'jifen_money',
            // 'quan_used',
            // 'yue_used',
            // 'payment_need',
            // 'pay_way',
                        // 'payment_paid',
             'schedule_date',
        	['attribute'=>'schedule_timeinfo',
					'value' => function ($model) { 
							return Yii::$app->params['timelist'][$model->schedule_timeinfo] ;
					}, 
					'filter' => Yii::$app->params['timelist'],  

			],
            // 'final_time',
            // 'final_shifu',
            // 'minutes_need',
            // 'order_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
