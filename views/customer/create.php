<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = '新建客户';
$this->params['breadcrumbs'][] = ['label' => '客户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
