<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SfMinute */

$this->title = '新增记录';
$this->params['breadcrumbs'][] = ['label' => '师傅接单时间状态', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sf-minute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
