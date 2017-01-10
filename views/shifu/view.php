<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shifu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '师傅列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'mobile',
            'name',
          
			['attribute'=>'sex','value'=>Yii::$app->params['sexlist'][$model->sex]],
            'idcard',
            'birthday',
            ['attribute'=>'city','value'=>Yii::$app->params['citylist'][$model->city]],
            ['attribute'=>'zone','value'=>Yii::$app->params['zonelist'][$model->zone] ],
            'address',
            'skills_all',
            'skills',
       
			['attribute'=>'work_status','value'=>Yii::$app->params['worklist'][$model->work_status]],
            'total_jobs',
            'avg_score',
            'avg_ontime',
            'avg_cloth',
            'avg_intro',
            'avg_clean',
			'date_created:datetime', 
            'join_date',
            'leave_date',
			['attribute'=>'sf_type','value'=>Yii::$app->params['sftypelist'][$model->sf_type]],
			'latitude',
			'longitude',
			//'geohash',
			'password',
        ],
    ]) ?>

</div>
