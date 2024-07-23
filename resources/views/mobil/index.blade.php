@extends('layouts.master')
@section('content')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="d-grid gap-2">
            <a href="{{ route('mobil.tambah') }}" class="btn btn-sm btn-primary">Tambah Data mobil</a>
        </div>
        <div class="col">
            <table class="table" id="datatable_mobil">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Model</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($mobil as $data)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $data->model }}</td>
                            <td>{{ $data->merek }}</td>
                            <td>{{ $data->nama_mobil }}</td>
                            <td>{{ $data->Nomor_plat }}</td>
                            <td>{{ $data->tarif }}</td>
                            <td>
                                @if ($data->status != true)
                                    <span>mobil tidak tersedia</span>
                                @else
                                    <span>mobil tersedia</span>
                                @endif
                                {{-- {{ $data->status}}</td> --}}
                            <td>
                                <a href="{{ Route('mobil.edit',$data->id) }}" class="btn btn-warning btn-sm">EDIT</a>
                                <a href="{{ Route('mobil.delete',$data->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#datatable_mobil').DataTable();
        });
    </script>
@endpush
