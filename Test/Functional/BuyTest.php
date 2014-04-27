<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\unit;

use \PHPUnit_Framework_TestCase;
require_once '\Custumer\Gear.php';
require_once '\Custumer\Gear.php';
require_once '\Custumer\PurchasingManagement.php';

/**
 * Description of BuyTest
 *
 * @author Abou Alioune Hemedi
 */
class BuyTest extends PHPUnit_Framework_TestCase
{
     /**
     *
     * @var PurchasingManagement 
     */
    private $management;
    
    public function setUp() {
       $this->management = new \Custumer\PurchasingManagement();
    }
    
    public function testSouldCostForProducts()
    {
        $product1 = new \Custumer\Gear(20, 'shirt');
        $product2 = new \Custumer\Gear(45, 'Keds Shoe');
        
        $this->management->addProduct($product1, 3);
        $this->management->addProduct($product2);
        
        $this->assertSame(15.0, $this->management->pay(100));
    }
    
    public function testSouldTheCashBalanceIsNotEnough()
    {
        $product = new \Custumer\Gear(20, 'shirt');
        $this->management->addProduct($product, 3);
        
        $this->assertSame('the amount is insufficient to pay for your products', $this->management->pay(39));
    }
}

?>
