<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product ;
/* @var $this yii\web\View */
/* @var $model app\models\SkuList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sku-list-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'prod_id')->dropDownList( (new Product())->list_all() )  ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_mins')->textInput() ?>

    <?= $form->field($model, 'step_mins')->textInput() ?>

    <?= $form->field($model, 'base_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step_price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'step_price2')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'step_price3')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'step_price4')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'min_nums')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
