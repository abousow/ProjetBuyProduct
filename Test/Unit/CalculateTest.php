<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\unit;

use \PHPUnit_Framework_TestCase;

require_once '\Custumer\Calculate.php';
require_once '\Custumer\Product.php';

/**
 * Description of CalculateTest
 *
 * @author Abou Alioune Hemedi
 */
class CalculateTest extends PHPUnit_Framework_TestCase
 { 
    /**
     * @dataProvider dataProviderQuantityAndPrice
     * 
     * @param integer $expected
     * @param integer $price
     * @param integer $quantity
     */
    public function testCostTheReturnProducts($expected, $price, $quantity)
    {
        $calculte = new \Custumer\Calculate();
        
        $product = $this->getMock('\Custumer\Product');
        $product
                ->expects($this->any())
                ->method('getPrice')
                ->will($this->returnValue($price));
        
        $cost = $calculte->getCost($product, $quantity);

        $this->assertSame($expected, $cost);
    }
    
    public function dataProviderQuantityAndPrice()
    {
        return array(
            array(12, 12, 1),
            array(18, 12, 2),
            array(24, 12, 3)
        );
    }
}