@extends('layouts.main')
@section('title')
    Оставить отзыв
    @parent
@endsection
@section('content')
    <h2>Оставить отзыв</h2>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('feedback.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Имя пользователя</label>
                <input type="text" class="form-control" name="title" id="title" value={{old("title")}}>
            </div>
            <div class="form-group">
                <label for="description">Комментарий/Отзыв</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old("decription")!!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection