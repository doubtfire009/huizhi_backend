<?php

namespace app\controllers;
namespace app\modules\kefu\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;

use app\models\Customer;
use app\models\CustomerSearch;
use app\models\OrderItem;
use app\models\OrderItemSearch;
use app\models\Product;
use app\models\ProductSearch;

use app\models\CustomerAddr;
use app\models\CustomerAddrSearch;

use app\models\OrderLog;
use app\models\OrderLogSearch;


use app\models\FeedbackLater;
use app\models\FeedbackLaterSearch;

use app\models\Category;
use app\models\CategorySearch;
 
use app\models\SkuList;
use app\models\SkuListSearch; 

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\assets\AppAsset;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
                'modelclass' => Order::className(),
            ],
        ];
    }
    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model = $this->findModel($id) ;
		$model_feedbacklater = FeedbackLater::find()->where(['order_id'=>$id])->one() ;
		if ( !$model_feedbacklater ) {
			$model_feedbacklater = new FeedbackLater();
			$model_feedbacklater->order_id = $id ;
			$model_feedbacklater->content = '尚未有评价';
			$model_feedbacklater->save();
			
		}
		$arr_orderitems = OrderItem::find()->where(['order_id'=>$id])->all(); 
	 
        return $this->render('view', [
            'model' => $model ,
			'model_feedbacklater'=>$model_feedbacklater,
			'arr_orderitems'=>$arr_orderitems
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cat_id = 0 )
    {
        $model = new Order();
		$model_orderitem = new OrderItem();
		$model_product  = new Product();
		
		$model->loadDefaultValues();
		
		$model_customer  = new Customer();
		/*$query = new \yii\db\Query;
		$query->select('A.*,B.title,B.cat_id')
				->from('tbl_sku_list A')
				->leftJoin('tbl_product B', 'A.prod_id = B.id' )->where('B.cat_id='.$cat_id)  ;
			 
		$command = $query->createCommand();
		$resp = $command->queryAll();
		*/
		$arr_skulist = SkuList::find()->joinWith('product')->where(['tbl_product.cat_id' => $cat_id])->all();
		
		$count_items = count($arr_skulist);
                AppAsset::js_controller_add([
                    "/js/input_prod_num.js"=>0,
                ]);
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model_customer->load(Yii::$app->request->post()) ;
		 
			$res_customer = Customer::findOne([ 
				'mobile' => $model_customer->mobile,
			]);
			$addr_index = isset($_POST['customer_addrindex']) ? intval($_POST['customer_addrindex']):0  ;
			
			if ( $res_customer) {
				$model->customer_id = $res_customer->id ; 
				//如果是选择了老地址，从model_customer 取到的信息将会写回到CustomerAddr
				if ($addr_index >0)  {
					$model_addr = CustomerAddr::findOne($addr_index) ;
					if ($model_addr !== null) {
						//保存起来
						$model_addr->city = $model_customer->city;
						$model_addr->zone = $model_customer->zone;
						$model_addr->address = $model_customer->address;
						$model_addr->service_zone = $model_addr->zone ;
						$model_addr->name = $model->contact_name ;
						$model_addr->phone = $model->contact_phone ;
						$model_addr->save(); 
						
					} else {
						// 这里是出错了，什么都不做 
					}
					
					
					
				} else {
					//如果重新输入了新地址,从model_customer 取到的信息将会写回到CustomerAddr 
					$model_addr = new CustomerAddr();
					$model_addr->cust_id = $model_customer->id ;
					$model_addr->city = $model_customer->city;
					$model_addr->zone = $model_customer->zone;
					$model_addr->address = $model_customer->address;
					$model_addr->service_zone = $model_addr->zone ;
					$model_addr->name = $model->contact_name ;
					$model_addr->phone = $model->contact_phone ;
					$model_addr->main_addr = 1;
					$model_addr->save();  
					
				}
				
			
				
				
				
			} else {
				$model->customer_id = 0;
				$model_customer->reg_from = 1;
				$model_customer->status =1;
				
				if ($model_customer->save()) {
					
						$model->customer_id = $model_customer->id ; 
						// 同时保存到 customer_add
						$model_addr = new CustomerAddr();
						$model_addr->cust_id = $model_customer->id ;
						$model_addr->city = $model_customer->city;
						$model_addr->zone = $model_customer->zone;
						$model_addr->address = $model_customer->address;
						$model_addr->service_zone = $model_addr->zone ;
						$model_addr->name = $model->contact_name ;
						$model_addr->phone = $model->contact_phone ;
						$model_addr->main_addr = 1;
						$model_addr->save(); 
					
				} 
				
			}
			$model->order_city = $model_customer->city;
			$model->order_zone = $model_customer->zone;
			$model->order_addr = $model_customer->address;
			$model->order_no = date('YmdHis').rand(100,999);
			$model->update_amount = $model->payment_need ;
			$model->order_status =11;
			

			
			if ($model->save()) {
				$order_id = $model->id ;
				$post_vars = $_POST;
				
				for ( $i=0; $i< $count_items ;$i++) {
					$arr_cat_id = $cat_id;
					$arr_prod_id = $post_vars['product_ids'][$i];
					$arr_sku_id = $post_vars['sku_ids'][$i];
					$arr_prod_price = $post_vars['sku_step_price'][$i];
					
					
					$arr_prod_num = $post_vars['prod_num'][$i];
					$arr_total_price = $post_vars['total_price'][$i];
					$arr_total_mins = $post_vars['total_mins'][$i]; 
					$timeinfo_id = $model->schedule_timeinfo;
					
					if ( $arr_prod_num >0) {
						$model_orderitem = new OrderItem();
						$model_orderitem->order_id = $order_id;
						$model_orderitem->product_id = $arr_prod_id;
						$model_orderitem->product_num = $arr_prod_num;
						$model_orderitem->product_price = $arr_prod_price;
						$model_orderitem->brand_id = 1;
						$model_orderitem->sku_id = $arr_sku_id;
						$model_orderitem->timeinfo_id = $timeinfo_id;
						$model_orderitem->total_minutes = $arr_total_mins;		
						$model_orderitem->total_price = $arr_total_price;	
						$model_orderitem->save(); 
						
					} 
					
				}
				
				
				return $this->redirect(['view', 'id' => $model->id]);
			}
			else 
					return $this->render('create', [
                'model' => $model,
				'model_customer'=>$model_customer,
				'model_orderitem'=>$model_orderitem,
				'model_product'=>$model_product,
				'cat_id'=>$cat_id,
				'arr_skulist'=>$arr_skulist,
				
            ]);
					
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
				'model_customer'=>$model_customer,
				'model_orderitem'=>$model_orderitem,
				'model_product'=>$model_product,
				'cat_id'=>$cat_id,
				'arr_skulist'=>$arr_skulist,
				
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); 
		$order_id = $id ;
		$model_orderitem = new OrderItem();
		$model_product  = new Product();
		$arr_orderitems = OrderItem::find()->where(['order_id'=>$id])->all(); 
		
		$cat_id = 1 ;
		if (count($arr_orderitems) > 0) {
			$cat_id = $arr_orderitems[0]->product->cat_id ;
			
		}
		$arr_skulist = SkuList::find()->joinWith('product')->where(['tbl_product.cat_id' => $cat_id])->all();
		
		$count_items = count($arr_skulist);
		
		$model_customer  = Customer::find()->where(['id'=>$model->customer_id])->one();
		$preview = isset($_POST['preview']) ? $_POST['preview']:0 ;
		
		$old_order_amt = $model->order_amt;
		$old_payment_need = $model->payment_need ;
        if ( ( $preview ==2 ) && $model->load(Yii::$app->request->post()) && $model->save()) {
			
			$model->update_count ++;
			
			$model_customer->load(Yii::$app->request->post()) ; 
			$model->order_city = $model_customer->city;
			$model->order_zone = $model_customer->zone;
			$model->order_addr = $model_customer->address;
			$model->order_status =11;
			
			$model->save();
			
			$post_vars = $_POST;
			$log_txt = '';
			for ( $i=0; $i< $count_items ;$i++) {
				
				$arr_cat_id = $cat_id;
				$arr_prod_id = $post_vars['product_ids'][$i];
				$arr_sku_id = $post_vars['sku_ids'][$i];
				$arr_prod_price = $post_vars['sku_step_price'][$i];
				
				
				$arr_prod_num = $post_vars['prod_num'][$i];
				$arr_total_price = $post_vars['total_price'][$i];
				$arr_total_mins = $post_vars['total_mins'][$i]; 
				$timeinfo_id = $model->schedule_timeinfo;
				
				if ( $arr_prod_num >0) {
					//修改或增加或不变
					//上次的数量
					$model_orderitem = OrderItem::findOne(['order_id'=>$order_id,'sku_id'=>$arr_sku_id]);
					if ($model_orderitem) {	
						if ($model_orderitem->product_num != $arr_prod_num)
							$log_txt .= '|SKU:'.$arr_sku_id.',原数量:'.$model_orderitem->product_num.',修改数量为:'.$arr_prod_num;
						
					} else {
						$model_orderitem = new OrderItem();
						$log_txt .= '|新增了SKU:'.$arr_sku_id.',数量:'.$arr_prod_num;
					}
					$model_orderitem->order_id = $order_id;
					$model_orderitem->product_id = $arr_prod_id;
					$model_orderitem->product_num = $arr_prod_num;
					$model_orderitem->product_price = $arr_prod_price;
					$model_orderitem->brand_id = 1;
					$model_orderitem->sku_id = $arr_sku_id;
					$model_orderitem->timeinfo_id = $timeinfo_id;
					$model_orderitem->total_minutes = $arr_total_mins;		
					$model_orderitem->total_price = $arr_total_price;	
					$model_orderitem->save(); 
					
				} else {
					// 如有则删除
					$model_orderitem = OrderItem::findOne(['order_id'=>$order_id,'sku_id'=>$arr_sku_id]);
					if ($model_orderitem) {
						// 删除
						$log_txt .= '|删除了SKU:'.$arr_sku_id;
						$model_orderitem->delete();
					}
					
					
				}
				
			} 
			if ($old_order_amt != $model->order_amt ) {
				$log_txt .='|订单总额由:'.$old_order_amt.',变为:'.$model->order_amt;			
			}
			if ($old_payment_need != $model->payment_need ) {
				$log_txt .='|待收款额由:'.$old_payment_need.',变为:'.$model->payment_need;
			}
			$log_txt = trim($log_txt,'| ') ;
			//修改到 Order Log
			$model_orderlog = new OrderLog();
			$model_orderlog->order_id = $order_id ;
			$model_orderlog->customer_id = $model->customer_id ;
			$model_orderlog->kefu_id = intval(Yii::$app->user->id) ;
			$model_orderlog->shifu_id = 0;
			$model_orderlog->event_cat='info';
			$model_orderlog->event = $log_txt;
			
			$model_orderlog->save();
			
			
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
			
			if ($preview ==1 ) {
				
				$old_model = $model ;
				$old_model_customer = $model_customer ;
				
				$model->load(Yii::$app->request->post());
				$model_customer->load(Yii::$app->request->post()); 
			 
			 
				return $this->render('update_preview', [
					'model' => $model,
					'model_customer'=>$model_customer,
					'model_orderitem'=>$model_orderitem,
					'model_product'=>$model_product		,
					'old_model' => $old_model,
					'old_model_customer'=>$old_model_customer,
					'arr_orderitems'=>$arr_orderitems,
					'arr_skulist'=>$arr_skulist,
				]);
				
				
			} else {
				
				$viewfile = 'update'; 
				return $this->render( $viewfile , [
					'model' => $model,
					'model_customer'=>$model_customer,
					'model_orderitem'=>$model_orderitem,
					'model_product'=>$model_product	,
					'arr_orderitems'=>$arr_orderitems,		
					'arr_skulist'=>$arr_skulist,					
				]);
				
				
				
				
			}
          
        }
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionSave()
	{
		 
		$pk  = $_POST['pk'];
		$name = $_POST['name'];
		$value = $_POST['value'];
		$model = Order::findOne($pk);
		$model->$name=$value;
		$model->save();
		print_r($model->getErrors());
	 	
	}
	public function actionGetprodlist($cat_id = 0)
	{
		$arr_res = Product::find()->where(array('cat_id'=>$cat_id))->all();
       

        foreach($arr_res  as $v_prod )
        {
            echo Html::tag('option',Html::encode($v_prod->title),array('value'=>$v_prod->id));
        } 
		
	}
	public function actionGetcustomerinfo($mobile)
	{
		 $arr_res = array();
		 $arr_res['name'] = '用户姓名';
		 $arr_res['addrhtml'] ="";
		 $res_customer = Customer::findOne(['mobile'=>$mobile]);
		 
		 if ($res_customer) {
			 
			 $arr_res['result'] = 1;
			  $arr_res['name'] = $res_customer->name ;
			 $arr_addrlist = CustomerAddr::find()->where(['cust_id'=>$res_customer->id])->all();
			 $json_addrinfo = array();
			 $html_result = '<p>选择哪个地址，如果以下地址都不对，请关闭此对话框后在原页面中输入</p>';
			 
			  $html_result .= '<table class="table table-condensed table-border ">';
			 foreach ($arr_addrlist as $v_addr) {
				  $html_result .= '<tr>';
				 
				  $html_result .= '<td>'.Yii::$app->params['citylist'][ $v_addr->city].'</td>';
				  $html_result .= '<td>'.Yii::$app->params['zonelist'][$v_addr->zone].'</td>';
				  $html_result .= '<td>'.$v_addr->address.'</td>';
				  $html_result .= '<td>'.$v_addr->name.'</td>';
				  $html_result .= '<td>'.$v_addr->phone.'</td>';
				  $html_result .= '<td><button class="btn btn-small btn-addrclick" data-addrindex='.$v_addr->id.' >选中</a></td>';
				  $html_result .= '</tr>'; 
				  
				  $json_addrinfo[$v_addr->id] = array(
					'city'=> $v_addr->city,
					'zone'=> $v_addr->zone,
					'address'=> $v_addr->address,
					'name'=> $v_addr->name,
					'phone'=> $v_addr->phone 
				  ) ;
				  
				  
			 }
			 $html_result .='<tr> <td colspan=5>以上地址都不符合，我重新输入一个</td>
			 <td><button class="btn btn-small btn-addrclick" data-addrindex=0>选中</a></td>
			 </tr>';
			  $html_result .= '</table>';
			  $arr_res['addrhtml'] =  $html_result ;
			  $arr_res['json_addrinfo'] =  $json_addrinfo ;
			  
		 } else {
			
			$arr_res['result'] = 0;
			 
		 }
		 echo json_encode($arr_res);
		 Yii::$app->end();
	}
	public function   actionCopy($id)
    {
        $model = $this->findModel($id); 
		$arr_orderitems = OrderItem::find()->where(['order_id'=>$id])->all(); 
		$model_copyto = new Order();
		$model_copyto->order_no = date('YmdHis').rand(100,999);
		$model_copyto->order_status = 11;
		$model_copyto->customer_id = $model->customer_id;
		$model_copyto->order_city = $model->order_city;
		$model_copyto->order_zone = $model->order_zone;
		$model_copyto->order_addr  = $model->order_addr;
		$model_copyto->service_zone = $model->service_zone;
		$model_copyto->order_lat = $model->order_lat;
		$model_copyto->order_lng = $model->order_lng;
		$model_copyto->order_geohash = $model->order_geohash;
		$model_copyto->contact_name = $model->contact_name;
		$model_copyto->contact_phone = $model->contact_phone;
		$model_copyto->order_amt = $model->order_amt;
		$model_copyto->payment_need = $model->payment_need;
		$model_copyto->payment_paid = 0;
		$model_copyto->schedule_date = $model->schedule_date;
		$model_copyto->schedule_timeinfo = $model->schedule_timeinfo;
		$model_copyto->final_time = $model->final_time;
		$model_copyto->minutes_need = $model->minutes_need;
		$model_copyto->source = 'huizhi';
		$model_copyto->source_no = $model->id;
		$model_copyto->source_pay = 0;
		$model_copyto->source_dikou = $model->payment_paid;
		$model_copyto->order_flag = $model->order_flag;
		$model_copyto->price_index = $model->price_index;
		if ($model_copyto->save()) {
			$order_id = $model_copyto->id ;
			
			
			
			
		}
		
		
		
		
		
		
		$model_orderitem = new OrderItem();
		$model_product  = new Product();
		$arr_orderitems = OrderItem::find()->where(['order_id'=>$id])->all(); 
		$model_copyto = new Order();
		$model_copyto->loadDefaultValues();
		
		$cat_id = 1 ;
		if (count($arr_orderitems) > 0) {
			$cat_id = $arr_orderitems[0]->product->cat_id ;
			
		}
		$arr_skulist = SkuList::find()->joinWith('product')->where(['tbl_product.cat_id' => $cat_id])->all();
		
		$count_items = count($arr_skulist);
		
		$model_customer  = Customer::find()->where(['id'=>$model->customer_id])->one();
		$preview = isset($_POST['preview']) ? $_POST['preview']:0 ;
		
		$old_order_amt = $model->order_amt;
		$old_payment_need = $model->payment_need ;
		
        if ( ( $preview ==2 ) && $model_copyto->load(Yii::$app->request->post()) && $model_copyto->save()) {
			
		 
			
            return $this->redirect(['view', 'id' => $model_copyto->id]);
        } else { 
		 
        }
    }
	 
}
