@extends("layouts.app")

@section("title")
Edit post
@endsection

@section("main")
<form action="" method="post">
    @csrf
    <div class="mb-3">
        <label for="TextInput" class="form-label"> Title</label>
        <input type="text" id="TextInput" class="form-control" value="{{$post['title']}}" name="title">
    </div>
    <div class="mb-3">
        <label for="floatingTextarea2">Description </label>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                style="height: 100px" name="description">value="{{$post['body']}}"</textarea>
        </div>
    </div>
    <div class="mb-3">
        <label for="Select" class="form-label"> Post Creator</label>
        <select id="Select" class="form-select" name="creator">
            <option selected> {{$post['postedby']}}</option>
        </select>
    </div>
    <input type="hidden" value="{{$post['id']}}" name="id">
    <input type="submit" class="btn btn-primary" value="Edit">
</form>
@endsection