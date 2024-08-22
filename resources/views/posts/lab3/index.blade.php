@extends('layouts.app')

@section('title')
All posts
@endsection

@section('main')
<a href="{{route('create')}}" class="btn btn-success mt-5">Create Post</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['postedby']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <img src="{{ asset('posts/'.$post['image']) }}" width="100" height="100">
                </td>
                <td>
                    <a href="{{route('show', $post['id'])}}" class="btn btn-info">Show</a>
                    <a href="{{route('edit', $post['id'])}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('destroy', $post['id'])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $posts->links() }}
@endsection