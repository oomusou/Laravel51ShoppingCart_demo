<?php

/**
 * Created by PhpStorm.
 * User: oomusou
 * Date: 10/29/15
 * Time: 9:40 AM
 */

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Collection;

class ShoppingCartService
{
    /**
     * @var Collection
     */
    protected $basket;

    /**
     * ShoppingCartService constructor.
     */
    public function __construct()
    {
        $this->basket = new Collection();
    }

    /**
     * @param Book $book
     */
    public function addToCart($book)
    {
        $this->basket->push($book);
    }

    /**
     * @return integer
     */
    public function checkOut()
    {
        $total = 0;
        $this->basket->each(function ($item) use (&$total) {
            /** @var Book $item */
            $total += $item->price;
        });

        $count = $this->basket->count();
        $discount = $this->discount($count);

        $price = $total * $discount;

        return $price;
    }

    /**
     * @param integer $count
     * @return float
     */
    protected function discount($count)
    {
        if ($count == 1)
            $discount = 1.0;
        elseif ($count == 2)
            $discount = 0.95;
        else
            $discount = 1.0;

        return $discount;



    }
}