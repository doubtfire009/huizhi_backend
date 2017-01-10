<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MinutesResSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minutes-res-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'work_date') ?>

    <?= $form->field($model, 'line_id') ?>

    <?= $form->field($model, 'minutes_morning') ?>

    <?= $form->field($model, 'minutes_afternoon') ?>

    <?php // echo $form->field($model, 'minutes_night') ?>

    <?php // echo $form->field($model, 'minutes_allday') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
