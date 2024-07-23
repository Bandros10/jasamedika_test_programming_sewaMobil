@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-info">Boking mobil</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
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
        <div class="col-6">
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
</div>
@endsection
