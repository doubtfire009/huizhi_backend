<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MinutesRes */

$this->title = '新建预约资源';
$this->params['breadcrumbs'][] = ['label' => '预约资源', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minutes-res-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
