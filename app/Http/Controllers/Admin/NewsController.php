<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $builder)
    {
        return view('admin.news.index', [
            'newsList' => $builder->getnews()
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [            
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, NewsQueryBuilder $builder) : RedirectResponse
    {
        // $request->validate([
        //     'title' => ['required', 'string', 'min:5', 'max:150']
        // ]);

        $news = $builder->create(
            $request->validated()
        );

        

        // // return response()->json($request->only(['title', 'description'] ));
        // $news = new News();  
        // //     $request->only(['title','description','category_id','author','status','image','released_at'])
        // // );        
        // $news->title = $request->input('title');
        // $news->description =  $request->input('description');
        // $news->category_id = $request->input('category_id');
        // $news->author = $request->input('author');
        // $news->status = $request->input('status');
        // $news->image = $request->input('image');
        // $news->released_at = date("Y-m-d H:i:s");
        if($news) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно добавлена');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //dd($news);
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news, NewsQueryBuilder $builder): RedirectResponse 
    {
       
    //     $news->title = $request->input('title');
    //     $news->description =  $request->input('description');
    //     $news->category_id = $request->input('category_id');
    //     $news->author = $request->input('author');
    //     $news->status = $request->input('status');
    //     $news->image = $request->input('image');
    //    // dd($request ->input("release"));
    //     $news->released_at = strtotime($request ->input("release"));
        if($builder->update(
            $news,
            $request->validated()))
            {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, NewsQueryBuilder $builder)
    {
        //dd('123');
        if($builder->delete($id))
            return back()->with('success', 'Запись успешно удалена');

        return back()->with('error', 'Не удалось удалить запись');
    }
}
