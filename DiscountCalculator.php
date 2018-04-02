<?php

class DiscountCalculator
{
    private $products = [];

    public function __construct()
    {
        $this->products = array(
            "A" => rand(1, 100),
            "B" => rand(1, 100),
            "C" => rand(1, 100),
            "D" => rand(1, 100),
            "E" => rand(1, 100),
            "F" => rand(1, 100),
            "G" => rand(1, 100)
        );

        var_dump($this->products);
    }

    public function calculateDiscount(array $itemList)
    {
        $totalPrice = 0;

        foreach ($itemList as $item) {
            if (!isset($this->products[$item])) {
                throw new \InvalidArgumentException("Item $item does not exist.");
            }

            $totalPrice += $this->products[$item];
        }

        if ($totalPrice > 100) {
            return 0.15;
        }

        if ((count($itemList) > 2) && (array_key_exists('A', $itemList) || array_key_exists('C', $itemList))) {
            return 0.1;
        }

        if (count($itemList) > 2){
            return 0.05;
        }

        return 0;
    }
}

$discountCalculator = new DiscountCalculator();
echo($discountCalculator->calculateDiscount(['A', 'B', 'G']) . "\n");
