<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        //return "Страница новостей";
        $categories = app(Category::class)->getCategories();
        
        return view('categories.index', [
            'categories' => $categories
        ]);

    }

    public function show(string $name){
        // return "Новость № $id";  
        $cat = app(Category::class)->getCategoryByName($name);
        $news = app(News::class)->getNewsByCategoryId($cat->id);
          
        return view('categories.show', [
            'title' => $name,
            'newsList' => $news
        ]);

    }   
}
