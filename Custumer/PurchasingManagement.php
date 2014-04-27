<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Custumer;

require_once('\Custumer\Calculate.php');
require_once('\Custumer\Product.php');

/**
 * Description of PurchasingManagement
 *
 * @author Abou Alioune Hemedi
 */
class PurchasingManagement
{
    /**
     *
     * @var Calculate 
     */
    private $calculate;
    
    /**
     * @var array
     */
    private $products;
    
    /**
     *
     * @var array
     */
    private $quantitys;

    public function __construct(Calculate $calculate = NULL)
    {
        if ($calculate === NULL) {
            $calculate = new Calculate();
        }
        
        $this->calculate = $calculate;
    }
    
    /**
     * 
     * @param Product $product
     */
    public function addProduct(Product $product, $quantity = 1)
    {
            $this->products [] = $product;
            $this->quantitys[$product->getType()] = $quantity;
    }
    
     /**
     * 
     * @param type $value
     * @throws Exception
     */
    private function assertNumeric($value)
    {
        if (false === is_numeric($value)) {
            throw new \Exception('Vlue the pay is not numerique');
        }
    }
    
    /**
     * 
     * @param float $pay
     * 
     * @return float
     */
    public function pay($pay)
    {
        $this->assertNumeric($pay);
        $sums = 0;
        foreach ($this->products as $product) {
            $sums += $this->calculate->getCost($product, $this->quantitys[$product->getType()]);
        }

        if ($sums > $pay) {
            return 'the amount is insufficient to pay for your products';
        }
        
        return $pay - $sums;
    }
}