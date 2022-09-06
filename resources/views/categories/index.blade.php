@extends('layouts.main')
@section('title')
    Список категорий
    @parent
@endsection
@section('content')
    @forelse($categories as $category)
    <div class="col">
        <div class="card shadow-sm"> 
            <div class="card-body">
                <p class="card-text">{{$category->title}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{route('categories.show', [ 'name' => $category->title])}}"
                            class="btn btn-sm btn-outline-secondary">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    @empty
        <h2>Записей нет</h2>
    @endforelse
@endsection

