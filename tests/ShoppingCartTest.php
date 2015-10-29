<?php

use App\Services\ShoppingCartService;
use App\Models\Book;

class ShoppingCartTest extends TestCase
{
    /**
     * @var ShoppingCartService
     */
    protected $target = null;


    public function setUp()
    {
        parent::setUp();
        $this->target = new ShoppingCartService();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Given 第一集買了 1 本
     * And   第二集買了 0 本
     * And   第三集買了 0 本
     * And   第四集買了 0 本
     * And   第五集買了 0 本
     * When  結帳
     * Then  價格應為 100 元
     *
     * @group ShoppingCartTest
     * @group ShoppingCartTest0
     */
    public function testBuy_1_book1_should_cost_100()
    {
        // Arrange
        $this->target->addToCart(new Book('book1', 100));
        $expected = 100;

        // Act
        $actual = $this->target->checkOut();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * Given 第一集買了 1 本
     * And   第二集買了 1 本
     * And   第三集買了 0 本
     * And   第四集買了 0 本
     * And   第五集買了 0 本
     * When  結帳
     * Then  價格應為 190 元
     *
     * @group ShoppingCartTest
     * @group ShoppingCartTest1
     */
    public function testBuy_1_book1_and_1_book2_should_cost_190()
    {
        // Arrange
        $this->target->addToCart(new Book('book1', 100));
        $this->target->addToCart(new Book('book2', 100));
        $expected = 190;

        // Act
        $actual = $this->target->checkOut();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * Given 第一集買了 1 本
     * And   第二集買了 1 本
     * And   第三集買了 1 本
     * And   第四集買了 0 本
     * And   第五集買了 0 本
     * When  結帳
     * Then  價格應為 270 元
     *
     * @group ShoppingCartTest
     * @group ShoppingCartTest2
     */
    public function testBuy_1_book1_and_1_book2_and_1_book3_should_cost_270()
    {
        // Arrange
        $this->target->addToCart(new Book('book1', 100));
        $this->target->addToCart(new Book('book2', 100));
        $this->target->addToCart(new Book('book3', 100));

        $expected = 270;

        // Act
        $actual = $this->target->checkOut();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * Given 第一集買了 1 本
     * And   第二集買了 1 本
     * And   第三集買了 1 本
     * And   第四集買了 1 本
     * And   第五集買了 0 本
     * When  結帳
     * Then  價格應為 320 元
     *
     * @group ShoppingCartTest
     * @group ShoppingCartTest3
     */
    public function testBuy_1_book1_and_1_book2_and_1_book3_and_1_book4_should_cost_320()
    {
        // Arrange
        $this->target->addToCart(new Book('book1', 100));
        $this->target->addToCart(new Book('book2', 100));
        $this->target->addToCart(new Book('book3', 100));
        $this->target->addToCart(new Book('book4', 100));

        $expected = 320;

        // Act
        $actual = $this->target->checkOut();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * Given 第一集買了 1 本
     * And   第二集買了 1 本
     * And   第三集買了 1 本
     * And   第四集買了 1 本
     * And   第五集買了 1 本
     * When  結帳
     * Then  價格應為 375 元
     *
     * @group ShoppingCartTest
     * @group ShoppingCartTest4
     */
    public function testBuy_1_book1_and_1_book2_and_1_book3_and_1_book4_and_1_book5_should_cost_375()
    {
        // Arrange
        $this->target->addToCart(new Book('book1', 100));
        $this->target->addToCart(new Book('book2', 100));
        $this->target->addToCart(new Book('book3', 100));
        $this->target->addToCart(new Book('book4', 100));
        $this->target->addToCart(new Book('book5', 100));

        $expected = 375;

        // Act
        $actual = $this->target->checkOut();

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
