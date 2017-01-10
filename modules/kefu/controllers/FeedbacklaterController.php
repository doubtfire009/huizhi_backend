<?php

namespace app\controllers;
namespace app\modules\kefu\controllers;

use Yii;
use app\models\FeedbackLater;
use app\models\FeedbackLaterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FeedbacklaterController implements the CRUD actions for FeedbackLater model.
 */
class FeedbacklaterController extends Controller
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
	public function actions()
    {
        return [
            'editable' => [
                'class' => 'mcms\xeditable\XEditableAction',
                //'scenario'=>'editable',  //optional
                'modelclass' => FeedbackLater::className(),
            ],
        ];
    }

    /**
     * Lists all FeedbackLater models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackLaterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FeedbackLater model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FeedbackLater model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FeedbackLater();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FeedbackLater model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FeedbackLater model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FeedbackLater model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeedbackLater the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeedbackLater::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 public function actionSave($order_id)
    {
         $model_feedbacklater = FeedbackLater::find()->where(['order_id'=>$order_id])->one() ;
		 if ($model_feedbacklater) {
			 
			 $model_feedbacklater->date_created = time()  ;
			 $model_feedbacklater->content = $_POST['value'] ;
			 $model_feedbacklater->save();
			 
		 } else {
			 $model_feedbacklater = new FeedbackLater();
			 $model_feedbacklater->order_id = $order_id ;
			 $model_feedbacklater->date_created = time()  ;
			 $model_feedbacklater->content = $_POST['value'] ;
			 $model_feedbacklater->save();
			 
		 }
		 echo $_POST['value'] ;
		
    }
}
