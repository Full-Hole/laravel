@extends('layouts.admin')
@section('content')
<h2>Список новостей</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Автор</th>
        <th scope="col">Статус</th>
        <th scope="col">Дата</th>
        
      </tr>
    </thead>
    <tbody>
        @forelse ($newsList as $key => $news)
        <tr>
            <td>{{$key}}</td>
            <td>{{$news['title']}}</td>
            <td>{{$news['author']}}</td>
            <td>DRAFT</td>
            <td>{{ $news['created_at']->format('d-m-Y H:i') }}</td>
            <td>
            <a href="{{ route('admin.news.edit', ['news' => $key]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
        </tr>        
        @empty
            Нет новостей
        @endforelse
      
    </tbody>
  </table>
</div>

@endsection