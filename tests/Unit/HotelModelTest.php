<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Hotel;
class HotelModelTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_calc_discount(){

        $hotel= new Hotel([
            'price'=>100,
            'discount_value'=>30,
        ]);

        $result=$hotel->calcDiscount();

        $this->assertEquals(70,$result);
    }
}
