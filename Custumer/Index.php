<?php

namespace Custumer;

require_once('\Custumer\Gear.php');
require_once('\Custumer\Product.php');
require_once('\Custumer\PurchasingManagement.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$product = new Gear(10, 'custom');

$prchasingManagement = new PurchasingManagement();
$prchasingManagement->addProduct($product, 4);
$prchasingManagement->pay(16);
