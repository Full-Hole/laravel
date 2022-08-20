@extends('layouts.admin')
@section('content')
<h2>Список категорий</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Наименование</th>
        <th scope="col">Управление</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categoryList as $key => $category)
        <tr>
            <td>{{$key}}</td>
            <td>{{$$category['name']}}</td>            
            <a href="{{ route('admin.categories.edit', ['category' => $key]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
        </tr>        
        @empty
            Нет Категорий
        @endforelse
      
    </tbody>
  </table>
</div>

@endsection