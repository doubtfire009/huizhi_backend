<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerAddrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户地址列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-addr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建客户地址', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          
			['attribute'=>'cust_id',
				'format'=>'raw',
					'value' => function ($model) { 
						 return Html::a($model->cust_id, ['/customer/view','id'=>$model->cust_id]);
					}, 
					 
			
			],
          
			['attribute'=>'city',
					'value' => function ($model) { 
							return Yii::$app->params['citylist'][$model->city] ;
					}, 
					'filter' => Yii::$app->params['citylist'],   
			
			],
			['attribute'=>'zone',
					'value' => function ($model) { 
							return Yii::$app->params['zonelist'][$model->zone] ;
					}, 
					'filter' => Yii::$app->params['zonelist'], 
			
			],
            'address',
           
			 ['attribute'=>'main_addr',
					'value' => function ($model) { 
							return Yii::$app->params['boollist'][$model->main_addr] ;
					}, 
					'filter' => Yii::$app->params['boollist'], 
			
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
