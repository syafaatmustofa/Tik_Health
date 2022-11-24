@extends('layouts.app')


@section('content')

<div class="container text-center">
<h3>KELOLA KATEGORI</h3>
<table class="table table-hover">
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">tambah</a>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>
                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{route('deletekategori', $item->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
