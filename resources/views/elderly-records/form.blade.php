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
                        <th scope="row">Nama</th>
                        <td>{{ $elderly->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NIK</th>
                        <td>{{ $elderly->nik }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Usia, Tgl. Lahir</th>
                        <td>{{ $elderly->age }} Thn,
                            {{ $elderly->birth_date->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td>{{ $elderly->gender }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Edukasi Terakhir</th>
                        <td>{{ $elderly->last_education }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td colspan="2">{{ $elderly->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No. HP</th>
                        <td>{{ $elderly->phone_number }}</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="col-12">
  <input name="elderly_id" type="hidden" value="{{$elderly->id}}">

  <div class="row">
    <div class="col-12">
      <div class="form-group">
          <div class="custom-control custom-switch">
              <input name="is_new" type="checkbox" {{isset($module_data) ? ($module_data->is_new == 1 ? 'checked' : '') : '' }} class="custom-control-input" id="customSwitch1">
              <label class="custom-control-label" for="customSwitch1">Kunjungan Baru</label>
          </div>
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <?php
        $field_name = 'recorded_at';
        $field_label = 'Tanggal';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        {{ html()->date($field_name)->value(isset($module_data) ? ($module_data->recorded_at ? $module_data->recorded_at : date('Y-m-d')): date('Y-m-d'))->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
      </div>
    </div>
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
                  $idx = ['A', 'B', 'C'][$loop->iteration - 1];
              @endphp
              <option {{isset($module_data) && $module_data->age_group === $idx ? 'selected' : ''}} value="{{$idx}}">{{$group}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-12 mb-4 pb-4">
      <div class="form-group">
        <?php
        $field_name = 'independence_group';
        $field_label = 'Kemandirian';
        $field_placeholder = $field_label;
        $required = "required";
        ?>
        {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
        <div class="d-flex justify-content-center align-items-center">
          <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
            @foreach (['A (Mandiri)', 'B (Dibantu)', 'C (Tidak bisa mandiri sama sekali)'] as $group)
              @php
                  $idx = ['A', 'B', 'C'][$loop->iteration - 1];
              @endphp
              <option {{isset($module_data) && $module_data->age_group === $idx ? 'selected' : ''}} value="{{$idx}}">{{$group}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    {{-- * YES OR NO SELECT  --}}

    @php
        $inputs = [
          ['is_mental_emotional', 'Mental Emosional'],
          ['is_anemia', 'Anemia'],
          ['has_diabetes', 'Diabetes Melitus'],
          ['has_kidney_disorder', 'Gangguan Ginjal'],
        ];
    @endphp

    <div class="col-12 pb-4 mb-4">
      <div class="row">
        @foreach ($inputs as $input)
          <div class="col-6">
            <?php
            $field_name = $input[0];
            $field_label = $input[1];
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            <div class="form-group">
              <div class="d-flex justify-content-center align-items-center">
                <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
                  <option {{isset($module_data) && $module_data->{$field_name} == 0 ? 'selected' : ''}} value="{{0}}">Tidak</option>
                  <option {{isset($module_data) && $module_data->{$field_name} == 1 ? 'selected' : ''}} value="{{1}}">Ya</option>
                </select>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- * INPUT TEXT AND SELECT  --}}
    @php
        $inputs = [
          ['Berat Badan', 'weight',  'weight_category', ['BB Kurang', 'BB Lebih']],
          ['IMT', 'imt_res', 'imt_group', ['Normal', 'Kurang', 'Lebih']],
          ['Tekanan Darah', 'blood_pressure_res', 'blood_pressure_group', ['Normal', 'Rendah', 'Tinggi']],
          ['Gula Darah', 'blood_sugar_res', 'blood_sugar_group', ['Normal', 'DM']],
          ['Kolesterol', 'colestrol_res', 'colestrol_group', ['Normal', 'Hiperlipiden']],
          ['A (Barthel Indek)', 'barthel_indeks_res', 'barthel_indeks_group', ['Mandiri', 'Ringan', 'Sedang', 'Berat', 'Total']],
          ['B (Romberg)', null, 'romberg_res', ['Positif', 'Negatif']],
          ['C (MMSE)', 'mmse_res', 'mmse_group', ['Tidak ada', 'Ringan', 'Berat']],
          ['D (Faktor Resiko)', 'risk_factor_res', 'risk_factor_group', ['Ada', 'Tidak Ada']],
          ['E (GDRS)', null, 'depression_group', ['Normal', 'Ringan', 'Sedang', 'Berat']],
        ]
    @endphp
    @foreach ($inputs as $input)
      <div class="col-12">
        <div class="row">
          <?php
            $field_label = $input[0];
            $field_name = $input[1];
            $field_placeholder = $field_label;
            $required = "required";
          ?>
          <div class="col-12">
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
          </div>
          @if ($input[1] != null)
            <div class="col-6">
              <div class="form-group">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
              </div>
            </div>
          @endif
          @if ($input[2] != null)
            <div class="col-6">
              <?php
                $field_name = $input[2];
                $required = "required";
              ?>
              <div class="form-group">
                <div class="d-flex justify-content-center align-items-center">
                  <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
                    @foreach ($input[3] as $group)
                      <option {{isset($module_data) && $module_data->{$field_name} === $loop->iteration ? 'selected' : ''}} value="{{$loop->iteration}}">{{$group}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    @endforeach

    <div class="col-12 mt-4 pt-4">
      <?php
        $field_name = 'other_disease';
        $field_label = 'Penyakit Lain';
        $field_placeholder = $field_label;
        $required = "";
      ?>
      {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
      {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
    </div>
    <div class="col-12">
      <?php
        $field_name = 'screening';
        $field_label = 'Hasil Screening Lansia';
        $field_placeholder = $field_label;
        $required = "required";
      ?>
      {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
      <div class="form-group">
        <div class="d-flex justify-content-center align-items-center">
          <select name="{{$field_name}}" class="form-control multi-select mr-2" value="{{ old($field_name) }}" placeholder="{{$field_placeholder}}">
            <option {{isset($module_data) && $module_data->screening == 1 ? 'selected' : ''}} value="{{1}}">Obati</option>
            <option {{isset($module_data) && $module_data->screening == 2 ? 'selected' : ''}} value="{{2}}">Rujuk</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-12">
      <?php
        $field_name = 'treatment';
        $field_label = 'Penangangan';
        $field_placeholder = $field_label;
        $required = "";
      ?>
      {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
      {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
    </div>
    <div class="col-12">
      <?php
        $field_name = 'follow_up';
        $field_label = 'Rencana Tindakan';
        $field_placeholder = $field_label;
        $required = "";
      ?>
      {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
      {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
    </div>
    <div class="col-12">
      <?php
        $field_name = 'note';
        $field_label = 'Keterangan';
        $field_placeholder = $field_label;
        $required = "";
      ?>
      {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
      {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->addClass($errors->has($field_name) ? 'is-invalid' : '') }}
    </div>
    <div class="col-12">
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