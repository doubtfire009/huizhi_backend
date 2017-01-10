<?php
function service_version_locator($dir_str,$version_arr){
    //找到service对应的version
    //$dir_str:不带version值的，service类的命名空间
    //$version_arr:params文件中service_verion字段
   
    $dir_arr = explode("\\",$dir_str);
    if(array_key_exists($dir_arr[sizeof($dir_arr)-1],$version_arr)){
       return $version_arr[$dir_arr[sizeof($dir_arr)-1]];
    }else{
       return "0";
    }
}



function service_container_dir_version_class($dir_str,$ver_id){
    //将版本号加入service类的路径(用于service_container的class字段)
    //$dir_str:不带version值的，service类的命名空间
    //$ver_id:service类的版本号
   
    $dir_arr = explode("\\",$dir_str);
    $result_tmp = [];
    if($ver_id != "0"){
        for($i=0;$i<=sizeof($dir_arr);$i++){
            if($i<=sizeof($dir_arr)-2){
                $result_tmp[$i] = $dir_arr[$i];
            }elseif($i==sizeof($dir_arr)-1){
                $result_tmp[$i] = $ver_id;
            }else{
                $result_tmp[$i] = $dir_arr[$i-1];;
            }
        }
        $result = implode("\\",$result_tmp);
    }else{
        $result = $dir_str;
    }
    
    return $result;    
}
