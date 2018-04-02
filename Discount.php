<?php
/**
 * Created by PhpStorm.
 * User: Pashulya
 * Date: 23.11.2017
 * Time: 8:39
 */

class Discount
{
    //функция инициализации, возвращает массив, который
    //содержит в себе товары, со случайно установлеными ценами
    public function initialProducts(){
        return array(
            "A" => rand(1, 100),
            "B" => rand(1, 100),
            "C" => rand(1, 100),
            "D" => rand(1, 100),
            "E" => rand(1, 100),
            "F" => rand(1, 100),
            "G" => rand(1, 100)
        );
    }

    //функция, которая формирует список покупок
    //на вход принимает массив продуктов,
    //на выходе возвращает массив, который содержит
    // произвольное кол-во товаров
    public function formingItemList($array){
        $itemCount = rand(1, 5);
        $items = null;
        for ($i = 0; $i < $itemCount; $i++){
            $items[array_rand($array)] = $array[array_rand($array)];
        }
        return $items;
    }

    //функция, которая расчитывает скидку
    //на вход принмает список покупок,
    //на выходе возвращает скидочный коэф.
    public function calculateDiscount($itemList){

        if (array_sum($itemList) > 100){
            return 0.15;
        }

        if ((count($itemList) > 2) && (array_key_exists('A', $itemList) || array_key_exists('C', $itemList))){
            return 0.1;
        }

        if (count($itemList) > 2){
            return 0.05;
        }

        return 0;
    }
}