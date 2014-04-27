<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\unit;

use \PHPUnit_Framework_TestCase;

require_once '\Custumer\Gear.php';
require_once '\Custumer\Calculate.php';
require_once '\Custumer\PurchasingManagement.php';
/**
 * Description of PurchasingManagement
 *
 * @author Abou Alioune Hemedi
 */
class PurchasingManagementTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var PurchasingManagement 
     */
    private $management;
    
    public function setUp()
    {
        $this->management = new \Custumer\PurchasingManagement();
    }
    
    public function testShouldRetournAddProduct()
    {
        $expected = array(
            'type1' => 2,
            );
        
        $product1 = $this->getMock('\Custumer\Product');
        $product1
                ->expects($this->once())
                ->method('getType')
                ->will($this->returnValue('type1'));
        
        $this->management->addProduct($product1, 2);
        
        $this->assertAttributeEquals($expected, 'quantitys', $this->management);
        $this->assertAttributeContains($product1, 'products', $this->management);
        
        $expected2 = array(
            'type1' => 2,
            'type2' => 1,
            );
        $product2 = $this->getMock('\Custumer\Product');
        $product2
                ->expects($this->once())
                ->method('getType')
                ->will($this->returnValue('type2'));
        
         $this->management->addProduct($product2);
         
        $this->assertAttributeEquals($expected2, 'quantitys', $this->management);
        $this->assertAttributeContains($product2, 'products', $this->management);
    }
    
    public function testShouldReturnRestAfterPay()
    {
        $calculate = $this->getMock('\Custumer\Calculate');
        $calculate
                ->expects($this->at(0))
                ->method('getCost')
                ->will($this->returnValue(10));
        $calculate
                ->expects($this->at(1))
                ->method('getCost')
                ->will($this->returnValue(15));
        
        $this->management = new \Custumer\PurchasingManagement($calculate);
                
        $product1 = $this->getMock('\Custumer\Product');
        $product1
                ->expects($this->any())
                ->method('getType')
                ->will($this->returnValue('type1'));
         $product1
                ->expects($this->any())
                ->method('getPrice')
                ->will($this->returnValue(10));
         
        $product2 = $this->getMock('\Custumer\Product');
        $product2
                ->expects($this->any())
                ->method('getType')
                ->will($this->returnValue('type2'));
         $product2
                ->expects($this->any())
                ->method('getPrice')
                ->will($this->returnValue(15));
         
         $this->management->addProduct($product1);
         $this->management->addProduct($product2);
         
         $this->assertSame(10, $this->management->pay(35));
    }
    
    /**
     * @dataProvider dataProviderPay
     * 
     * @expectedException \Exception
     * @param string $pay
     */
    public function testShouldRetournExceptionWhentValurIsPayNotNumeric($pay)
    {
        $product = $this->getMock('\Custumer\Product');
        $product
                ->expects($this->any())
                ->method('getType')
                ->will($this->returnValue('type1'));
        
        $this->management->addProduct($product);
        $this->management->pay($pay);
        
    }
    
    public function dataProviderPay()
    {
        return array(
            array('1254k', ),
            array(('test')),
            array(array())
        );
    }
}