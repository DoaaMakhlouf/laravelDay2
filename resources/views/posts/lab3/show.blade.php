@extends('layouts.app')


@section('title')
Show Post
@endsection

@section('main')
<div class="card mt-5">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post['title']}}</h5>
        <p class="card-text">{{$post['body']}}</p>
        <img src="{{ asset('posts/'.$post['image']) }}" width="100" height="100">
    </div>
</div>
@endsection