<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Product ;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SkuListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '主SKU管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sku-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建主SKU', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//			'prod_id',
            ['attribute'=>'prod_id',
					'value' => function ($model) { 
							$arr_product = (new Product())->list_all();

							return $arr_product[$model->prod_id] ;
					}, 

			
			],
            'name',
            'base_mins',
            'step_mins',
            'base_price',
            'step_price',
            'step_price2',
            'step_price3',
            'step_price4',
            'min_nums',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
