<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShifuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shifu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'sex') ?>

    <?= $form->field($model, 'idcard') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'zone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'skills_all') ?>

    <?php // echo $form->field($model, 'skills') ?>

    <?php // echo $form->field($model, 'wx_openid') ?>

    <?php // echo $form->field($model, 'work_status') ?>

    <?php // echo $form->field($model, 'total_jobs') ?>

    <?php // echo $form->field($model, 'avg_points') ?>

    <?php // echo $form->field($model, 'avg_ontime') ?>

    <?php // echo $form->field($model, 'avg_cloth') ?>

    <?php // echo $form->field($model, 'avg_intro') ?>

    <?php // echo $form->field($model, 'avg_clean') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'join_date') ?>

    <?php // echo $form->field($model, 'leave_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
