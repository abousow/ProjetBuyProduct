<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Custumer;

/**
 *
 * @author Abou Alioune Hemedi
 */
interface Product
{
    /**
     * Return the Price for unit
     */
    public function getPrice();
    
    /**
     * Return the quantity the unite
     */
    public function getType();
}

