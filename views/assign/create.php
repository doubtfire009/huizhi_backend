<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Assign */

$this->title = '新建订单指派';
$this->params['breadcrumbs'][] = ['label' => '订单指派列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
