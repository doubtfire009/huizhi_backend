<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SkuListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sku-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
  <div class="row">
      <div class="col-lg-3"> <?= $form->field($model, 'id') ?></div>
      <div class="col-lg-3"> <?= $form->field($model, 'name') ?></div>
  </div>

    

    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
