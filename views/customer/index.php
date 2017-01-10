<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建客户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mobile',
            'name',
        //    'sex',
         
			 
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
            // 'wx_openid',
            // 'total_jobs',
            // 'date_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
