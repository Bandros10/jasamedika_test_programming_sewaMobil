@extends('layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Form Pengembalian</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('sewa.pengembalian',auth()->user()->client->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="">Nama peminjam</label>
                    <input type="text" class="form-control" name="name" readonly value="{{ $databook_masuk->name }}"
                        placeholder="masukan nama">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="">Alamat Peminjam</label>
                    <input type="text" class="form-control" name="alamat" readonly value="{{ $databook_masuk->alamat }}"
                        placeholder="masukan email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="">List Mobil Yang di Pinjam</label>
                    <select name="mobil_masuk" id="mobil_masuk" class="form-control"></select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <label for="">Nomor Telepon Peminjam</label>
                    <input type="text" class="form-control" name="telepon" readonly value="{{ $databook_masuk->telepon }}"
                        placeholder="masukan Nomor Telepon">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-4">
                        <label for="">tanggal keluar</label>
                        <input type="text" id="t_out" name="tanggal_masuk" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="">tanggal kembali</label>
                        <input type="text" id="t_in" name="tanggal_keluar" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tarif</label>
                        <input type="text" class="form-control" id="tarif" name="tarif_bayar" readonly>
                    </div>
                </div>
            </div>
            <br>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Pengembalian Mobil</button>
        </form>
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
        $('#mobil_masuk').select2({
            theme: "classic",
            placeholder: '- list pengembalian mobil -',
            ajax: {
                url: '{{route('select2.mobil_masuk')}}',
                dataType: 'json',
                delay: 250,

                processResults: function (data) {
                    return {
                        results: $.map(data, function (mobil) {
                            return {
                                id: mobil.mobil +'-'+ mobil.nomor_plat,
                                text: mobil.mobil + ' ' + mobil.nomor_plat
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#mobil_masuk').on('change', function() {
            var data = $("#mobil_masuk option:selected").text();
            const plat = data.split(" ");
            var url = "{{route('select2.tarifmob', ':plat')}}";
            $.ajax({
                  url: url.replace(':plat',plat[1]),
                  type: "Get",
                  dataType: 'json',
                   success: function(response){
                        const t_out = new Date(response.tanggal_keluar);
                        const t_in = new Date(response.tanggal_masuk);
                        let Rupiah = new Intl.NumberFormat('id-ID',{
                            style: 'currency',
                            currency: 'IDR',
                        });
                        const tarif_total = (t_in.getDate() - t_out.getDate()) * response.tarif;
                        document.getElementById("tarif").value = Rupiah.format(tarif_total);
                        document.getElementById("t_out").value = t_out.getDate() + '/' + t_out.getMonth() + '/' +  t_out.getFullYear();
                        document.getElementById("t_in").value = t_in.getDate() + '/' + t_in.getMonth() + '/' +  t_in.getFullYear();
                    }
                });
        })
    });
</script>
@endpush
