{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $page_title }}</h4>
                    </div>
                    <div class="card-body">
                        {{ html()->form('POST', route("$module_name.export"))->class('form')->open() }}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'nik';
                                    $field_label = 'NIK';
                                    $field_placeholder = $field_label;
                                    $required = '';
                                    ?>
                                    {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                                    {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'month';
                                    $field_label = 'Bulan';
                                    $field_placeholder = $field_label;
                                    $required = 'required';
                                    ?>
                                    {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                                    @php
                                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    @endphp
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
                                                <option selected value="all">Semua</option>
                                                @foreach ($months as $month)
                                                    <option value="{{ $loop->iteration }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'year';
                                    $field_label = 'Tahun';
                                    $field_placeholder = $field_label;
                                    $required = 'required';
                                    ?>
                                    {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                                    @php
                                        $years = range(date('Y'), 2023)
                                    @endphp
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
                                                <option selected value="all">Semua</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="button" class="btn btn-dark" onclick="history.back(-1)"><i
                                        class="fa fa-reply"></i> Kembali</button>
                                <x-buttons.create title="Download" />
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
