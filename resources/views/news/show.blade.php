@extends('layouts.main')
@section('title')
{{ $news->title }}
@parent
@endsection
@section('content')
<div style="border: 1px solid red;">
    <h2>{{ $news->title }}</h2>
    <p>{{ $news->author }} - {{ $news->created_at}}</p>
    <p>{{ $news->description }}</p>
</div>
@endsection

