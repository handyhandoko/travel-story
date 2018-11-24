@push('css_style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endpush

<div class="card">
    <form method="post" action="{{ url('/sharecost-images-save') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
        {{ csrf_field() }}
        <input id="remove-url" type="hidden" value="/sharecost-images-delete"/>
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
    {!! Form::open(['url' => 'sharecost', 'id'=>'form']) !!}
        {{ Form::textarea('content', null, array('placeholder'=>'Rancang rencana share cost mu disini',
    'class'=>'autoExpand', 'rows'=>'3', 'data-min-rows'=>'3')) }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
            </div>
            {{ Form::text('end_time', null, array('class' => 'form-control datepicker', 'placeholder' => 'Tanggal berakhir. Contoh: 31/12/2018')) }}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
            </div>
            {{ Form::text('contact', null, array('class' => 'form-control', 'placeholder' => 'No handphone anda')) }}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
            </div>
            {{ Form::text('wa_contact', null, array('class' => 'form-control', 'placeholder' => 'No. WA anda.')) }}
            <div class="input-group-append" id="button-addon4">
                <button class="btn btn-outline-secondary" type="button" id="copynumber">Copy dari no Handphone</button>
            </div>
        </div>
        <div class="justify-content-end">
            {!! Form::submit('Post share cost!', array('class'=>'btn btn-primary post-story float-right')) !!}
        </div>
    {!! Form::close() !!}
</div>

@push('js_script')
    <script type="text/javascript">
        $(function() {
            $('#copynumber').click(function(){
                $('[name="wa_contact"]').val($('[name="contact"]').val());
            });
        });
    </script>
@endpush