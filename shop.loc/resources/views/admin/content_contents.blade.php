<div style="margin: 0px 50px;">

@if($contents)
<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Тип</th>
                <th>Цена</th>
                <th>Текст</th>
                <th>Время создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contents as $k=>$content)
                <tr>
                    <td>{{$content->id}}</td>
                    <td>
                        <a href="{{route('contentEdit',['content'=>$content->id])}}" alt ="{{$content->name}}">{{$content->name}}</a>
                    </td>
                    <td>{{$content->types}}</td>
                    <td>{{$content->price}}</td>
                    <td>{{$content->text}}</td>
                    <td>{{$content->created_at}}</td>
                    <td>
                        
                        <form method="post" action="{{route('contentEdit',['content'=>$content->id])}}" class="form-horizontal">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                           
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endif
<a href="{{route('contentAdd')}}">Новый Товар</a>
</div>