@extends('layouts.main')
@section('title')
    Домашняя страницы
    @parent
@endsection
@section('content')
<h1>Приветствие</h1>
        
        <a href="{{ route('admin.index')}}">Link to Admin Page</a>
        <a href="/about">About</a>
        <a href="{{ route('news.index')}}">News</a>
        <a href="{{ route('categories.index')}}">Categories</a>

@endsection