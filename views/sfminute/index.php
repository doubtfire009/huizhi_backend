<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SfMinuteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '师傅接单时间状态';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sf-minute-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增记录', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<p>按已经分配分钟的从小到多排列</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shifu_id',
            'work_date',
            'allocated_minutes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
