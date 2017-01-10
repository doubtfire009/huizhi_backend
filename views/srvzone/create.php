<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SrvZone */

$this->title = '新建服务区域';
$this->params['breadcrumbs'][] = ['label' => '服务区域', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="srv-zone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
