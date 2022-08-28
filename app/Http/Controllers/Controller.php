<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(): array
    {
        $news = [];
        $faker = Factory::create();
        for($i=1; $i < 10; $i++){
            $news[$i] = [
                'title' => $faker -> sentence(),
                'author' => $faker -> userName(),
                'status' => 'DRAFT',
                'description' => $faker->text(100),
                'created_at' => now('Europe/Moscow')
            ];
        }
       
        return $news;
    }

    public function getCategories(): array
    {
        $categories = [];
        $faker = Factory::create();
        for($i=1; $i < 10; $i++){
            $categories[$i] = [
                'name' => $faker -> word(),
            ];
        }       
        return $categories;
    }
}
