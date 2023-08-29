@extends('Backend.Layout.backend')
@section('content')
<div class="container ms-3 mt-3">
  <form action="{{route('userPage.update',$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group mb-3 ">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$data->name}}">
        @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="form-group mb-3 ">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" value="{{$data->email}}">
        @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    <div class="form-group mb-3 ">
        <label for="">Phone</label>
        <input type="number" name="phone" class="form-control" value="{{$data->phone}}">
        @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
    </div>
    
    <div class="">
        <a href="{{route('userPage.index')}}" class="btn btn-sm btn-secondary" id="cancle">Cancle</a>
        <input type="submit" class="btn btn-sm btn-success" value="Update User">
    </div>
</form>
</div>
@endsection