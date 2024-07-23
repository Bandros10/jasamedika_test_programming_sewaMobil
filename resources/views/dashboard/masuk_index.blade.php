@extends('layouts.master')

@section('content')
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
<div class="panel">
    <div class="panel-body">
        <table class="table table-striped" id="datatable_masuk">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Mobil di sewa</th>
                    <th>Nomor Plat</th>
                    <th>tanggal keluar</th>
                    <th>tanggal pengembalian</th>
                    <th>tarif</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data_all_masuk as $D_masuk)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $D_masuk->name }}</td>
                        <td>{{ $D_masuk->alamat }}</td>
                        <td>{{ $D_masuk->telepon }}</td>
                        <td>{{ $D_masuk->mobil }}</td>
                        <td>{{ $D_masuk->nomor_plat }}</td>
                        <td>{{ \Carbon\Carbon::parse($D_masuk->tanggal_keluar)->format('d M Y')  }}</td>
                        <td>{{ \Carbon\Carbon::parse($D_masuk->tanggal_masuk)->format('d M Y')  }}</td>
                        <td>{{ $D_masuk->tarif }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#datatable_masuk').DataTable();
        });
    </script>
@endpush
