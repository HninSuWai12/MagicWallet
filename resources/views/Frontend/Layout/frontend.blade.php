@extends('layouts.app')
@section('content')
<h3>This is User</h3>
<form action="{{route('logout')}}" method="POST">
@csrf
<button type="submit">Logut</button>
</form>
@endsection