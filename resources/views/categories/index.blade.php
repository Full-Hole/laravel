<div style="border: 1px solid red;">
        <ul>
@foreach($categoryList as $category)
    
            <li><a href="{{route('categories.show', [ 'name' => $category['name']])}}">{{$category['name']}}</li>
       
@endforeach
</ul>
    </div>