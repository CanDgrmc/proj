@extends("layouts.app")

@section('content')
    <div class="container">
        <h2>hello</h2>

    <form action="{{route("main.uploadFile")}}" method="post" enctype="multipart/form-data">
        @csrf()
        @foreach ($errors->all() as $error)
            <p  class="text-danger">{{ $error }}</p>
        @endforeach
        <div class="form-group">
            <label for="list">Upload List</label>
            <input type="file" class="form-control" accept=".txt" name="list">
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Submit</button>

    </form>
    </div>
@endsection