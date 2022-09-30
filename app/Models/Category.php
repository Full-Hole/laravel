<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';

    // public function getCategories()
    // {
    //     return DB::table($this->table)->select(['id', 'title', 'description', 'created_at'])->get();
    //     // return DB::select("select * from {$this->table}");

    // }

    // public function getCategoryById(int $id)
    // {
    //     return DB::table($this->table)->select(['id', 'title', 'created_at'])->find($id);
    //     // DB::selectOne("select * from {$this->table} where id= :id", ["id"=> $id]);
    // }

    // public function getCategoryByName(string $name)
    // {
    //     return DB::selectOne("select * from {$this->table} where title like :name", ["name"=> $name]);
    // }
}
