<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\assets\AppAsset;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends HomeController
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
	
	public function actions()
	{
		return [
			'Kupload' => [
				'class' => 'pjkui\kindeditor\KindEditorAction',
			]
		];
	}

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $line_id = [""=>"全部"];
        $city_id = [""=>"全部"];
        $cat_id = [""=>"全部"];
        
        foreach(Yii::$app->params['linelist'] as $k=>$v){
            $line_id[$k] = $v;
        }
        foreach(Yii::$app->params['citylist'] as $k=>$v){
            $city_id[$k] = $v;
        }
        foreach(Yii::$app->params['catlist'] as $k=>$v){
            $cat_id[$k] = $v;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'line_id'=>$line_id,
            'city_id'=>$city_id,
            'cat_id'=>$cat_id,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

       AppAsset::css_controller_add([
           "/css/product.css"=>0,
       ]);
       AppAsset::js_controller_add([
           "/js/ajaxfileupload/ajaxfileupload.js"=>0,
           "/js/product.js"=>0,
       ]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        AppAsset::css_controller_add([
           "/css/product.css"=>0,
       ]);
       AppAsset::js_controller_add([
           "/js/ajaxfileupload/ajaxfileupload.js"=>0,
           "/js/product.js"=>0,
       ]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    public function actionImguploader(){//summernote插入图片
        
        $productImguploader_container = $this->Service_container;
        if ($_FILES['files']['name']) { 
            if (!$_FILES['files']['error'] && $_POST) { 
                $productImguploader_container->set('productImguploader', 'app\service\Imguploader');
                $dir_storage = $productImguploader_container->get('productImguploader')->filesuploader($_FILES,$_POST);
                
                echo $dir_storage;
                
            } else { 
                echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['files']['error']; 
                
            } 
            
        }
    }
    
    public function actionImginfouploader(){//icon logo bigimage插入图片
        $productImginfouploader_container = $this->Service_container;
//        echo "fuck";
//        var_dump($_FILES);
//        var_dump($_POST);
        if($_FILES['pic']['name']){
            if(!$_FILES['pic']['error']){
                $productImginfouploader_container->set('productImginfouploader', 'app\service\Imguploader');
                $dir_storage = $productImguploader_container->get('productImginfouploader')->imginfosuploader($_FILES);
                
                echo $dir_storage;
                $this->ajax_img_fileupload($_FILES,$from_id,$save_path,$num);
            }
            
        }

//        }
    }    
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
