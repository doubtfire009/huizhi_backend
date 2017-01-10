<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customer_addr".
 *
 * @property integer $id
 * @property integer $cust_id
 * @property integer $city
 * @property integer $zone
 * @property string $address
 * @property integer $main_addr
 */
class CustomerAddr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customer_addr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id', 'city', 'zone', 'address', 'main_addr'], 'required'],
            [['cust_id', 'city', 'zone', 'main_addr','service_zone'], 'integer'],
			[['name','phone' ], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cust_id' => '客户编号',
            'city' => '城市',
            'zone' => '地区',
			'service_zone'=>'服务区块ID',
            'address' => '详细地址',
            'main_addr' => '是否主地址',
			'name'=>'联系人',
			'phone'=>'联系电话',
			'mobile'=>'手机',
        ];
    }
	public function set_mainaddr()
	{
		$customer = Customer::findOne([
			'id' => $this->cust_id,
		 
		]);
		 
		CustomerAddr::updateAll(['main_addr'=>0],'id <>:id and cust_id=:cust_id',
		[ 
			 ':id'=>$this->id,
			':cust_id'=>$this->cust_id,
		]);
		
		if ($customer) {
			
			$customer->city  = $this->city ;
			$customer->zone = $this->zone ;
			$customer->address = $this->address;
			$customer->save(); 
		}

		
		
	}
	public function afterSave($insert, $changedAttributes)
	{
		$should_go = false ;
		if ($insert) {
			if ($this->main_addr )  $should_go = true ; 
		} else {
			if ($this->main_addr ) $should_go = true ; 
		}
		if ($should_go) {
			$this->set_mainaddr();
			
		} 
	}
}
