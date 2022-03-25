<?php

declare(strict_types=1);

namespace spec\App\Entity\Product;

use App\Entity\Product\Product;
use PhpSpec\ObjectBehavior;

final class ProductSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(Product::class);
    }

    function it_should_have_its_color_attribute_initially_set_to_null(): void
    {
        $this->getColor()->shouldBeNull();
    }

    function it_should_return_red_color_after_set_it(): void
    {
        $this->setColor('Red');

        $this->getColor()->shouldBe('Red');
    }

    function it_should_return_blue_color_after_set_it(): void
    {
        $this->setColor('Blue');

        $this->getColor()->shouldBe('Blue');
    }

    function it_should_return_green_color_after_set_it(): void
    {
        $this->setColor('Green');

        $this->getColor()->shouldBe('Green');
    }

}
