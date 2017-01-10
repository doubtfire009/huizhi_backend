<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_srv_zonelist".
 *
 * @property integer $id
 * @property string $name
 * @property string $addr_list
 */
class SrvZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_srv_zonelist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['addr_list'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '服务区名',
            'addr_list' => '下辖区,街道',
        ];
    }
    
    public function list_all()
	{
		$res_all = SrvZone::find()->all();
		$arr_res = array();
		foreach ($res_all as $v_srvzone)
			$arr_res[$v_srvzone->id] = $v_srvzone->name ;
	 
		return $arr_res ; 
		
	}
}
