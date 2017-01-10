<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order_log".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $event_cat
 * @property string $event
 * @property string $event_data
 * @property integer $date_created
 * @property integer $customer_id
 * @property integer $shifu_id
 * @property integer $kefu_id
 */
class OrderLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id',  'customer_id', 'shifu_id', 'kefu_id'], 'integer'],
          //  [['event_cat', 'event', 'event_data'], 'required'],
            [['event_cat'], 'string'],
            [['event'], 'string', 'max' => 255],
            [['event_data'], 'string', 'max' => 64],
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
            'event_cat' => '事件等级',
            'event' => '事件内容',
            'event_data' => '事件额外信息',
            'date_created' => '日志生成时间',
            'customer_id' => '用户ID',
            'shifu_id' => '师傅ID',
            'kefu_id' => '客服ID',
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
