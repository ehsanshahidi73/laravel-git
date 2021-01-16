@extends('layouts.app')
@section('content')
    @if($errors->any())
        <ul>
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
        </ul>
    @endif
    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="عنوان مطلب.."><br>
        <textarea type="text" name="description"  placeholder="توضیحات مطلب.."></textarea><br>
        <input type="file" name="photo">
        <button type="submit" name="submit">ذخیره</button>
    </form>
@endsection
