@extends('layouts.admin')
@section('content')
<h2>Список новостей</h2>

<div class="table-responsive">
  @include('inc.message')
  <a href="{{ route('admin.news.create')}}" style="float: right;" class="btn btn-primary">Добавить Новость</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Автор</th>
        <th scope="col">Категория</th>
        <th scope="col">Статус</th>
        <th scope="col">Дата Релиза</th>
        <th scope="col">Дата Создания</th>        
        <th scope="col">Управление</th>
        
      </tr>
    </thead>
    <tbody>
     
        @forelse ($newsList as $news)
        <tr>
            <td>{{$news->id}}</td>
            <td>{{$news->title}}</td>
            <td>{{$news->author}}</td>
            <td>{{$news->category->title}}</td>
            <td>{{$news->status}}</td>
            <td>{{ $news->released_at}}</td>
            <td>{{ $news->created_at->format('d-m-Y H:i')}}</td>
            <td>
            <a href="{{ route('admin.news.edit', ['news' => $news['id']]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="javascript:" class="btn btn-sm btn-outline-danger delete" rel="{{$news->id}}">Delete</a>
        </td>
        </tr>        
        @empty
            Нет новостей
        @endforelse
      
    </tbody>
  </table>
  {{$newsList->links()}}
</div>

@endsection
@push('js')
  <script type="text/javascript">
  
    document.addEventListener("DOMContentLoaded", function() {
      
      let delBtn = document.querySelectorAll(".delete");
      delBtn.forEach(element => {
        
        element.addEventListener("click", ()=>{
          const id = element.getAttribute('rel');
          if(confirm('Удалить?'))
          {            
            remElement(`/admin/news/${id}`).then(()=>{
              location.reload()
            })
          }
          });
      });
    });
    async function remElement(url) {
      let response = await fetch(url, {
        method: 'DELETE',
        headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          } 
        });
        let result = await response.json();
        return result.ok;
      }
  </script>
@endpush
