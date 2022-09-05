<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table ='news';

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    public function getNews()
    {
        return DB::select("select * from {$this->table}");
    }

    public function getActiveNews()
    {
        return DB::table($this->table)->where('status', News::ACTIVE)->get();
    }

    public function getNewsById(int $id)
    {
        return DB::selectOne("select * from {$this->table} where id= :id", ["id"=> $id]);
    }

    public function getNewsByCategoryId(int $id)
    {
        return DB::select("select * from {$this->table} where category_id= :id", ["id"=> $id]);
    }
}
