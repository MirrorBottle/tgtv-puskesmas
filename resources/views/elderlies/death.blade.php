{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">{{$page_title}}</h4>
            </div>
            <div class="card-body">
              {{ html()->modelForm($module_data, 'PATCH', route("$module_name.update", $module_data))->class('form')->attributes(["enctype" => "multipart/form-data"])->open() }}
              <input type="hidden" name="is_deceased" value="1">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <?php
                    $field_name = 'deceased_at';
                    $field_label = 'Tgl. Kematian';
                    $field_placeholder = $field_label;
                    $required = "required";
                    ?>
                    {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                    {{ html()->date($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <?php
                    $field_name = 'cause_of_death';
                    $field_label = 'Penyebab Kematian';
                    $field_placeholder = $field_label;
                    $required = "required";
                    ?>
                    {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
                    {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
                  </div>
                </div>
                
                <div class="col-12 mt-2">
                  <button type="button" class="btn btn-dark" onclick="history.back(-1)"><i class="fa fa-reply"></i> Kembali</button>
                  <x-buttons.create title="Simpan" />
                </div>
              </div>
              {{ html()->form()->close() }}
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
