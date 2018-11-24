@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@foreach($stories as $story)
    <div class="card story">
            {{ $story->content }}
    </div>
@endforeach