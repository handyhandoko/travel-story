@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@foreach($stories as $story)
    <div class="card story">
        @if($story->images()->exists())
            <img class="card-img-top" src="/images/{{ $story->images->first()->resized_name }}" alt="Gambar perjalanan">
        @endif
        <div class="card-body">
            {{ str_limit(strip_tags($story->content), 500) }} ... <a href="{{URL::to('story/' . $story->id) }}">View More</a>
        </div>
    </div>
@endforeach