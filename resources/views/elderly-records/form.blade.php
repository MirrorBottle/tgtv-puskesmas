<div class="col-12">
  <div id="accordion-eleven" class="accordion accordion-rounded-stylish accordion-bordered">
    <div class="accordion__item">
        <div class="accordion__header collapsed accordion__header--info" data-toggle="collapse"
            data-target="#rounded-stylish_collapseTwo">
            <span class="accordion__header--icon"></span>
            <span class="accordion__header--text">Data Lansia</span>
            <span class="accordion__header--indicator"></span>
        </div>
        <div id="rounded-stylish_collapseTwo" class="collapse accordion__body"
            data-parent="#accordion-eleven">
            <div class="accordion__body--text">
              <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                <tbody>
                  <tr>
                    <th scope="row" colspan="2">Nama</th>
                    <th scope="row">NIK</th>
                  </tr>
                  <tr>
                    <td  colspan="2">{{$elderly->name}}</td>
                    <td>{{$elderly->nik}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Usia, Tgl. Lahir</th>
                    <th scope="row">Jenis Kelamin</th>
                    <th scope="row">Edukasi Terakhir</th>
                  </tr>
                  <tr>
                    <td>{{ $elderly->age }} Thn, {{ $elderly->birth_date->translatedFormat('d F Y') }}</td>
                    <td>{{ $elderly->gender }}</td>
                    <td>{{ $elderly->last_education }}</td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="2">Alamat</th>
                    <th scope="row">No. HP</th>
                  </tr>
                  <tr>
                    <td  colspan="2">{{$elderly->address}}</td>
                    <td>{{$elderly->phone_number}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'age_group';
        $field_label = 'Kelompok Umur';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        <div class="d-flex justify-content-center align-items-center">
          <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
            @foreach (['A (40-59)', 'B (60-69)', 'C (>70)'] as $group)
              @php
                  $idx = $loop->iteration + 1;
              @endphp
              <option {{isset($module_data) && $module_data->age_group === $idx ? 'selected' : ''}} value="{{$idx}}">{{$group}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="row">
        <?php
          $field_name = 'weight';
          $field_label = 'Berat Badan';
          $field_placeholder = $field_label;
          $required = "required";
        ?>
        <div class="col-12">
          {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        </div>
        <div class="col-6">
          <div class="form-group">
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <div class="d-flex justify-content-center align-items-center">
              <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
                @foreach (['BB Kurang', 'BB Lebih'] as $group)
                  <option {{isset($module_data) && $module_data->weight_category === $idx ? 'selected' : ''}} value="{{$loop->iteration}}">{{$group}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
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