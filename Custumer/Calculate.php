<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Custumer;
/**
 * Description of calculate
 *
 * @author Abou Alioune Hemedi
 */
class Calculate
{
    /**
     * 
     * @param Product $product
     */
    public function getCost(Product $product, $quantiry)
    {
        $cost = 0;

        switch ($quantiry) {
            case 1:
                $cost = $product->getPrice();
            default:
                $cost = ($product->getPrice()/2) * ($quantiry-1) + $product->getPrice();
        }
        
        return $cost;
    }
}

?>
