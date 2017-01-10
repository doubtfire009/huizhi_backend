<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_product".
 *
 * @property integer $id
 * @property string $title
 * @property integer $line_id
 * @property integer $city_id
 * @property integer $cat_id
 * @property string $content
 * @property string $logo
 * @property string $old_price
 * @property string $price
 * @property integer $date_created
 * @property integer $status
 * @property string $brand_list
 * @property string $sku_list
 * @property string $time_list
 * @property string $quality_desc
 * @property string $process_desc
 * @property string $price_desc
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'city_id', 'cat_id'], 'required'],
            [['line_id', 'city_id', 'cat_id','status','sort'], 'integer'],
            [['content'], 'string'],
//            [['old_price', 'price'], 'number'],
            [['title','icon', 'logo', 'bigimage'], 'string', 'max' => 255],
            [['brand_list', 'sku_list', 'price_desc'], 'string', 'max' => 1024],
            [['quality_desc', 'process_desc'], 'string', 'max' => 4096],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '产品名',
            'line_id' => '产品线ID',
            'city_id' => '城市ID',
            'cat_id' => '类别',
            'content' => '装备工具',
            'icon'=>'小图标',
            'logo' => '头像',
            'bigimage'=>'大图标',
            'old_price' => '原价',
            'price' => '现价',
            'date_created' => 'Date Created',
            'status' => '上架状态',
            'brand_list' => '品牌列表',
            'sku_list' => '主SKU列表',
            'time_list' => '时间区间列表',
            'quality_desc' => '质保说明',
            'process_desc' => '处理流程',
            'price_desc' => '价格说明',
            'sort' => '排序',
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
	public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }
	public function list_all()
	{
		$res_all = Product::find()->all();
		$arr_res = array();
		foreach ($res_all as $v_product)
			$arr_res[$v_product->id] = $v_product->title ;
	 
		return $arr_res ; 
		
	} 
}
