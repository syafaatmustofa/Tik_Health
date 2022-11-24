@extends('layouts.app')

@section('content')
<div class="container text-center">
<table class="table table-hover">
    <h3>KELOLA PROFIL</h3>
    <a href="{{ route('profil.create') }}" class="btn btn-primary">tambah</a>
    <thead>
        <tr>
            <th scope="col">nama</th>
            <th scope="col">Tinggi Badan</th>
            <th scope="col">Berat Badan</th>
            <th scope="col">BMI</th>
            <th scope="col">Status</th>
            <th scope="col">Hobi</th>
            <th scope="col">Umur</th>
            <th scope="col">Konsultasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $data as $item )
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->tinggibadan }}</td>
            <td>{{ $item->beratbadan}}</td>
            <td>{{ $item->bmi}}</td>
            <td>{{ $item->status}}</td>
            <td>{{ $item->hobi}}</td>
            <td>{{ $item->umur}}</td>
            <td>{{ $item->konsul}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection