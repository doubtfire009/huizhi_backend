<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SfMinute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sf-minute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shifu_id')->textInput() ?>

    <?= $form->field($model, 'work_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allocated_minutes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
