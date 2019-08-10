<?php

namespace Tests\Feature;

use App\Http\Controllers\bookController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_sum(){

        $num1=5;
        $num2=5;

        $res =  bookController::sum($num1,$num2);

        $this->assertEquals(10,$res);
    }
}
