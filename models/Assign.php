<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_assign".
 *
 * @property integer $id
 * @property string $schedule_date
 * @property integer $schedule_timeinfo
 * @property integer $order_id
 * @property integer $shifu_id
 * @property integer $minutes
 */
class Assign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_assign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schedule_date', 'schedule_timeinfo', 'order_id', 'shifu_id', 'minutes'], 'required'],
            [['schedule_timeinfo', 'order_id', 'shifu_id', 'minutes'], 'integer'],
            [['schedule_date'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_date' => '预约日期',
            'schedule_timeinfo' => '时间段',
            'order_id' => '订单ID',
            'shifu_id' => '师傅ID',
            'minutes' => '花费分钟',
        ];
    }
}
