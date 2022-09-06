<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        //return "Страница новостей";        
         $news = app(News::class)->getNews();
        return view('news.index', [
            'newsList' => $news
        ]);

    }

    public function show(int $id){
        // return "Новость № $id";
        $news = app(News::class)->getNewsById($id);       
        return view('news.show', [
            'news' => $news
        ]);

    }    
}
