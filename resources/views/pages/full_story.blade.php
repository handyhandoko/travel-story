@extends('layouts.app')

@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($story->images()->exists())
                @foreach ($story->images as $image)
                    <img class="card-img-top" src="/images/{{ $image->resized_name }}" alt="Gambar perjalanan">
                @endforeach
            @endif
            @foreach (explode("\n", $story->content) as $paragraph)
                @if(trim($paragraph))
                    <p>{{$paragraph}}</p>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
