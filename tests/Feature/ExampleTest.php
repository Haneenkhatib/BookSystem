<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user=factory(User::class)->create();
        $response=$this->actingAs($user)
            ->withSession(["nam"=>"ss"])
      ->get('user.all');
    }
}
