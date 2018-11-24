{!! Form::open(['url' => 'story']) !!}
    <div class="card">
        {{ Form::textarea('content', null, array('placeholder'=>'Ceritakan kisah perjalanan mu disini',
        'class'=>'autoExpand', 'rows'=>'3', 'data-min-rows'=>'3')) }}
    </div>
    
    {!! Form::submit('Post kisah mu!', array('class'=>'btn btn-primary')) !!}
{!! Form::close() !!}
