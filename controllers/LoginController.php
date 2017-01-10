<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\SigninForm;
use  yii\web\Session;


class LoginController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = false;
        $session = Yii::$app->session;
        if (!$session->isActive){
            $session->open();
        }
       
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SigninForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['category/index']);
        }

        $dir = Yii::$app->request->hostInfo."/".Yii::$app->request->baseUrl."/";
        
        return $this->render('index', [
            'model' => $model,
            'dir' => $dir,

        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

    }
}
