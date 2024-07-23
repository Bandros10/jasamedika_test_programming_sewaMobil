@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">History Mobil Keluar</h3>
            </div>
            <div class="panel-body">
                <table class="table table-condensed" id="datatablehistorikeluar">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Peminjam</th>
                            <th>Mobil</th>
                            <th>Plat Nomor</th>
                            <th>tanggal Keluar</th>
                        </tr>
                    </thead>
                    @php
                        $i=1;
                    @endphp
                    <tbody>
                        @foreach ($data_keluar as $keluar)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $keluar->name }}</td>
                                <td>{{ $keluar->mobil }}</td>
                                <td>{{ $keluar->  plat }}</td>
                                <td>{{ \Carbon\Carbon::parse($keluar->tanggal_keluar)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">History Mobil Masuk</h3>
            </div>
            <div class="panel-body">
                <table class="table table-condensed" id="datatablehistorimasuk">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Peminjam</th>
                            <th>Mobil</th>
                            <th>Plat Nomor</th>
                            <th>tanggal Keluar</th>
                        </tr>
                    </thead>
                    @php
                        $i=1;
                    @endphp
                    <tbody>
                        @foreach ($data_kembali as $kembali)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kembali->name }}</td>
                                <td>{{ $kembali->mobil }}</td>
                                <td>{{ $kembali->plat }}</td>
                                <td>{{ \Carbon\Carbon::parse($kembali->tanggal_keluar)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#datatablehistorikeluar').DataTable();
            $('#datatablehistorimasuk').DataTable();
        });
    </script>
@endpush
