@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@foreach($share_costs as $share_cost)
    <div class="card story">
        @if($share_cost->images()->exists())
            <img class="card-img-top" src="/images/{{ $share_cost->images->first()->resized_name }}" alt="Gambar wisata sharecost">
        @endif
        <div class="card-body">
            {{ str_limit(strip_tags($share_cost->content), 500) }}... <a href="{{URL::to('sharecost/' . $share_cost->id) }}">Read More</a>
        </div>
    </div>
@endforeach