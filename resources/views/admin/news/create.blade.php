@extends('layouts.admin')

@section('content')
    <h2>Добавить Новость</h2>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value={{old("title")}}>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old("description")!!}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Выбрать Категорию</label>
                <select class="form-control" name="category_id" id="category_id" value={{old("category")}}>
                    <option value="0">Выбрать</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if (old('category_id') === $category['id']) selected @endif > {{$category['title']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value={{old("author")}}>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status" >
                    <option @if (old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if (old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if (old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div><br>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection