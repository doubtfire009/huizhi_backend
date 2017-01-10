<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SrvZone;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SrvZoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '服务区域';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="srv-zone-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建服务区域', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            
            ['attribute'=>'addr_list',
					'value' => function ($model) { 
                                                        $arr = explode("|",$model->addr_list); 
                                                        
                                                        foreach($arr as $k=>$v){
                                                            $arr[$k] = Yii::$app->params['zonelist'][$v];
                                                        }
							 return implode("|", $arr);
					}, 
					
			],  
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
