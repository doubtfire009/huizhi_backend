<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('新建预约资源', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'work_date',
          
			['attribute'=>'line_id',
					'value' => function ($model) { 
							return Yii::$app->params['linelist'][$model->line_id] ;
					}, 
					'filter' => Yii::$app->params['linelist'],   
			
			],
            'minutes_morning',
            'minutes_afternoon',
            'minutes_night',
            'minutes_allday',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
