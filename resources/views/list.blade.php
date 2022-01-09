@extends("layouts.app")

@section('content')
    <div class="container">
        Callable : {{count($list)}} / {{$rowCount}}
        <ul class="list-group list-group-flush">

        @foreach ($list as $item)
        <li class="list-group-item">{{$item["affiliate_id"]}} - {{$item["name"]}}</li>
        @endforeach

        </ul>
    </div>
@endsection