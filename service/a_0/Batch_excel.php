<?php
namespace app\service\a_0;
use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fileupload
 *
 * @author dell
 */
class Batch_excel {
    public function batch_excel_processor($ext,$excel_dir) {//导入excel批量改数据库
         $objPHPExcel = new \PHPExcel();
        if($ext == 'xlsx'){
            $PHPReader = new \PHPExcel_Reader_Excel2007();
            
        }else{
            $PHPReader = new \PHPExcel_Reader_Excel5();
        }
        $PHPExcel = $PHPReader->load($excel_dir); // Reader读出来后，加载给Excel实例
        $current_sheet =$PHPExcel->getSheet(0);  
        $all_column =$current_sheet->getHighestColumn();  
      
        $all_row =$current_sheet->getHighestRow();
        $data_tmp = [];
        for($i=2;$i<=$all_row;$i++){
            for($j='A';$j<=$all_column;$j++){
                $data_tmp[$i-2][] = $current_sheet->getCell($j.$i)->getValue();
            }
        }
        return $data_tmp;

        
    }
    

}
