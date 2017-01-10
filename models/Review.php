<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_review".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $score
 * @property integer $ontime
 * @property integer $cloth
 * @property integer $intro
 * @property integer $clean
 * @property string $content
 * @property integer $date_created
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'score'], 'required'],
            [['order_id', 'score', 'ontime', 'cloth', 'intro', 'clean', 'date_created'], 'integer'],
            [['content'], 'string'],
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
            'score' => '综合评分',
            'ontime' => '是否准时',
            'cloth' => '衣服着装整洁',
            'intro' => '是否介绍了我们的服务',
            'clean' => '是否清理干净',
            'content' => '评价内容',
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
