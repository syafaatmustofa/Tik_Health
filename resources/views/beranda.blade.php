@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">{{ $item->isi }}</p>
                <p class="card-text">{{ $item->tanggalArtikel }}</p>
                <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-primary">Detail</a>
            </div>
        </div>


        @endforeach
    </div>
</div>

@endsection
