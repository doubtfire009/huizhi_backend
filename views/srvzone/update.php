<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SrvZone */

$this->title = '修改服务区域: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '服务区域', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="srv-zone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
