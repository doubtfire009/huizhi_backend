<?php
namespace app\service\a_0;
use Yii;
use app\models\MinutesRes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MinutesResExcel
 *
 * @author dell
 */
class MinutesResExcel {
    public function MinutesResExcelProcessor($data){//tbl_minutes_resource表使用excel修改
        
        $res_flag = [];
//        var_dump($data);
//        die();
        foreach($data as $k=>$v){
            $minutesres= new MinutesRes;     
            $minutesres->shifu_id = (int)$v[0];
            
            $minutesres->work_date = (int)(((int)$v[1])*24*3600 - constant('EXCEL_START_DATE_STAMP')) ;

            
            $minutesres->line_id = (int)$v[2];
            $minutesres->srvzone_id = (int)$v[3];
            $minutesres->minutes_morning = (int)$v[4];
            $minutesres->minutes_afternoon = (int)$v[5];
            $minutesres->minutes_night = (int)$v[6];
            $minutesres->minutes_allday = 0;
            $minutesres->work_status = $v[7];
           
            if($minutesres->save()){
                $res_flag[] = 0;
            }else{
                $res_flag[] = 1;
            }
        }
        return $res_flag;
    }
}
