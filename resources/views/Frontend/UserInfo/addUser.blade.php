@extends('Backend.Layout.backend')
@section('content')
<div>
    @if(Session::has('fails'))
    <p class="alert alert-danger">{{ Session::get('fails') }}</p>
    @endif
</div>
<div class="container ms-3 mt-3">
  <form action="{{route('userPage.store')}}" method="POST">
    @csrf
    <div class="form-group mb-3 ">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control">
        @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="form-group mb-3 ">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control">
        @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="form-group mb-3 ">
        <label for="">Phone</label>
        <input type="number" name="phone" class="form-control">
        @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="form-group mb-3 ">
        <label for="">Password</label>
        <input type="text" name="password" class="form-control">
        @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="">
        <a href="{{route('userPage.index')}}" class="btn btn-secondary "  id="cancel">Cancel</a>
        <input type="submit" class="btn btn-sm btn-success" value="Add User">
    </div>
</form>
</div>
@endsection
