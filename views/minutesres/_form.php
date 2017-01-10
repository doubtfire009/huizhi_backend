<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Shifu;
use app\models\SrvZone;
/* @var $this yii\web\View */
/* @var $model app\models\MinutesRes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minutes-res-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'work_date')->textInput(['maxlength' => true]) ?>
    <div class="form-group field-minutesres-work_date">
        <label class="control-label" for="minutesres-work_date">日期</label>
        <!--<input id="minutesres-work_date" class="form-control" name="MinutesRes[work_date]" type="text">-->
        <div class="input-group">
            <input id="minutesres-work_date" class="form-control" name="MinutesRes[work_date]" type="text" readonly data-date-format="yyyy-mm-dd">
                    <span class="input-group-btn">
                      <button id="minutesres-work_date_btn" type="button" class="btn btn-info btn-flat"><i class="fa fa-fw fa-calendar"></i></button>
                    </span>
              </div>
        <div class="help-block"></div>
    </div>
    
    <?= $form->field($model, 'shifu_id')->dropDownList((new Shifu)->list_all())  ?> 
    <?= $form->field($model, 'line_id')->dropDownList(Yii::$app->params['linelist'])  ?> 
    <?= $form->field($model, 'srvzone_id')->dropDownList((new SrvZone)->list_all())  ?> 

    <?= $form->field($model, 'minutes_morning')->dropDownList(Yii::$app->params['workstatuslist'])->hint('上午可用（1:可用，0：不可用）') ?>

    <?= $form->field($model, 'minutes_afternoon')->dropDownList(Yii::$app->params['workstatuslist'])->hint('下午可用（1:可用，0：不可用）') ?>

    <?= $form->field($model, 'minutes_night')->dropDownList(Yii::$app->params['workstatuslist'])->hint('晚上可用（1:可用，0：不可用）') ?>

    <?php // echo $form->field($model, 'work_status')->dropDownList(Yii::$app->params['workstatuslist_minutesres'])->hint('出勤标记：1：正常状态;2:因公状态;。填写时需用以下格式：2|1|1，表示：早上因公办事，如果时间少于规定长度不算缺勤。下午正常状态，如有时间少于规定长度则为缺勤') ?>
    <?=  $form->field($model, 'work_status')->textinput()->hint('出勤标记：1：正常状态;2:因公状态;。填写时需用以下格式：2|1|1，表示：早上因公办事，如果时间少于规定长度不算缺勤。下午正常状态，如有时间少于规定长度则为缺勤。格式不对则报错') ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
