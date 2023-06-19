<div class="col-12">
  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'nik';
        $field_label = 'NIK';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'name';
        $field_label = 'Nama';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'phone_number';
        $field_label = 'No. HP';
        $field_placeholder = $field_label;
        $required = "";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'last_education';
        $field_label = 'Edukasi Terakhir';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        <div class="d-flex justify-content-center align-items-center">
          <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
            @foreach (['Tidak Tamat SD', 'SD', 'SLTP', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'Lainnya'] as $edu)
              <option {{isset($module_data) && $module_data->last_education === $edu ? 'selected' : ''}} value="{{$edu}}">{{$edu}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'birth_date';
        $field_label = 'Tgl. Lahir';
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
        $field_name = 'gender';
        $field_label = 'Jenis Kelamin';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        <div class="form-group">
          <div class="d-flex justify-content-center align-items-center">
            <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
              <option {{isset($module_data) && $module_data->gender == "L" ? 'selected' : ''}} value="L">Laki-laki (L)</option>
              <option {{isset($module_data) && $module_data->gender == "P" ? 'selected' : ''}} value="P">Perempuan (P)</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'address';
        $field_label = 'Alamat';
        $field_placeholder = $field_label;
        $required = "";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
      </div>
    </div>
  </div>
</div>

@push('addition-styles')
<!-- File Manager -->
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush

@push ('addition-scripts')
<script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('button-image').addEventListener('click', (event) => {
          event.preventDefault();
          window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
      });
  });

  // set file link
  function fmSetLink($url) {
      document.getElementById('image').value = $url;
  }
</script>
@endpush