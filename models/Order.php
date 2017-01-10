<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order".
 *
 * @property integer $id
 * @property string $order_no
 * @property integer $order_status
 * @property integer $customer_id
 * @property integer $date_created
 * @property integer $order_city
 * @property integer $order_zone
 * @property string $order_addr
 * @property string $order_lat
 * @property string $order_lng
 * @property string $order_geohash
 * @property string $order_amt
 * @property integer $jifen_used
 * @property string $jifen_money
 * @property string $quan_used
 * @property string $yue_used
 * @property string $payment_need
 * @property string $pay_way
 * @property integer $date_pay
 * @property string $payment_paid
 * @property string $schedule_date
 * @property integer $schedule_timeinfo
 * @property string $final_time
 * @property string $final_shifu
 * @property integer $minutes_need
 * @property string $order_note
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_no', 'customer_id', 'order_city', 'order_zone', 'order_addr'], 'required'],
            [['order_status', 'customer_id', 'date_created', 'order_city', 'order_zone',   'schedule_timeinfo', 'minutes_need','service_zone','update_count','price_index'], 'integer'],
            [['order_amt',  'payment_need', 'payment_paid','source_pay','source_dikou','update_amount'], 'number'],
         
            [['order_no', 'order_lat', 'order_lng', 'order_geohash', 'schedule_date', 'final_time', 'final_shifu','source','contact_name','contact_phone'], 'string', 'max' => 32],
            [['order_addr','source_no'], 'string', 'max' => 255],
            [['order_note','order_note2'], 'string', 'max' => 1024],
            [['order_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => '订单号',
            'order_status' => '订单状态',
			'price_index'=>'价格索引',
            'customer_id' => '用户ID',
            'date_created' => '新建时间',
            'order_city' => '订单城市',
            'order_zone' => '订单区域',
            'order_addr' => '订单地址',
            'order_lat' => '订单纬度',
            'order_lng' => '订单经度',
			'service_zone'=>'服务区块ID',
            'order_geohash' => '订单的LBS信息',
            'order_amt' => '订单总额',
            'jifen_used' => '消耗积分',
            'jifen_money' => '积分所抵扣的金额',
            'quan_used' => '优惠券',
            'yue_used' => '余额支付',
            'payment_need' => '本次需要支付的金额',
            'pay_way' => '微信，支付宝，余额，师傅代付',
            'date_pay' => '支付时间',
            'payment_paid' => '共计支付',
            'schedule_date' => '用户要求的上门日期',
            'schedule_timeinfo' => '选择时间段',
            'final_time' => '上门时间',
            'final_shifu' => '派单的师傅的ID,可多个',
            'minutes_need' => '此订单大约需要多少分钟',
            'order_note' => '订单备注',
			'order_note2' => '师傅订单备注',
			
			'source'=>'渠道',
			'source_no'=>'渠道编号',
			'contact_name'=>'联系人',
			'contact_phone'=>'联系电话',
        ];
    }
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if($insert) { 
				
				$this->date_created =  time();
				
			} else {
				
				
				
				 
			}
			return true;
			
		} else {
			return false;
		}
	}
}
