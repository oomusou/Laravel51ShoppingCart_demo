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
     * 新增至購物車
     *
     * @param Book $book
     */
    public function addToCart($book)
    {
        $this->basket->push($book);
    }

    /**
     * 結帳
     *
     * @return integer
     */
    public function checkOut()
    {
        $unique = $this->basket->unique();
        $unique->each(function ($item, $key) {
            $this->basket->forget($key);
        });
        $others = $this->basket;

        $price = $unique->sum('price') * $this->discount($unique->count());
        $price += $others->sum('price') * $this->discount($others->count());

        return $price;
    }

    /**
     * 計算折扣匯率
     *
     * @param integer $count
     * @return float
     */
    protected function discount($count)
    {
        if ($count == 1)
            $discount = 1.0;
        elseif ($count == 2)
            $discount = 0.95;
        elseif ($count == 3)
            $discount = 0.9;
        elseif ($count == 4)
            $discount = 0.8;
        elseif ($count == 5)
            $discount = 0.75;
        else
            $discount = 1.0;

        return $discount;



    }
}