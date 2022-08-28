<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        //return "Страница новостей";
        $news = $this -> getNews();
        return view('news.index', [
            'newsList' => $news
        ]);

    }

    public function show(int $id){
        // return "Новость № $id";
        $news = $this -> getNews()[$id];        
        return view('news.show', [
            'news' => $news
        ]);

    }    
}
