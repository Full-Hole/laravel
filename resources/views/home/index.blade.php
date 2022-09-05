@extends('layouts.main')
@section('title')
    Домашняя страницы
    @parent
@endsection
@section('content')
<h1>Приветствие</h1>
        
        <a href="/">Link to Admin Page</a>
        <a href="/about">About</a>
        <a href="/news">News</a>
        <a href="/categories">Categories</a>

@endsection