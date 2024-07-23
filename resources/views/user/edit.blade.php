@extends('layouts.master')
@section('content')

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Data User</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" name="name" required value="{{ $user->name }}" placeholder="masukan nama">
                </div>
                <br>
                <div class="col-6">
                    <input type="email" class="form-control" name="email" required value="{{ $user->email }}" placeholder="masukan email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" name="telepon" required value="{{ $user->client->telepon }}" placeholder="masukan Nomor Telepon">
                </div>
                <br>
                <div class="col-6">
                    <input type="text" class="form-control" name="no_SIM" required value="{{ $user->client->no_SIM }}" placeholder="masukan nomer SIM">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="alamat" class="form-control" required placeholder="masukan alamat">{{ $user->client->alamat }}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Udate</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
