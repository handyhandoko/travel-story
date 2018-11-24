{!! Form::open(['url' => 'foo/bar']) !!}
    <div class="card">
        {{ Form::textarea('content', null, array('placeholder'=>'Ceritakan kisah perjalanan mu disini',
        'class'=>'autoExpand', 'rows'=>'3', 'data-min-rows'=>'3')) }}
    </div>
    
    {!! Form::submit('Post kisah mu!') !!}
{!! Form::close() !!}
