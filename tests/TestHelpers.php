<?php

require_once __DIR__.'/autoload.php';

use PHPUnit\Framework\TestCase;
use Helpers\Helpers;

class TestHelpers extends TestCase{
    public function testRemoveElementFromArray(){
        

        $arr = ['', 'a', '', 'b'];
        $result = Helpers::removeElementFromArray($arr);
        $this->assertEquals($result,['a','b']);
    }

    public function testCheckCharacterInString()
    {
        
        
        $result = Helpers::checkCharacterInString('asd','a');
        $this->assertTrue($result);

        $result = Helpers::checkCharacterInString('asd','f');
        $this->assertFalse($result);

        $result = Helpers::checkCharacterInString('sda','a');
        $this->assertTrue($result);
        
    }


}