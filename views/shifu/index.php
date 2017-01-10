<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SrvZone;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ShifuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '师傅列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', [
                                'model' => $searchModel,
//                                'id'=>$id,
//                                'mobile'=>$mobile,
//                                'name'=>$name,
        ]); ?>

    <p>
        <?= Html::a('新建师傅', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
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
			['attribute'=>'service_zone',
					'value' => function ($model) { 
                                                        return (new SrvZone)->list_all()[$model->service_zone];
//							return Yii::$app->params['zonelist'][$model->zone] ;
					}, 
//					'filter' => Yii::$app->params['zonelist'], 
			
			],
			['attribute'=>'work_status',
				'value' => function ($model) {
				 
					return Yii::$app->params['workstatuslist'][$model->work_status] ;
				},
				'filter' => Yii::$app->params['workstatuslist'], 
			],

			 
        //    'sex',
         //   'idcard',
            // 'birthday',
            // 'city',
            // 'zone',
            // 'address',
            // 'skills_all',
            ['attribute'=>'line_id',
				'value' => function ($model) {
				 
					return Yii::$app->params['linelist'][$model->line_id] ;
				},
				'filter' => Yii::$app->params['linelist'], 
			],
            ['attribute'=>'off_weekidx',
				'value' => function ($model) {
				 
					return Yii::$app->params['off_weekidx_list'][$model->off_weekidx] ;
				},
				'filter' => Yii::$app->params['off_weekidx_list'], 
			],
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
