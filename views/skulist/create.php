<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SkuList */

$this->title = 'Create Sku List';
$this->params['breadcrumbs'][] = ['label' => 'Sku Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sku-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
