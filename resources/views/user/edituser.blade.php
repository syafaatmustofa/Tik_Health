@extends('layouts.app')
@section('content')
<form action="{{ route('datauser.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" readonly name="name" value="{{$data->name}}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{$data->email}}">
    </div>
    <div class="form-group">
        <label>Role</label>
        <input type="text" class="form-control" name="role" value="{{$data->role}}">
    </div>
    <div class="row justify-content-between">
        <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
        <a href="/datauser" class="btn btn-danger btn-sm mt-3">kembali</a>
    </div>
</form>
@endsection