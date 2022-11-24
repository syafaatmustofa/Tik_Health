@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h1>Data Artikel</h1>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah artikel</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tanggal Artikel</th>
                        <th scope="col">kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$item->foto) }}" alt="" width="100px">
                        </td>
                        <td>{{ $item->isi }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->tanggalArtikel }}</td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td >
                            <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-primary">edit</a>
                            <a href="{{ route('deleteartikel',$item->id) }}" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection