@extends('layouts.app')

@push('css_style')
    <link href="css/expandable_textarea.css" rel="stylesheet" >
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials/new_story')
            @include('partials/story_line')
        </div>
    </div>
</div>
@endsection

@push('js_script')
    <script type="text/javascript" src="js/expandable_textarea.js"></script>
@endpush