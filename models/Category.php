<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
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
            'name' => '类别名',
            'parent_id' => '父类 ID',
        ];
    }
	public function list_all()
	{
		$res_all = Category::findAll(['parent_id'=>0]);
		$arr_res = array();
		foreach ($res_all as $v_category)
			$arr_res[$v_category->id] = $v_category->name ;
	 
		return $arr_res ; 
		
	}
}
