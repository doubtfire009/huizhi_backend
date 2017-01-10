<?php
namespace app\common;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TestTmp{
    function test1($a=0){
        return $a+9;
    }
    
    function test2(){
        $b = $this->test1();
        return $b+1;
    }
}

