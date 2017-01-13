<?php

namespace app\controllers;

use Yii;
use app\models\SrvZone;
use app\models\SrvZoneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SrvzoneController implements the CRUD actions for SrvZone model.
 */
class SrvzoneController extends HomeController
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
     * Lists all SrvZone models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->role_permission([1,2]);
        $searchModel = new SrvZoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SrvZone model.
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
     * Creates a new SrvZone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->role_permission([1,2]);
        $model = new SrvZone();

        if(Yii::$app->request->post()){
            $tmp = Yii::$app->request->post();
            $tmp['SrvZone']['addr_list'] = implode('|',$tmp['SrvZone']['addr_list']);
            if ($model->load($tmp) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                 ]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
       
    }

    /**
     * Updates an existing SrvZone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->role_permission([1,2]);
        $model = $this->findModel($id);
       
        if(Yii::$app->request->post()){
            $tmp = Yii::$app->request->post();
            $tmp['SrvZone']['addr_list'] = implode('|',$tmp['SrvZone']['addr_list']);
            if ($model->load($tmp) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                 ]);
            }
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SrvZone model.
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
     * Finds the SrvZone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SrvZone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SrvZone::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
