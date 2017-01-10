<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use app\models\Category ;
use app\common\Summernote;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->hint("举例：油烟机|油烟机清洗") ?>

    <?= $form->field($model, 'line_id')->dropDownList(Yii::$app->params['linelist'])  ?> 
	
    <?= $form->field($model, 'city_id')->dropDownList(Yii::$app->params['citylist'])  ?>
    <?= $form->field($model, 'cat_id')->dropDownList( (new Category())->list_all() )  ?>
    
    <?= $form->field($model, 'icon')->textInput()->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'logo')->textInput()->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'bigimage')->textInput()->hiddenInput()->label(false) ?>
    <div class="post">

        <div class="user-block">
            <div class="col-sm-4" id="icon">
                <div class="icon_logo_bigimage_button_box">
                    <button id="product_icon_button" type="button" class="btn btn-sm btn-block btn-primary">上传小图标</button>
                    <input type="file" id="product_icon_file"  style="display:none">
                    <div class="info-box">
                       购物车icon
                        尺寸：64*64px
                    </div>
                </div>
                <div class="icon_logo_bigimage_box" id="product_icon_img">
                    <img src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/img/product/system/product_question_mark.jpg"?>">

                </div>
            </div>
            <div class="col-sm-4" id="logo">
                <div class="icon_logo_bigimage_button_box">
                    <button id="product_logo_button" type="button" class="btn btn-sm btn-block btn-success">上传头像</button>
                    <input type="file" id="product_logo_file" style="display:none">
                    <div class="info-box">
                       目录页小图尺寸：252*256px

                    </div>
                </div>
                <div class="icon_logo_bigimage_box" id="product_logo_img">
                    
                    <img src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/img/product/system/product_question_mark.jpg"?>">

                </div>
            </div>
            <div class="col-sm-4" id="bigimage">
                <div class="icon_logo_bigimage_button_box">
                    <button id="product_bigimage_button" type="button" class="btn btn-sm btn-block btn-info">上传大图标</button>
                    <input type="file" id="product_bigimage_file" style="display:none">
                    <div class="info-box">
                       主图尺寸：750*220px

                    </div>
                </div>
                <div class="icon_logo_bigimage_box" id="product_bigimage_img"> 
                    <img src="<?= Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/img/product/system/product_question_mark.jpg"?>">
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
    
	<?= $form->field($model, 'content')->widget('app\common\Summernote',
		['clientOptions'=>[]]) ?>
        <?= $form->field($model, 'price_desc')->widget('app\common\Summernote',
		['clientOptions'=>[]]) ?>
        <?= $form->field($model, 'process_desc')->widget('app\common\Summernote',
		['clientOptions'=>[]]) ?>
        <?= $form->field($model, 'quality_desc')->widget('app\common\Summernote',
		['clientOptions'=>[]]) ?>
    
	 
    

  
	<?= $form->field($model, 'status')->dropDownList(Yii::$app->params['boollist'])  ?>
    
	<?php
		$arr_tmp = array('1'=>'格力','2'=>'海尔','品牌ID'=>'品牌名');
	?>
    <?= $form->field($model, 'brand_list')->textArea(['rows' => 6])->hint('格式如下'.'1:格力|2:海尔|3:海信'  ) ?>
	<?php
		$arr_tmp = array('1'=>'格力','2'=>'海尔','品牌ID'=>'品牌名');
	?>
    
	
	
	
	 
	
	<?= $form->field($model, 'sort')->textInput(['maxlength' => true])->hint('大的排前面')  ?>  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
