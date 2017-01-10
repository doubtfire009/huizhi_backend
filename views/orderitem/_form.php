<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_num')->textInput() ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->textInput()->hint('该产品的品牌 id') ?>

    <?= $form->field($model, 'sku_id')->textInput()->hint('该产品的sku id') ?>
 
	<?= $form->field($model, 'timeinfo_id')->dropDownList(Yii::$app->params['timelist']) ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>
	
	 <?= $form->field($model, 'total_minutes')->textInput(['maxlength' => true]) ?>
	
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
