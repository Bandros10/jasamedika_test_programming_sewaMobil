@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Form boking</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('sewa.keluar',$client->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" name="name" readonly value="{{ $client->name }}" required placeholder="masukan Nomor Plat">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Alamat Peminjam</label>
                    <input type="text" class="form-control" name="alamat" readonly value="{{ $client->client->alamat }}" required placeholder="masukan Tarif/hari">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nomor telepon Peminjam</label>
                    <input type="text" class="form-control" name="telepon" readonly value="{{ $client->client->telepon }}" required placeholder="masukan Tarif/hari">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Mobil tersedia</label>
                    <select name="mobil" id="mobil" class="form-control"></select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Penyewaan</label><br>
                    <input type="text" id="tanggalpenyewaan"/>
                </div>
            </div>
            <br>
            <input type="text" id="tanggal_keluar" name="tanggal_keluar" class="hidden">
            <input type="text" id="tanggal_masuk" name="tanggal_masuk" class="hidden">
            <input type="text" id="nomor_plat" name="nomor_plat" class="hidden">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function (){
        $('input[id="tanggalpenyewaan"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            var mulai = start.format('YYYY-MM-DD');
            var akhir = end.format('YYYY-MM-DD');
            // console.log(mulai);
            document.getElementById("tanggal_keluar").value = mulai;
            document.getElementById("tanggal_masuk").value = akhir;
        });

        $('#mobil').select2({
            theme: "classic",
            placeholder: '- pilihan mobil tersedia -',
            ajax: {
                url: '{{route('select2.mobil')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (mobil) {
                            return {
                                id: mobil.nama_mobil +'-'+ mobil.Nomor_plat,
                                text: mobil.merek + ' - ' + mobil.nama_mobil + ' (' + mobil.Nomor_plat + ')'
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>
@endpush
