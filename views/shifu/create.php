<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shifu */

$this->title = '新建师傅';
$this->params['breadcrumbs'][] = ['label' => '师傅列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shifu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
