<?php

namespace Tests\Feature;

use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesTest extends TestCase
{
    use RefreshDatabase;

    //    public function setUp() :void
//    {
//        parent::setUp();
//        $this->comment = factory(Comment::class)->create();
//
//    }

    public function test_check_is_data_exists_in_db()
    {
        $series = Series::factory()->create();

        $this->assertDatabaseHas('series', [
            'name' => $series->name,

        ]);
    }

//    public function test_a_series_can_be_stored()
//    {
//
//    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }
}
