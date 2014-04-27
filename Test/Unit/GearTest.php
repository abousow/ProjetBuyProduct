<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\unit;

use \PHPUnit_Framework_TestCase;

require_once '\Custumer\Gear.php';
require_once '\Custumer\Product.php';

/**
 * Description of GearTest
 *
 * @author Abou Alioune Hemedi
 */
class GearTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var Product 
     */
    private $product;
    
    public function setUp()
    {
        $this->product = new \Custumer\Gear(15, 'type1');
    }
    
    public function testShouldBeAProduct()
    {
        $this->assertInstanceOf('\Custumer\Product', $this->product);
    }
    
    public function testReturnThePrice()
    {
        $this->assertSame(15, $this->product->getPrice());
    }
    
    public function testreturnTheType()
    {
        $this->assertSame('type1', $this->product->getType());
    }
}