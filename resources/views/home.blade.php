@extends('Components.main')
@section('content')

@auth
<div class="user-text">
    <h1>Hello, {{Auth::user()->name}}</h1>
</div>

@else
<div class="user-text">
    <h1>Please login first</h1>
</div>
@endauth









@endsection
