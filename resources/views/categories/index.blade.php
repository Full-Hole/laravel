@extends('layouts.main')
@section('title')
    Список новостей
    @parent
@endsection
@section('content')
    @forelse($categoryList as $key => $category)
    <div class="col">
        <div class="card shadow-sm"> 
            <div class="card-body">
                <p class="card-text">{{$category['name']}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{route('categories.show', [ 'name' => $category['name']])}}"
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

