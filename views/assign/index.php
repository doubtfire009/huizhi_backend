<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单指派';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建订单指派', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'schedule_date',
            
			['attribute'=>'schedule_timeinfo',
					'value' => function ($model) { 
							return Yii::$app->params['timelist2'][$model->schedule_timeinfo] ;
					}, 
					'filter' => Yii::$app->params['timelist2'], 
			
			],
            'order_id',
            'shifu_id',
             'minutes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
