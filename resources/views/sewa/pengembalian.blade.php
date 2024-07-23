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
        <form action="{{ route('sewa.pengembalian_store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="">Nama peminjam</label>
                    <input type="text" class="form-control" name="name" readonly value="{{ $booking->name }}"
                        placeholder="masukan nama">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="">Alamat Peminjam</label>
                    <input type="text" class="form-control" name="alamat" readonly value="{{ $booking->alamat }}"
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
                    <input type="text" class="form-control" name="telepon" readonly value="{{ $booking->telepon }}"
                        placeholder="masukan Nomor Telepon">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="col-md-3">
                        <label for="">tanggal keluar</label>
                        <input type="text" id="t_out" name="tanggal_keluar" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">tanggal kembali</label>
                        <input type="text" id="t_in" name="tanggal_masuk" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <span>lama hari penyewaan: </span><span id="hari" style="font-weight: bold;"> </span>
                        <br>
                        <span>Biaya per hari: </span><span id="tarifawal" style="font-weight: bold;"></span>
                    </div>
                    <div class="col-md-3">
                        <label for="">Tarif Harus di bayarkan</label>
                        <input type="text" class="form-control" id="tarif" name="tarif" readonly>
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
                        const range_hari = Math.abs(t_in.getDate() - t_out.getDate());
                        const tarif_awal = response.tarif;

                        if (t_in.getDate() == t_out.getDate() && t_in.getMonth() != t_out.getMonth()) {
                            document.getElementById("hari").innerHTML = 30 + " Hari";
                            var tarif_total = parseInt(Math.abs(30)) * response.tarif;
                            document.getElementById("tarif").value = Rupiah.format(tarif_total);
                        }
                        else if (t_in.getDate() == t_out.getDate() && t_in.getMonth() == t_out.getMonth()) {
                            document.getElementById("hari").innerHTML = 1 + " Hari";
                            var tarif_total = parseInt(Math.abs(1)) * response.tarif;
                            document.getElementById("tarif").value = Rupiah.format(tarif_total);
                        }
                        else{
                            document.getElementById("hari").innerHTML = range_hari + " Hari";
                            var tarif_total = parseInt(Math.abs(t_out.getDate() - t_in.getDate())) * response.tarif;
                            document.getElementById("tarif").value = Rupiah.format(tarif_total);
                        }
                        document.getElementById("tarifawal").innerHTML = Rupiah.format(tarif_awal);

                        document.getElementById("t_out").value = response.tanggal_keluar;
                        document.getElementById("t_in").value = response.tanggal_masuk;
                        // document.getElementById("t_out").value = t_out.getDate() + '/' + t_out.getMonth() + '/' +  t_out.getFullYear();
                        // document.getElementById("t_in").value = t_in.getDate() + '/' + t_in.getMonth() + '/' +  t_in.getFullYear();
                    }
                });
        })
    });
</script>
@endpush
