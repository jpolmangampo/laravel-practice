@extends('layouts.app')
  
@section('title', "Show")

@section('header')
    <h1>POST</h1>
@endsection

@section('content')

    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
    
    {{-- <ul>
        @foreach ($posts as $post)
            <li>{{ $post }}</li>
        @endforeach
    </ul> --}}
@endsection

@section('footer')
    <div class="text-muted">
        <i class="fa-brands fa-facebook-f"></i>
        &nbsp;
        <i class="fa-brands fa-instagram"></i>
        &nbsp;
        <i class="fa-brands fa-twitter"></i>
    </div>
@endsection
    