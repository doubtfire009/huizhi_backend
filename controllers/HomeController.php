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
}
