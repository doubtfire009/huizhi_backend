<?php
namespace app\service\a_0;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TestTmp{
    public $con_a;
    public $con_b;
    function test1($a=0){
        return $a+9;
//        echo $a+9;
    }
    
    function test2(){
        $b = $this->test1();
        return $b+1;
    }
    function test3($a=2,$b=1){
        $c = $a+$b;
        return $c+1;
//        echo $c;
    }
    
    function test4($a=2,$b=1){
        $a = $this->con_a + $a;
        $b = $this->con_b + $b;
        $c = $a+$b;
//        return $c+1;
        echo $c;
    }
}

