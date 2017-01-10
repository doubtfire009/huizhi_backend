<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShifuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '师傅列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建师傅', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mobile',
            'name',
		 
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
			['attribute'=>'work_status',
				'value' => function ($model) {
				 
					return Yii::$app->params['worklist'][$model->work_status] ;
				},
				'filter' => Yii::$app->params['worklist'], 
			],

			 
        //    'sex',
         //   'idcard',
            // 'birthday',
            // 'city',
            // 'zone',
            // 'address',
            // 'skills_all',
            // 'skills',
            // 'wx_openid',
            // 'work_status',
            // 'total_jobs',
            // 'avg_points',
            // 'avg_ontime:datetime',
            // 'avg_cloth',
            // 'avg_intro',
            // 'avg_clean',
            // 'date_created',
            // 'join_date',
            // 'leave_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
