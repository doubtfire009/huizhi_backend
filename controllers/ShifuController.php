<?php

namespace app\controllers;

use Yii;
use app\models\Shifu;
use app\models\ShifuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShifuController implements the CRUD actions for Shifu model.
 */
class ShifuController extends HomeController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Shifu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->role_permission([1,2]);
        $searchModel = new ShifuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shifu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->role_permission([1,2]);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Shifu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->role_permission([1,2]);
        $model = new Shifu();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	
			$model->password = md5(Yii::$app->params['defaultpwd'].Yii::$app->params['hashkey']) ;
			$model->save();
				
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Shifu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->role_permission([1,2]);
        $model = $this->findModel($id);
		$oldpass = $model->password;
                
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        
			if ($oldpass != $model->password) {
				
				//密码改变了,重新生成一次密码
				$model->password = md5($model->password.Yii::$app->params['hashkey']) ;
				$model->save();
				
			}
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Shifu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->role_permission([1,2]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shifu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shifu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shifu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
