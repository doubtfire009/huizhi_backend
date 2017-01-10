<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'event_cat')->dropDownList(Yii::$app->params['orderloglevel'], ['prompt' => '']) ?>

    <?= $form->field($model, 'event')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_data')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'shifu_id')->textInput() ?>

    <?= $form->field($model, 'kefu_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
