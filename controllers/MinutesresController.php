<?php

namespace app\controllers;

use Yii;
use app\models\MinutesRes;
use app\models\Shifu;
use app\models\MinutesResSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\assets\AppAsset;
use yii\data\Pagination;
/**
 * MinutesresController implements the CRUD actions for MinutesRes model.
 */
class MinutesresController extends HomeController
{
    public $enableCsrfValidation = false;
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
     * Lists all MinutesRes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->role_permission([1,2]);
        $searchModel = new MinutesResSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        AppAsset::js_controller_add([
           "/js/minutesres_batch_excel.js"=>0,
           
       ]);
        $pages = new Pagination(['totalCount' =>$dataProvider->query->count(), 'pageSize' => '10']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'res'=>$res
            
        ]);
    }

    /**
     * Displays a single MinutesRes model.
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
     * Creates a new MinutesRes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->role_permission([1,2]);
        $model = new MinutesRes();
        AppAsset::css_controller_add([
            "/css/daterangepicker.css"=>0,
           "/css/datepicker3.css"=>0,
            
       ]);
        AppAsset::js_controller_add([
            "/js/daterangepicker/daterangepicker.js"=>0,
           "/js/datepicker/bootstrap-datepicker.js"=>0,
            "/js/minutesres.js"=>0,
       ]);

        if(Yii::$app->request->post()){
            $tmp = Yii::$app->request->post();
            $tmp['MinutesRes']['work_date'] = strtotime($tmp['MinutesRes']['work_date']);
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
     * Updates an existing MinutesRes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->role_permission([1,2]);
        $model = $this->findModel($id);
        AppAsset::css_controller_add([
            "/css/daterangepicker.css"=>0,
           "/css/datepicker3.css"=>0,
            
       ]);
        AppAsset::js_controller_add([
            "/js/daterangepicker/daterangepicker.js"=>0,
           "/js/datepicker/bootstrap-datepicker.js"=>0,
            "/js/minutesres.js"=>0,
       ]);
        
        if(Yii::$app->request->post()){
            $tmp = Yii::$app->request->post();
            $tmp['MinutesRes']['work_date'] = strtotime($tmp['MinutesRes']['work_date']);
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
     * Deletes an existing MinutesRes model.
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

    public function actionBatch_excel(){
//        var_dump($_FILES);
        if(isset($_FILES) && !empty($_FILES) && $_FILES['files']['error'] == 0 && !empty($_POST)){
//        if(isset($_FILES) && !empty($_FILES)){
            $ext_arr = explode('.', $_FILES['files']['name']); 
            $ext = $ext_arr[sizeof($ext_arr)-1]; 
            if($ext == 'xls' || 'xlsx'){
                $_POST['ext'] = $ext;
                $batch_excel_container = $this->Service_container;
                $batch_excel_container->set('batch_excel_uploader', 'app\service\Imguploader');
                $dir_storage = $batch_excel_container->get('batch_excel_uploader')->filesuploader($_FILES,$_POST);
                $excel_dir =  constant('WEBROOT')."/".$_POST['source_type']."/".$_POST['file_type']."/".$dir_storage;
                $batch_excel_container->set('batch_excel_processor', 'app\service\Batch_excel');
                $batch_excel_processor_res = $batch_excel_container->get('batch_excel_processor')->batch_excel_processor($ext,$excel_dir);
                $batch_excel_container->set('MinutesResExcelProceesor', 'app\service\MinutesResExcel');
                $minutesres_excel_processor_res = $batch_excel_container->get('MinutesResExcelProceesor')->MinutesResExcelProcessor($batch_excel_processor_res);
                echo json_encode($minutesres_excel_processor_res);
            }else{
                echo json_encode(array("MinutesRes_2"));
            }
            
        }else{
            echo json_encode(array("MinutesRes_1"));
        }
        
     

//        var_dump($PHPExcel);
    }
    
    
    /**
     * Finds the MinutesRes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MinutesRes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MinutesRes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
