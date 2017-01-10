<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderLog */

$this->title = '新建订单日志';
$this->params['breadcrumbs'][] = ['label' => '订单日志', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
