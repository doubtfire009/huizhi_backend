<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_minutes_resource".
 *
 * @property integer $id
 * @property string $work_date
 * @property integer $line_id
 * @property integer $minutes_morning
 * @property integer $minutes_afternoon
 * @property integer $minutes_night
 * @property integer $minutes_allday
 */
class MinutesRes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_minutes_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_date', 'line_id', 'minutes_morning', 'minutes_afternoon', 'minutes_night', 'minutes_allday'], 'required'],
            [['line_id', 'minutes_morning', 'minutes_afternoon', 'minutes_night', 'minutes_allday'], 'integer'],
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
            'work_date' => '日期',
            'line_id' => '产品线ID',
            'minutes_morning' => '上午已用',
            'minutes_afternoon' => '下午已用',
            'minutes_night' => '晚上已用',
            'minutes_allday' => '全天已用',
        ];
    }
}
