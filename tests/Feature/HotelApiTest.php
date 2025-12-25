<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Hotel;


class HotelApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function hotel_test_end_point(): void
    {
      

        //create hotels
        //factories
        Hotel::factory()->count(3)->create();

        // call index endpoint  hotels 
        $response=$this->getJson('/api/hotels');


        // assert response
        $response->assertStatus(200)->assertJsonCount(3,'data');

    }
}
