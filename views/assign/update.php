<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assign */

$this->title = '修改订单指派: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '订单指派', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="assign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
