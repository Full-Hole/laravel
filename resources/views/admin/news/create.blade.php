@extends('layouts.admin')

@section('content')
    <h2>Добавить Новость</h2>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value={{old("title")}}>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old("decription")!!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection