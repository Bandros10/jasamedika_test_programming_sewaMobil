@extends('layouts.master')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Data User</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('mobil.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Model Mobil</label>
                    <select name="model" class="form-control">
                        <option disabled selected>pilih model mobil</option>
                        <option value="sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="MPV">MPV</option>
                        <option value="LCGC">LCGC</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Merek Mobil</label>
                    <input type="text" class="form-control" name="merek" required value="{{ old('merek') }}" placeholder="masukan merek mobil">
                </div>
                <div class="col-4">
                    <label class="form-label">Nama Mobil</label>
                    <input type="text" class="form-control" name="nama_mobil" required value="{{ old('nama_mobil') }}" placeholder="masukan nama mobil">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Nomor Plat</label>
                    <input type="text" class="form-control" name="Nomor_plat" value="{{ old('Nomor_plat') }}" required placeholder="masukan Nomor Plat">
                </div>
                <div class="col-6">
                    <label class="form-label">Tarif/hari</label>
                    <input type="number" class="form-control" name="tarif" value="{{ old('tarif') }}" required placeholder="masukan Tarif/hari">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Foto Mobil</label>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <br>
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
    </div>
</div>
@endsection
