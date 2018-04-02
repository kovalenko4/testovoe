<?php
/**
 * Created by PhpStorm.
 * User: Pashulya
 * Date: 22.11.2017
 * Time: 12:49
 */
require "Discount.php";

$myDiscount = new Discount();
//формируем список продуктов
$arr = $myDiscount->initialProducts();
//формируем список покупок
$items = $myDiscount->formingItemList($arr);
//расчитываем скидку
$disc = $myDiscount->calculateDiscount($items) * 100;
//выводим список продуктов
print_r($items);
//выводим сумму чека
$sum = array_sum($items);
echo "TotalSum: ".$sum."\n";
//выводим скидку
echo "Discount: ".$disc."%\n";
//выводим чек со скидкой
$sumD = array_sum($items)  - (array_sum($items) * $disc / 100);
echo "TotalSum with discount: ".$sumD."\n";


