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
            <a href="{{ route('user.tambah') }}" class="btn btn-sm btn-primary">Tambah Data User</a>
        </div>
        <div class="col">
            <table class="table" id="datatable_user">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomer Telepon</th>
                    <th scope="col">Nomer SIM</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($user as $data)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>{{ $data->no_SIM }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <a href="{{ Route('user.edit',$data->id) }}" class="btn btn-warning btn-sm">EDIT</a>
                                <a href="{{ Route('user.delete',$data->id) }}" class="btn btn-danger btn-sm">DELETE</a>
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
            $('#datatable_user').DataTable();
        });
    </script>
@endpush
