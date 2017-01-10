<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_no') ?>

    <?= $form->field($model, 'order_status') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'order_city') ?>

    <?php // echo $form->field($model, 'order_zone') ?>

    <?php // echo $form->field($model, 'order_addr') ?>

    <?php // echo $form->field($model, 'order_lat') ?>

    <?php // echo $form->field($model, 'order_lng') ?>

    <?php // echo $form->field($model, 'order_geohash') ?>

    <?php // echo $form->field($model, 'order_amt') ?>

    <?php // echo $form->field($model, 'jifen_used') ?>

    <?php // echo $form->field($model, 'jifen_money') ?>

    <?php // echo $form->field($model, 'quan_used') ?>

    <?php // echo $form->field($model, 'yue_used') ?>

    <?php // echo $form->field($model, 'payment_need') ?>

    <?php // echo $form->field($model, 'pay_way') ?>

    <?php // echo $form->field($model, 'date_pay') ?>

    <?php // echo $form->field($model, 'payment_paid') ?>

    <?php // echo $form->field($model, 'schedule_date') ?>

    <?php // echo $form->field($model, 'schedule_timeinfo') ?>

    <?php // echo $form->field($model, 'final_time') ?>

    <?php // echo $form->field($model, 'final_shifu') ?>

    <?php // echo $form->field($model, 'minutes_need') ?>

    <?php // echo $form->field($model, 'order_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
