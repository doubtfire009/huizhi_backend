<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerAddr */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Addrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-addr-view">

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
         
			 ['attribute'=>'cust_id','format'=>'html','value'=>Html::a($model->cust_id, ['/customer/view','id'=>$model->cust_id])],
			 ['attribute'=>'city','value'=>Yii::$app->params['citylist'][$model->city]],
			 ['attribute'=>'zone','value'=>Yii::$app->params['zonelist'][$model->zone] ],
			   'address','name',
			   'phone',
            'main_addr',
        ],
    ]) ?>

</div>
