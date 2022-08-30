<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('categories')->insert($this->getData());        
    }

    protected function getData(): array
    {
        $categories = [];
        $faker = Factory::create();
        for($i=1; $i < 10; $i++){
            $categories[$i] = [
                'title' => $faker -> word(),
                'description' => $faker->text(100),
            ];
        }       
        return $categories;
    }        
}
