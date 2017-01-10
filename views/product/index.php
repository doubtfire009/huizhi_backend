<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category ;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '服务产品';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel,
                                        'line_id'=>$line_id,
                                        'city_id'=>$city_id,
                                        'cat_id'=>$cat_id,
                        ]); ?>

    <p>
        <?= Html::a('新建服务产品', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
           
			
			['attribute'=>'line_id',
					'value' => function ($model) { 
							return Yii::$app->params['linelist'][$model->line_id] ;
					}, 
					'filter' => Yii::$app->params['linelist'],   
			
			],
			
			['attribute'=>'city_id',
					'value' => function ($model) { 
							return Yii::$app->params['citylist'][$model->city_id] ;
					}, 
					'filter' => Yii::$app->params['citylist'],   
			
			],
			
			['attribute'=>'cat_id',
					'value' => function ($model) { 
							$arr_category = (new Category())->list_all();
							return $arr_category[$model->cat_id] ;
					}, 
					'filter' => Yii::$app->params['catlist'],   
			
			],
         
            // 'content:ntext',
            // 'logo',
            // 'old_price',
            // 'price',
            // 'date_created',
            // 'status',
            // 'brand_list',
            // 'sku_list',
            // 'time_list',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
