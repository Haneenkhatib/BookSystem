<?php

namespace Tests;


use App\Http\Controllers\bookController;

class ExampleTest extends \PHPUnit\Framework\TestCase
{

    public function test_sum(){

        $num1=5;
        $num2=5;

     $res =  bookController::sum($num1,$num2);

     $this->assertEquals(10,$res);
    }
}
