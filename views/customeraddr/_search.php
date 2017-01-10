<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerAddrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-addr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cust_id') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'zone') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'main_addr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
