@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">foto</label>
                    <img src="{{ asset('storage/'.$artikel->foto) }}" alt="" width="100px">
                    <input class="form-control" type="file" name="foto">
                </div>
                <div class="mb-3">
                    <textarea name="isi" id="formid" cols="30" rows="10">{{ $artikel->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">penulis</label>
                    <input type="text" class="form-control" name="penulis" value="{{ $artikel->penulis }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Artikel</label>
                    <input type="text" class="form-control" name="tanggalArtikel" value="{{ $artikel->tanggalArtikel }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>select menu</option>
                        @foreach ($kategori as $kt)
                        <option value="{{ $kt->id }}" @selected($artikel->kategori_id==$kt->id)>{{ $kt->nama }}</option>
                        @endforeach
                    </select>                
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/artikel" class="btn btn-danger">back</a>
            </form>

        </div>
    </div>
</div>
@endsection