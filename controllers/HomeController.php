<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\common\ServiceContainer;

/**
 * Description of HomeController
 *
 * @author dell
 */
class HomeController extends Controller{
    public $Service_container;
    function init() {
        parent::init();
        $session = Yii::$app->session;
        if(!isset($session['user_id'])){
            return $this->goHome();
        }
        $this->Service_container = new ServiceContainer();
    }
    ////在controller的function调用后判断它是否属于用户的权限，权限数字在params里面
    //
    public function role_permission($rolelist=array(1)){

        $session = Yii::$app->session;
        if(!isset($session['adminrole'])){
            $this->role_error();
            return $this->goHome();
        }else{
            if(!in_array($session['adminrole'], $rolelist)){
               $this->redirect(array('/site/role_unmatched'));
            }
        }
    }
    public function role_error(){
        Yii::$app->session->destroy();
        
    }
}
