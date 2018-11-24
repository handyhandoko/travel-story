<div class="card">
    <form method="post" action="{{ url('/images-save') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
        {{ csrf_field() }}
        <div class="dz-message">
            <div class="col-xs-8">
                <div class="message">
                    <p>Drop files here or Click to Upload</p>
                </div>
            </div>
        </div>
        <div class="fallback">
            <input type="file" name="file" multiple>
        </div>
    </form>
    {!! Form::open(['url' => 'story']) !!}
        {{ Form::textarea('content', null, array('placeholder'=>'Ceritakan kisah perjalanan mu disini',
    'class'=>'autoExpand', 'rows'=>'3', 'data-min-rows'=>'3')) }}

        <div class="justify-content-end">
            {!! Form::submit('Post kisah mu!', array('class'=>'btn btn-primary post-story float-right')) !!}
        </div>
    {!! Form::close() !!}
</div>