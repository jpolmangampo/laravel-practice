@extends('layouts.app')

@section('title', 'View All Posts')

@section('header')
    <h1>View All Posts</h1>
@endsection

@section('content')
    <ul class="list-group">
        @forelse($all_posts as $post)
            <li class="list-group-item">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </li>
        @empty
            <li>You don't have any posts.</li>
        @endforelse
    </ul>
@endsection

@section('footer')
    <p>This is the footer.</p>
@endsection