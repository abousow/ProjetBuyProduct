<?php

namespace Custumer;

require_once('\Custumer\Product.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gear
 *
 * @author Abou Alioune Hemedi
 */
class Gear implements Product
{
    /**
     *
     * @var float
     */
    private $price;
    
    /**
     *
     * @var string
     */
    private $type;

    /**
     * 
     * @param integer $price
     * @param string  $type
     */
    public function __construct($price, $type) {
        $this->assertNumeric($price);
        $this->price = $price;
        $this->type = $type;
    }
    
    /**
     * 
     * @param type $value
     * @throws Exception
     */
    private function assertNumeric($value)
    {
        if (false === is_numeric($value)) {
            throw new Exception('Vlue the price is not numerique');
        }
    }
    
    /**
     * Retirn the price
     * 
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Return the type of product
     * @return string
     */
    public function getType()
    {
        return $this->type;
    } 
}