<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建订单日志', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
          
			['attribute'=>'event_cat',
					'value' => function ($model) { 
							return Yii::$app->params['orderloglevel'][$model->event_cat] ;
					}, 
					'filter' => Yii::$app->params['orderloglevel'], 
			
			],
            'event',
            'event_data',
            // 'date_created',
            // 'customer_id',
            // 'shifu_id',
            // 'kefu_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
