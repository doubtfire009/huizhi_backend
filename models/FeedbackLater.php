<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_feedback_later".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $content
 * @property integer $date_created
 */
class FeedbackLater extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_feedback_later';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'date_created'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string', 'max' => 255],
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
            'content' => '内容',
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
