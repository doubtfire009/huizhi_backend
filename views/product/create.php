<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = '新建服务产品';
$this->params['breadcrumbs'][] = ['label' => '服务产品列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
