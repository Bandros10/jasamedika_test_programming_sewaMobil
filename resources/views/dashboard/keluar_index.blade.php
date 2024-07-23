@extends('layouts.master')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <a href="{{ route('sewa.pengembalian',auth()->user()->client->id) }}" class="btn btn-warning">Pengembalian</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped" id="datatabble_keluar">
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
                @forelse ($data_all_keluar as $D_keluar)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $D_keluar->name }}</td>
                    <td>{{ $D_keluar->alamat }}</td>
                    <td>{{ $D_keluar->telepon }}</td>
                    <td>{{ $D_keluar->mobil }}</td>
                    <td>{{ $D_keluar->Nomor_plat }}</td>
                    <td>{{ \Carbon\Carbon::parse($D_keluar->tanggal_keluar)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($D_keluar->tanggal_masuk)->format('d M Y') }}</td>
                </tr>
                @empty
                    <h2>Data keluar belum tersedia</h2>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#datatabble_keluar').DataTable();
        });
    </script>
@endpush
