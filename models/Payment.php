<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payment".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $amount
 * @property string $pay_way
 * @property string $payment_data
 * @property integer $date_created
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'amount', 'payment_data' ], 'required'],
            [['order_id', 'date_created'], 'integer'],
            [['amount'], 'number'],
            [['pay_way', 'payment_data'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单ID',
            'amount' => '支付金额',
            'pay_way' => '支付方式',
            'payment_data' => '附加信息',
            'date_created' => '新建时间',
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
