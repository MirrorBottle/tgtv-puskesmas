{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
              <h4 class="card-title">Detail {{$module_singular}}</h4>
              <div>
                <a href="{{route("$module_name.index")}}" class="btn btn-danger text-white btn-sm">
                  <i class="fas fa-flag"></i>
                  Diagnosa Kematian
                </a>
                <a href="{{route("$module_name.index")}}" class="btn btn-primary btn-sm">
                  <i class="fas fa-arrow-left"></i>
                  Kembali
                </a>
              </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
              <tbody>
                <tr>
                  <th scope="row" colspan="2">Nama</th>
                  <th scope="row">NIK</th>
                </tr>
                <tr>
                  <td  colspan="2">{{$module_data->name}}</td>
                  <td>{{$module_data->nik}}</td>
                </tr>
                <tr>
                  <th scope="row">Usia, Tgl. Lahir</th>
                  <th scope="row">Jenis Kelamin</th>
                  <th scope="row">Edukasi Terakhir</th>
                </tr>
                <tr>
                  <td>{{ $module_data->age }} Thn, {{ $module_data->birth_date->translatedFormat('d F Y') }}</td>
                  <td>{{ $module_data->gender }}</td>
                  <td>{{ $module_data->last_education }}</td>
                </tr>
                <tr>
                  <th scope="row" colspan="2">Alamat</th>
                  <th scope="row">No. HP</th>
                </tr>
                <tr>
                  <td  colspan="2">{{$module_data->address}}</td>
                  <td>{{$module_data->phone_number}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection