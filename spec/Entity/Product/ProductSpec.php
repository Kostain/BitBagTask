<?php

namespace spec\App\Entity\Product;

use App\Entity\Product\Product;
use PhpSpec\ObjectBehavior;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    function it_should_have_its_color_attribute_initially_set_to_null()
    {
        $this->getColor()->shouldBeNull();
    }

    function it_should_return_red_color_after_set_it()
    {
        $this->setColor('Red');

        $this->getColor()->shouldBe('Red');
    }

    function it_should_return_blue_color_after_set_it()
    {
        $this->setColor('Blue');

        $this->getColor()->shouldBe('Blue');
    }

    function it_should_return_green_color_after_set_it()
    {
        $this->setColor('Green');

        $this->getColor()->shouldBe('Green');
    }

}
