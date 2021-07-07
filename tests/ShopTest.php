<?php

namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\MyClass;
include 'MyClass.php';

class ShopTest extends TestCase
{

    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new MyClass(); 
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /** 
    * @dataProvider providerPower 
     */
    
    public function testAdd() {
        $x = 1;
        $y = 2;
        $this->assertEquals(3, $x + $y);
    }
    public function testSub() {
        $x = 4;
        $y = 2;
        $this->assertEquals(2, $x - $y);
    }

    public function testPower($a, $b, $c)
    {
        $this->assertEquals($c, $this->fixture->power($a, $b)); 
    }
    
    public function providerPower()
    {
        return array (
            array (2, 2, 4), 
            array (2, 3, 8), 
            array (3, 5, 243)
        ); 
    }
 
}