@extends('layouts.app');

@section('content')
<div class="container text-center">
    <table class="table table-hover text-center">
        <thead>
            <h3> Kelola Data User</h3>
            <a href="{{ route('datauser.create') }}" class="btn btn-primary">tambah</a>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Update</th>
                <th scope="col">role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>{{$item->role}}</td>
                <td colspan="2">
                    <a href="{{ route('datauser.edit',$item->id) }}" class="btn btn-success btn-sm mb-3">Edit</a>
                    <a href="{{ route('deleteuser',$item->id) }}" class="btn btn-danger btn-sm mb-3">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection