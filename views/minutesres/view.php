<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MinutesRes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '预约资源', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minutes-res-view">

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
            'work_date',
           
			['attribute'=>'line_id','value'=>Yii::$app->params['linelist'][$model->line_id]],
            'minutes_morning',
            'minutes_afternoon',
            'minutes_night',
            'minutes_allday',
        ],
    ]) ?>

</div>
