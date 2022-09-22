<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table ='news';
    protected $dates = ['released_at'];
    protected $fillable =['title','description','category_id','author','status','image', 'released_at'];
    // protected $casts = [
    //     'released_at' => 'date("Y-m-d H:i:s")'
    // ];

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeStatus(Builder $query):Builder 
    {
        return $query->where('status', News::DRAFT);
    }

    // public function getNews()
    // {
    //     // return DB::select("select * from {$this->table}");
    //     return DB::table($this->table)
    //     ->join('categories', "{$this->table}.category_id", '=', 'categories.id')
    //     ->select("{$this->table}.*", 'categories.title as categoryTitle')
    //     ->get();
    // }

    // public function getActiveNews()
    // {
    //     return DB::table($this->table)->where('status', News::ACTIVE)->get();
    // }

    // public function getNewsById(int $id)
    // {
    //     return DB::selectOne("select * from {$this->table} where id= :id", ["id"=> $id]);
    // }

    // public function getNewsByCategoryId(int $id)
    // {
    //     return DB::select("select * from {$this->table} where category_id= :id", ["id"=> $id]);
    // }
}
