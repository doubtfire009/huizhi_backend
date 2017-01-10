<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_customer".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $name
 * @property string $sex
 * @property integer $city
 * @property string $wx_openid
 * @property integer $total_jobs
 * @property integer $date_created
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile'], 'required'],
            [['city', 'total_jobs', 'date_created','service_zone'], 'integer'],
            [['mobile', 'name','zone','password','geohash','latitude','longitude'], 'string', 'max' => 32],
			[['address'], 'string', 'max' => 255],			
            [['sex'], 'string', 'max' => 1],
            [['wx_openid'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => '手机',
            'name' => '名字',
            'sex' => '性别',
            'city' => '主城市',
            'wx_openid' => '微信绑定的openid',
			'service_zone'=>'服务区块ID',
            'total_jobs' => '一共定了多少单',
            'date_created' => '生成本记录的时间戳',
			'zone'=>'主区域',
			'address'=>'主详细地址',
			'password'=>'密码',
			'geohash'=>'LBS 信息串',
			'latitude'=>'纬度',
			'longitude'=>'经度',
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
