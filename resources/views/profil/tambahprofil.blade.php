@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <form action="{{ route('profil.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="number" class="form-control" name="tinggibadan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="number" class="form-control" name="beratbadan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <input type="number" class="form-control" name="tahunLahir">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi</label>
                    <input type="text" class="form-control" name="hobi1">
                    <input type="text" class="form-control" name="hobi2">
                    <input type="text" class="form-control" name="hobi3">
                </div>
                <button type="submit" class="btn btn-primary">Klik</button>
            </form>

            {{-- <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">bmi</th>
                        <th scope="col">umur</th>
                        <th scope="col">status</th>
                        <th scope="col">konsultasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @isset($data)
                        <td>{{ $data['bmi'] }}</td>
                        <td>{{ $data['umur'] }}</td>
                        <td>{{ $data['status']}}</td>
                        <td>{{ $data['konsul']}}</td>
                        @endisset
                    </tr>
                </tbody>
            </table> --}}
        </div>
    </div>
</div>

@endsection
