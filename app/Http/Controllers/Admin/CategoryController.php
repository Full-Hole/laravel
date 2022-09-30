<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // $categories = app(Category::class)->getCategories();
        $categories= Category::all();
        // dd($categories);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);      
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:150']
        ]);
        //dd($request);
        // $data= $request->only(['title', 'description']);

        $category = new Category();
        // $news->title = $data['title'];
        $category->title = $request->input('title');
        // $news->description = $data['description'];
        $category->description =  $request->input('description');
        // return response()->json($request->only(['title', 'description'] ));
        if($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category 
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id);
        // $category = app(Category::class)->getCategoryById($id);
        
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $category->title = $request->input('title');
       
        $category->description = $request->input('description');
       
        if($category->save()) {
            
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновлена');
        }
        
        return back()->with('error', 'Не удалось обно вить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
