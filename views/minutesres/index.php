<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Shifu;
use app\models\SrvZone;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MinutesResSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '预约资源';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minutes-res-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加单人资源', ['create'], ['class' => 'btn btn-success']) ?>
        <a id="batch_excel_btn" class="btn btn-primary">批量资源</a>
        <input type="file" id="batch_excel_file" style="display: none">
        
        <a class="btn btn-info" href="<?php echo constant("IMGURL")."/files/minutesres/batch_excel/MinutesResBatch.xlsx" ?>" download="data_sheet.xlsx">
        下载数据模板
        </a>
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            ['attribute'=>'shifu_id',
					'value' => function ($model) { 
                                                        return (new Shifu)->list_all()[$model->shifu_id];
                                                        
                                        }, 
//					'filter' => Yii::$app->params['linelist'],   
			
			],
          ['attribute'=>'work_date',
					'value' => function ($model) { 
                                                        return date('Y-m-d',$model->work_date);
                                                        
                                        }, 
//					'filter' => Yii::$app->params['linelist'],   
			
			],
	    ['attribute'=>'line_id',
					'value' => function ($model) { 
							return Yii::$app->params['linelist'][$model->line_id] ;
					}, 
					'filter' => Yii::$app->params['linelist'],   
			
			],
            ['attribute'=>'srvzone_id',
					'value' => function ($model) { 
							 return (new SrvZone)->list_all()[$model->srvzone_id];
					}, 
					'filter' => Yii::$app->params['zonelist'],   
			
			],
            
            ['attribute'=>'minutes_morning',
					'value' => function ($model) { 
							 return Yii::$app->params['workstatuslist'][$model->minutes_morning];
					}, 
					'filter' => Yii::$app->params['workstatuslist'],   
			],
            ['attribute'=>'minutes_afternoon',
					'value' => function ($model) { 
							 return Yii::$app->params['workstatuslist'][$model->minutes_afternoon];
					}, 
					'filter' => Yii::$app->params['workstatuslist'],   
			],
            ['attribute'=>'minutes_night',
					'value' => function ($model) { 
							 return Yii::$app->params['workstatuslist'][$model->minutes_night];
					}, 
					'filter' => Yii::$app->params['workstatuslist'],   
			],
            
            'work_status',
//            ['attribute'=>'work_status',
//					'value' => function ($model) { 
//                                                        $arr = explode("|",$model->work_status); 
//                                                        foreach($arr as $k=>$v){
//                                                            $arr[$k] = Yii::$app->params['workstatuslist_minutesres'][$v];
//                                                        }
//							 return implode("|", $arr);
//					}, 
//					
//			],                                 
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
