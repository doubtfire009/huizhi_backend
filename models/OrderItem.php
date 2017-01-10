<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_order_item".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $product_num
 * @property string $product_price
 * @property integer $brand_id
 * @property integer $sku_id
 * @property integer $timeinfo_id
 * @property string $total_price
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'product_num'], 'required'],
            [['order_id', 'product_id', 'product_num', 'brand_id', 'sku_id', 'timeinfo_id','total_minutes'], 'integer'],
            [['product_price', 'total_price'], 'number'],
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
            'product_id' => '商品ID',
            'product_num' => '数量',
            'product_price' => '单价',
            'brand_id' => '品牌ID',
            'sku_id' => '主SKU ID',
            'timeinfo_id' => '预定时间段',
            'total_price' => '总价',
			'total_minutes'=>'预计时间',
        ];
    }
	public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
	public function getSku()
    {
        return $this->hasOne(SkuList::className(), ['id' => 'sku_id']);
    }

}
