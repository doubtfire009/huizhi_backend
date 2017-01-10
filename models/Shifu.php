<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_shifu".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $name
 * @property string $sex
 * @property string $idcard
 * @property string $birthday
 * @property integer $city
 * @property string $zone
 * @property string $address
 * @property string $skills_all
 * @property string $skills
 * @property string $wx_openid
 * @property integer $work_status
 * @property integer $total_jobs
 * @property integer $avg_points
 * @property integer $avg_ontime
 * @property integer $avg_cloth
 * @property integer $avg_intro
 * @property integer $avg_clean
 * @property integer $date_created
 * @property string $join_date
 * @property string $leave_date
 */
class Shifu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shifu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['mobile','join_date','leave_date'], 'required'],
            [['mobile', 'name', 'idcard'], 'required'],
//            [['birthday', 'join_date', 'leave_date'], 'safe'],
            [['city', 'work_status', 'total_jobs', 'avg_score', 'avg_ontime', 'avg_cloth', 'avg_intro', 'avg_clean','off_weekidx','service_zone','line_id' ], 'integer'],
            [['mobile', 'name', 'idcard', 'zone','password','geohash','latitude','longitude'], 'string', 'max' => 32],
            [['sex','sf_type'], 'string', 'max' => 1],
            [['address', 'skills_all'], 'string', 'max' => 255],
         
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
            'idcard' => '身份证',
            'birthday' => '出生年月',
            'city' => '城市',
            'zone' => '区块',
            'service_zone'=>'服务区',
            'address' => '详细地址',
            'skills_all' => '会的产品线',
            'line_id' => '产品线',
            'wx_openid' => '微信绑定的openid',
            'work_status' => '上班与否',
            'total_jobs' => '一共多少单',
            'avg_score' => '用户评价的平均值',
            'avg_ontime' => '是否准时上门的平均值',
            'avg_cloth' => '服装是否整洁的平均值',
            'avg_intro' => '是否向用户解决了我们的业务流程，平均值',
            'avg_clean' => '保养是否干净的平均值',
            'date_created' => '生成本记录的时间戳',
            'join_date' => '加入日期',
            'leave_date' => '离职日期',
			'password'=>'密码',
			'geohash'=>'LBS 信息串',
			'latitude'=>'纬度',
			'longitude'=>'经度',
			'sf_type'=>'师傅/学徒',
            'off_weekidx'=>'休息日期'
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
	public function list_all()
	{
		$res_all = Shifu::find()->all();
		$arr_res = array();
		foreach ($res_all as $v_shifu)
			$arr_res[$v_shifu->id] = $v_shifu->name ;
	 
		return $arr_res ; 
		
	}
}
