<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        //return "Страница новостей";
        $categories = $this -> getCategories();
        return view('categories.index', [
            'categoryList' => $categories
        ]);

    }

    public function show(string $name){
        // return "Новость № $id";
        $news = $this -> getNews();        
        return view('categories.show', [
            'name' => $name,
            'newsList' => $news
        ]);

    }   
}
