@extends('layouts.admin')
@section('content')
    <h2>Изменить Новость</h2>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value={{$news->title}}>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! $news->description !!}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value={{$news->author}}>
            </div>
            <div class="form-group">
                <label for="category">Выбрать Категорию</label>
                <input type="text" class="form-control" name="category" id="category" value={{$news->category_id}}>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" id="status" value={{$news->status}}>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" value={{$news->image}}>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection