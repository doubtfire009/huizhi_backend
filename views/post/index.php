<?php

use yii\helpers\Html;
use yii\grid\GridView;
use pjkui\kindeditor\Kindeditor;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
		    ['attribute'=>'logo','format'=> ['image',['width'=>'100','height'=>'100']]],
            'title',
            ['attribute'=>'content','format'=>'html'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
