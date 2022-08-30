<?php
declare(strict_types=1);
namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        DB::table('news')->insert($this->getData()); 
        
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $news = [];
        for($i=1; $i < 10; $i++){
            $news[$i] = [
                'category_id' => 1,
                'title' => $faker -> sentence(),
                'author' => $faker -> userName(),
                'status' => News::DRAFT,
                'image' => $faker -> imageUrl(),
                'description' => $faker->text(150),
                'released_at' => now('Europe/Moscow')
            ];
        }
        return $news;
    }    
}
