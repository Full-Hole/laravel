@extends('layouts.main')
@section('title')
    Оставить отзыв
    @parent
@endsection
@section('content')
    <h2>Оставить отзыв</h2>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('upload.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Имя заказчика</label>
                <input type="text" class="form-control" name="title" id="title" value={{old("title")}}>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" class="form-control" name="phone" id="phone" value={{old("phone")}}>
            </div>
            <div class="form-group">
                <label for="email">Имя пользователя</label>
                <input type="email" class="form-control" name="email" id="email" value={{old("email")}}>
            </div>
            <div class="form-group">
                <label for="description">Информациz о том, что он хочет получить</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old("decription")!!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection