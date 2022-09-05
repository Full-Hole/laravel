@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <a href="{{ route('admin.categories.create') }}" style="float: right;" class="btn btn-primary">Добавить
                Категорию</a>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id  }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>
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
