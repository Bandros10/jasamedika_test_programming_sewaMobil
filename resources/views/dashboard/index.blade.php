@extends('layouts.master')

@section('content')
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
{{-- <div class="container">
    <div class="row">
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Mobil Tersedia</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek Mobil</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($T as $t)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $t->merek }}</td>
                                <td>{{ $t->nama_mobil }}</td>
                                <td>
                                    @if ($t->status != true)
                                        <span>mobil tidak tersedia</span>
                                    @else
                                        <span>mobil tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Mobil tidak Tersedia</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Merek Mobil</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($AV as $av)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $av->merek }}</td>
                                <td>{{ $av->nama_mobil }}</td>
                                <td>
                                    @if ($av->status != true)
                                        <span>mobil tidak tersedia</span>
                                    @else
                                        <span>mobil tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Mobil</h3>
            <p class="panel-subtitle">Period: {{ \Carbon\Carbon::parse(today())->format('d M Y') }}</p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-car"></i></span>
                        <p>
                            <span class="number">{{ count($Tersedia) }}</span>
                            <span class="title">Mobil tersedia</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-car"></i></span>
                        <p>
                            <span class="number">{{ count($mobil_keluar) }}</span>
                            <span class="title">Mobil Keluar</span>
                        </p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-9">
                    <div id="headline-chart" class="ct-chart"></div>
                </div>
                <div class="col-md-3">
                    <div class="weekly-summary text-right">
                        <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                        <span class="info-label">Total Sales</span>
                    </div>
                    <div class="weekly-summary text-right">
                        <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                        <span class="info-label">Monthly Income</span>
                    </div>
                    <div class="weekly-summary text-right">
                        <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                        <span class="info-label">Total Income</span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END OVERVIEW -->
@endsection
