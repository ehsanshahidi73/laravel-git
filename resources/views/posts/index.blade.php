@extends('layouts.app')
@section('content')
    <ul>
        @foreach($posts as $post)
            <div>
                <img src="{{$post->path}}">
                <li><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a><span>{{$post->user->name}}</span></li>
                <li><a href="#">{{$post->description}}</a></li>
            </div>
            @endforeach
    </ul>
@endsection
