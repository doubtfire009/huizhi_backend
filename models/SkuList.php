<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_sku_list".
 *
 * @property integer $id
 * @property integer $prod_id
 * @property string $name
 * @property integer $base_mins
 * @property integer $step_mins
 * @property string $base_price
 * @property string $step_price
 * @property integer $min_nums
 */
class SkuList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sku_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_id', 'base_mins', 'step_mins', 'min_nums'], 'integer'],
            [['name', 'base_mins', 'step_mins','step_price','step_price2','step_price3', 'step_price4','min_nums'], 'required'],
            [['base_price', 'step_price','step_price2','step_price3', 'step_price4'], 'number'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID', 
			'prod_id'=>'产品ID',
            'name' => 'SKU名字',
            'base_mins' => '基本分钟',
            'step_mins' => '分钟/每单位',
            'base_price' => '基本价格',
            'step_price' => '价格/每单位',
            'step_price2' => '官方价',
            'step_price3' => 'VIP价',
            'step_price4' => '亲友价',
            'min_nums' => '最小数量',
			
        ];
    }
	public function getProduct()
	{
		/**
		* 第一个参数为要关联的字表模型类名称，
		*第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
		*/
		return $this->hasOne(Product::className(), ['id' => 'prod_id']);
	}
	 
}
