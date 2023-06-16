{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Detail {{ $module_singular }}</h4>
                        <div>
                            <a href="{{ route("$module_name.death", $module_data->id) }}"
                                class="btn btn-danger text-white btn-sm">
                                <i class="fas fa-flag"></i>
                                Diagnosa Kematian
                            </a>
                            <a href="{{ route("$module_name.index") }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>{{ $module_data->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>{{ $module_data->nik }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Usia, Tgl. Lahir</th>
                                    <td>{{ $module_data->age }} Thn,
                                        {{ $module_data->birth_date->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>{{ $module_data->gender }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Edukasi Terakhir</th>
                                    <td>{{ $module_data->last_education }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td colspan="2">{{ $module_data->address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No. HP</th>
                                    <td>{{ $module_data->phone_number }}</td>
                                </tr>
                                @if ($module_data->is_deceased)
                                    <tr>
                                        <th scope="row">Tgl. Kematian</th>
                                        <td colspan="2">{{ $module_data->deceased_at->translatedFormat('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Diagnosa Kematian</th>
                                        <td>{{ $module_data->cause_of_death }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
