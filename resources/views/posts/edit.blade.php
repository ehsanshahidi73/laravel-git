@extends('layouts.app')
@section('content')
    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="patch">
        <input type="text" name="title" value="{{$post->title}}" placeholder="عنوان مطلب.."><br>
        <textarea type="text" name="description" placeholder="توضیحات مطلب..">{{$post->description}}</textarea><br>
        <button type="submit" name="submit">بروزرسانی</button>
    </form>
    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit" name="submit">حذف</button>
    </form>
@endsection
