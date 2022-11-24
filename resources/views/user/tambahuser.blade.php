@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('datauser.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">nama</label>
                    <input type="text" class="form-control" name="name" required placeholder="masukkan nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" required placeholder="masukkan email">
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="password" class="form-control" name="password" required placeholder="masukkan password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/datauser" class="btn btn-danger">back</a>
            </form>

        </div>
    </div>
</div>
@endsection