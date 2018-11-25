@extends('layouts.app')

@push('css_style')
    <link href="css/style.css" rel="stylesheet" >
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($share_cost->images()->exists())
                @foreach ($share_cost->images as $image)
                    <img class="card-img-top" src="/images/{{ $image->resized_name }}" alt="Gambar perjalanan">
                @endforeach
            @endif
            @foreach (explode("\n", $share_cost->content) as $paragraph)
                @if(trim($paragraph))
                    <p>{{$paragraph}}</p>
                @endif
            @endforeach
            Share cost ini akan berakhir tanggal {{ $share_cost->end_time->format('d/m/Y') }}<br/>
            Contact : {{ $share_cost->contact }}<br/>
            Whatsapp : 
            @if(substr( $share_cost->wa_contact, 0, 1 ) == "0")
                <a href="https://wa.me/62{{ substr( $share_cost->wa_contact, 1, strlen($share_cost->wa_contact) ) }}">Hubungi via Whatsapp<a>
            @endif
        </div>
    </div>
</div>
@endsection
