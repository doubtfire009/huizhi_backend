<?php

namespace app\common;

use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;
/**
 * summernote 小物件
 * @author lizhiyu
 * @time 2016-09-18
 */
class Summernote extends InputWidget
{
    /**
     * 定制summernote样式
     */
    public $clientOptions = [];

    /**
     * 默认语言
     */
    const LANG_DEFAULT = 'zh-CN';
    
    /**
     * 默认高度
     */
    const HEIGHT_DEFAULT = 300;

    /**
     * 初始化
     */
    public function init()
    {
        parent::init();

        $this->setdefault();
    }

    /**
     * 启动
     */
    public function run()
    {
//        $this->registerClientScript();

        AppAsset::css_controller_add([
            "/css/summernote/summernote.css"=>0,
        ]);
        AppAsset::js_controller_add([
                    "/js/summernote/summernote.js"=>0,
                    "/js/summernote/summernote-zh-CN.min.js"=>0,
                    "/js/summernote/summernote_start.js"=>0,
                ]);
        if ($this->hasModel()) {

            $textArea = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {

            $textArea = Html::textArea($this->name, $this->value, $this->options);
        }
        
        echo $textArea;
    }

    /**
     * 注册客户端 summernote JS脚本
     */
//    public function registerClientScript()
//    {
//        $id = $this->options['id'];
//        
//        $view = $this->getView();
//
//        SummernoteAsset::register($view)->lang = $this->clientOptions['lang'];
//
//        $view->registerJs("$('#$id').summernote(".json_encode($this->clientOptions).")");
//    }

    /**
     * 设置 summernote 配置默认值
     */
    public function setDefault()
    {
        $ary = [
            'lang' => self::LANG_DEFAULT,
            'height' => self::HEIGHT_DEFAULT,
        ];

        foreach ($ary as $k => $v) {
            $this->clientOptions[$k] = ArrayHelper::keyExists($k, $this->clientOptions) ? $this->clientOptions[$k] : $v;
        }
    }
}
