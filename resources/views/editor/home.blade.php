@extends('layouts.admin.app')

@section('content')

    <div class="container">
        <div class="mail-box">
            @include('layouts.sidebar')
            @if(isset($createPost))
                @include('createpost')
            @elseif(isset($draftPost))
                @include('curator.draftpost')
            @elseif(isset($publishPost))
                @include('editor.publishpost')
            @else
                @include('submittedposts')
            @endif
        </div>
    </div>
@endsection
