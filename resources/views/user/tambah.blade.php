@extends('layouts.master')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Data User</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('user.create') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}"
                        placeholder="masukan nama">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}"
                        placeholder="masukan email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required
                        placeholder="masukan password">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" name="telepon" required value="{{ old('telepon') }}"
                        placeholder="masukan Nomor Telepon">
                </div>
                <br>
                <div class="col-6">
                    <input type="text" class="form-control" name="no_SIM" required value="{{ old('no_SIM') }}"
                        placeholder="masukan nomer SIM">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="alamat" class="form-control" required placeholder="masukan alamat"></textarea>
                </div>
            </div>
            <br>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
        </form>
    </div>
</div>
@endsection
