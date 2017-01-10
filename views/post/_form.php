<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
use piaoyii\summernote\Summernote;
 

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
 

	<?= $form->field($model, 'logo')->widget('pjkui\kindeditor\KindEditor',
		['clientOptions'=>['allowFileManager'=>'false','allowUpload'=>'true'],
		'editorType'=>'image-dialog']) ?>

   
	
 
	<?= $form->field($model, 'content')->widget('pjkui\kindeditor\KindEditor',['clientOptions'=>['allowFileManager'=>'false','allowUpload'=>'true']]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
