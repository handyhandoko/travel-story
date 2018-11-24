@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@foreach($stories as $story)
    <div class="card story">
        {{ str_limit(strip_tags($story->content), 500) }}
        @if (strlen(strip_tags($story->content)) > 50)
            ... <a href="{{URL::to('story/' . $story->id) }}">Read More</a>
        @endif
    </div>
@endforeach