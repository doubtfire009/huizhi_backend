<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;
use Yii;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public static $css_main = [
        "/css/bootstrap.min.css"=>0,
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"=>1,
        "https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"=>1,
        "/css/AdminLTE.min.css"=>0,
        "/css/skins/_all-skins.min.css"=>0,
    ];
    public static $js_main = [
        "/js/jquery-2.2.3.min.js"=>0,
        "https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"=>1,
        "/js/layout.js"=>0,
        
//        "/js/yii_table/yii.activeForm.js"=>0,
//        "/js/yii_table/yii.captcha.js"=>0,
//        "/js/yii_table/yii.gridView.js"=>0,
//        "/js/yii_table/yii.js"=>0,
//        "/js/yii_table/yii.validation.js"=>0,
        
        "/js/bootstrap.min.js"=>0, 
        "https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"=>1,
        "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"=>1,
        "/js/app.min.js"=>0
    ];
    public static $css_display = [];
    public static $js_display = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $menu;
    public static $test_cons="1";
    public function menu_display(){
        $this->menu = [
//                '订单管理'=>[ 
//                    '订单添加'=>[
//                        'url'=>'',
//                        'role'=>''
//                    ],
//                    '订单日历'=>[
//                         'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=calendar",
//                        'role'=>'2'
//                        
//                        ]
//                    ],
                '类别管理'=>[
                   
                    '产品类别管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=category",
                        'role'=>'2'
                    ],
                    '产品管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=product",
                        'role'=>'2'
                    ],
                    'SKU管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=skulist",
                        'role'=>'2'
                    ],
                ],
            '师傅管理'=>[
                   
                    '师傅信息管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=shifu",
                        'role'=>'2'
                    ],
                    '日程管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=minutesres",
                        'role'=>'2'
                    ],
                    
                ],
            '服务区管理'=>[
                   
                    '服务区信息管理'=>[
                        'url'=>Yii::$app->request->hostInfo.Yii::$app->request->baseUrl."/index.php?r=srvzone",
                        'role'=>'2'
                    ]
                    
                    
                ]
            ];
        return $this->menu;
    }
    public static function js_controller_add($js=[]){
        if(sizeof(self::$js_display)==0){
            self::$js_display = self::$js_main;
        }
      
        if(sizeof($js) != 0){
            foreach($js as $k=>$v){
                self::$js_display[$k] = $v;
            }
            
        }
    }
    public static function js_display(){
        if(empty(self::$js_display)){
            self::$js_display = self::$js_main;
        }
        $res =[];
        foreach(self::$js_display as $k=>$v){
            if($v==0){
                $res[] = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$k;
            }else{
                $res[] = $k;
            }      
        }
        return $res;
    }
    public static function js_display_end(){
        self::$js_display = [];
        
    }
    public static function css_controller_add($css=[]){
        if(sizeof(self::$css_display)==0){
            self::$css_display = self::$css_main;
        }
        if(sizeof($css) != 0){
            foreach($css as $k=>$v){
                self::$css_display[$k] = $v;
            }
            
        }
    }
    public static function css_display(){
        if(empty(self::$css_display)){
            self::$css_display = self::$css_main;
        }
        $res = [];
        foreach(self::$css_display as $k=>$v){
            if($v==0){
                $res[] = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$k;
            }else{
                $res[] = $k;
            }      
        }
        return $res;
    }
    public static function css_display_end(){
        self::$css_display = [];
        
    }
    
    
    
//    public function js_display1($js=[]){
//        if(sizeof($js) != 0){
//            foreach($js as $k=>$v){
//                $this->js[] = $v;
//            }
//            
//        }
//        foreach($this->js as $k=>$v){
//            if($v==0){
//                $res[] = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$k;
//            }else{
//                $res[] = $k;
//            }      
//        }
//        return $res;
//    }
    
//    public function css_display($css=[]){
//        if(sizeof($css) != 0){
//            foreach($css as $k=>$v){
//                $this->css[] = $v;
//            }
//        }
//        $css_arr = $this->css;
//       
//        foreach($this->css as $k=>$v){
//            if($v==0){
//                $res[] = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.$k;
//            }else{
//                $res[] = $k;
//            }      
//        }
//        return $res;
//    }
    
    public static function test($cons = ""){
        if($cons != ""){
            self::$test_cons = $cons;
        }
        return self::$test_cons;
    }
    public static function test1($cons = ""){
        if($cons == ""){
            self::$test_cons = "1";
        }
        return self::$test_cons;
    }
}
