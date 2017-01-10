<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); 
?>
    <div class="row">
        <div class="col-lg-3"> <?= $form->field($model, 'id') ?> </div>
        <div class="col-lg-3"> <?= $form->field($model, 'title') ?> </div>
        <div class="col-lg-3"> <?= $form->field($model, 'line_id')->dropDownList($line_id)?></div>
        <div class="col-lg-3"> <?= $form->field($model, 'city_id')->dropDownList($city_id) ?> </div>
        <div class="col-lg-3"> <?= $form->field($model, 'cat_id')->dropDownList($cat_id) ?> </div>
    </div>

    

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'old_price') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'brand_list') ?>

    <?php // echo $form->field($model, 'sku_list') ?>

    <?php // echo $form->field($model, 'time_list') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
