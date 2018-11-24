@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@foreach($share_costs as $share_cost)
    <div class="card story">
        {{ str_limit(strip_tags($share_cost->content), 500) }}
        @if (strlen(strip_tags($share_cost->content)) > 50)
            ... <a href="{{URL::to('story/' . $share_cost->id) }}">Read More</a>
        @endif
    </div>
@endforeach