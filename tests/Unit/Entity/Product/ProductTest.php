<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity\Product;

use App\Entity\Product\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProductWithoutColorAttribute()
    {
        $product = new Product();

        $this->assertNull($product->getColor());
    }

    public function testProductWithRedColorAttribute()
    {
        $product = new Product();

        $product->setColor('Red');
        $this->assertSame('Red', $product->getColor());
    }

    public function testProductWithBlueColorAttribute()
    {
        $product = new Product();

        $product->setColor('Blue');
        $this->assertSame('Blue', $product->getColor());
    }

    public function testProductWithGreenColorAttribute()
    {
        $product = new Product();

        $product->setColor('Green');
        $this->assertSame('Green', $product->getColor());
    }
}
