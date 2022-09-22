@extends('layouts.admin')
@section('content')
    <h2>Редактировать Новость</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('inc.message', ['vmessage' => $error])
        @endforeach
        
    @endif
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.update', ['news' => $news])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! $news->description !!}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
            </div>
            <div class="form-group">
                <label for="category_id">Выбрать Категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if ($news->category_id === $category['id']) selected @endif > {{$category['title']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status" >
                    <option @if ($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if ($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if ($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" value="{{$news->image}}">
            </div>
            <div class="form-group">
                <label for="release">Дата релиза</label>
                
                <input type="datetime-local" class="form-control" name="release" id="release" value="{{$news->released_at}}">
                {{-- ->format('Y-m-d\TH:i:s') --}}
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection