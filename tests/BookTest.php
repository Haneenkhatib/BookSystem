<?php
/**
 * Created by PhpStorm.
 * User: LTC2018
 * Date: 4/16/2019
 * Time: 11:43 PM
 */

namespace Tests;

use tests\TestCase;
class BookTest extends TestCase
{

    public function test_create_book(){
        $data=[

            'image'=>"https://images.pexels.com/photos/1000084/pexels-photo-1000084.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
            'title'=>"Hello world",
            'author'=>"Ali",
            'publisher'=>"sami",
            'writer'=>"saosan",
            'isbn'=>"dsg23655",
            'lang'=>"ar",
            'category_id'=>2,
            'library_id'=>4,
            'publish_date'=>"27/10/2015"
        ];
        $this->post(route('book.create'),$data)
        ->assertStatus(201)
            ->assertJson($data)
        ;
    }
}
