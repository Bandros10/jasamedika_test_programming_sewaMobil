@extends('layouts.master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit data User</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('mobil.update',$mobil->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Model Mobil</label>
                    <select name="model" class="form-control">
                        <option disabled selected>pilih model mobil</option>
                        <option value="sedan" @if ($mobil->model == "sedan") selected @endif>Sedan</option>
                        <option value="SUV" @if ($mobil->model == "SUV") selected @endif>SUV</option>
                        <option value="MPV" @if ($mobil->model == "MPV") selected @endif>MPV</option>
                        <option value="LCGC" @if ($mobil->model == "LCGC") selected @endif>LCGC</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Merek Mobil</label>
                    <input type="text" class="form-control" name="merek" required value="{{ $mobil->merek }}"
                        placeholder="masukan merek mobil">
                </div>
                <div class="col-4">
                    <label class="form-label">Nama Mobil</label>
                    <input type="text" class="form-control" name="nama_mobil" required
                        value="{{ $mobil->nama_mobil }}" placeholder="masukan nama mobil">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Nomor Plat</label>
                    <input type="text" class="form-control" name="Nomor_plat" value="{{ $mobil->Nomor_plat }}"
                        required placeholder="masukan Nomor Plat">
                </div>
                <div class="col-6">
                    <label class="form-label">Tarif/hari</label>
                    <input type="number" class="form-control" name="tarif" value="{{ $mobil->tarif }}" required
                        placeholder="masukan Tarif/hari">
                </div>
            </div>
            <br>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection
