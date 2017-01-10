<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_shifu_minutes".
 *
 * @property integer $id
 * @property integer $shifu_id
 * @property string $work_date
 * @property integer $allocated_minutes
 */
class SfMinute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shifu_minutes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shifu_id', 'allocated_minutes'], 'integer'],
            [['work_date'], 'required'],
            [['work_date'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shifu_id' => '师傅ID',
            'work_date' => '工作日期',
            'allocated_minutes' => '当天被分配的分钟',
        ];
    }
}
