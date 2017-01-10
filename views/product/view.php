<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category ;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$arr_category = (new Category())->list_all();
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
         
			['attribute'=>'line_id','value'=>Yii::$app->params['linelist'][$model->line_id]],
			['attribute'=>'city_id','value'=>Yii::$app->params['citylist'][$model->city_id]],
			['attribute'=>'cat_id','value'=>$arr_category[$model->cat_id]],
		 
            [
            'attribute'=>'icon',
            'value' =>$model->icon,
            'format' => ['image',['width'=>'100','height'=>'100']] ,
			 ],
			 [
            'attribute'=>'logo',
            'value' =>$model->logo,
            'format' => ['image',['width'=>'100','height'=>'100']] ,
			 ],
            [
            'attribute'=>'bigimage',
            'value' =>$model->bigimage,
            'format' => ['image',['width'=>'100','height'=>'100']] ,
			 ],
			[ 'attribute'=>'quality_desc','format'=>'html'],
			[ 'attribute'=>'process_desc','format'=>'html'],
			[ 'attribute'=>'price_desc','format'=>'html'],
//            'old_price',
//            'price',
            'date_created:datetime',
            'status',
            'brand_list',
//            'sku_list',
//            'time_list',
            'sort'
        ],
    ]) ?>

</div>
