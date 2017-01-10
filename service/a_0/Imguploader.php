<?php
namespace app\service\a_0;
use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 通过ajax上传图片用
 *
 * @author lizhiyu
 */
class Imguploader {
    public function filesuploader($files_uploaded,$post_uploaded){

                $name = md5(time()); 
                $ext = explode('.', $files_uploaded['files']['name']); 
                $filename = $name . '.' . $ext[sizeof($ext)-1]; 

                        
                $location = $files_uploaded["files"]["tmp_name"]; 

//                $destination = constant('WEBROOT')."/web/img/".$post_uploaded['source_type']."/".$post_uploaded['file_type']."/".$filename;
                $destination = constant('WEBROOT')."/".$post_uploaded['source_type']."/".$post_uploaded['file_type']."/".$filename;
                
                move_uploaded_file($location, $destination); 

                return $filename;
    }
//    public function imginfosuploader($files_uploaded){
//        $picname = $FILES[$from_id]['name'];
//        $picsize = $FILES[$from_id]['size'];
//        $pictype = $FILES[$from_id]['type'];
//        $name = md5(time()); 
//    }
}
