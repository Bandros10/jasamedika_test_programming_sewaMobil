@extends('layouts.master')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <a href="{{ route('boking.masuk',auth()->user()->client->id) }}" class="btn btn-warning">Pengembalian</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
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
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($collection as $item)

                @endforeach
                {{-- @foreach ($databook_keluar as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->telepon }}</td>
                    <td>{{ $data->mobil }}</td>
                    <td>{{ $data->Nomor_plat }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_keluar)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_masuk)->format('d M Y') }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
