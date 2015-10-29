<?php

/**
 * Created by PhpStorm.
 * User: oomusou
 * Date: 10/29/15
 * Time: 9:40 AM
 */

namespace App\Models;

class Book
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $price;

    /**
     * Book constructor.
     * @param string $name
     * @param int $price
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}