<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shifu */

$this->title = '修改师傅: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '师傅列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="shifu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
