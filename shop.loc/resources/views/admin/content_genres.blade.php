<div style="margin: 0px 50px;">

@if($genres)
<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $k=>$genre)
                <tr>
                    <td>{{$genre->id}}</td>
                    <td>{!!Html::link(route('genreEdit',['genre'=>$genre->id]),$genre->genre,['alt'=>$genre->genre])!!}</td>
                    <td>
                        {!!Form::open(['url'=>route('genreEdit',['person'=>$genre->id]),'class'=>'form-horizontal','method'=>'POST'])!!}
                            {{method_field('DELETE')}}
                            {!!Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit'])!!}
                        {!!Form::close()!!}
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endif
{!!Html::link(route('genreAdd'),"NEW PAGE")!!}
</div>