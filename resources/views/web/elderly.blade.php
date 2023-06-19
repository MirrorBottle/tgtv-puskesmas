@include('web.layout.header')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-12 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Hasil Pemeriksaan Lansia</h1>
        </div>
    </div>
</div>

@if ($elderly)
<div class="container-fluid bg-white p-3 mt-4">
  <div class="card mb-4">
    <div class="card-header">
      Data Lansia
    </div>
    <div class="card-body">
      <table class="table table-th-block">
        <tbody>
            <tr><td class="active"><b>Nama:</b></td><td>{{ $elderly->name }}</td></tr>
            <tr><td class="active"><b>NIK:</b></td><td>{{ $elderly->nik }}</td></tr>
            <tr><td class="active"><b>Jenis Kelamin:</b></td><td>{{ $elderly->gender }}</td></tr>
            <tr><td class="active"><b>Umur:</b></td><td>{{ $elderly->age }} Tahun</td></tr>
            
        </tbody>
      </table>
    </div>
  </div>
  @foreach ($data as $record)
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$loop->iteration}}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$loop->iteration}}">
            Data Pemeriksaan {{ $record->recorded_at->translatedFormat('F Y') }}
          </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$loop->iteration}}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading{{$loop->iteration}}">
          <div class="accordion-body bg-white">
            <table class="table table-th-block">
              <tbody>
                  <tr><td class="active">Berat Badan:</td><td>{{ $record->weight }}kg <b>({{ $record->weight_category_format }})</b></td></tr>
                  <tr><td class="active">IMT:</td><td>{{ $record->imt_res }} <b>({{ $record->imt_format }})</b></td></tr>
                  <tr><td class="active">Tekanan Darah:</td><td>{{ $record->blood_pressure_res }} <b>({{ $record->blood_pressure_format }})</b></td></tr>
                  <tr><td class="active">Gula Darah:</td><td>{{ $record->blood_sugar_res }} <b>({{ $record->blood_sugar_format }})</b></td></tr>
                  <tr><td class="active">Colesterol:</td><td>{{ $record->colestrol_res }} <b>({{ $record->colestrol_format }})</b></td></tr>
                  <tr><td class="active">A (Barthel Indeks):</td><td>{{ $record->barthel_indeks_res }} <b>({{ $record->barthel_indeks_format }})</b></td></tr>
                  <tr><td class="active">B (Romberg):</td><td><b>{{ $record->romberg_format }}</b></td></tr>
                  <tr><td class="active">C (MMSE):</td><td>{{ $record->mmse_res }} <b>({{ $record->mmse_format }})</b></td></tr>
                  <tr><td class="active">D (Faktor Resiko):</td><td>{{ $record->risk_factor_res }} <b>({{ $record->risk_factor_format }})</b></td></tr>
                  <tr><td class="active">E (GDRS):</td><td>{{ $record->depression_res }} <b>({{ $record->depression_format }})</b></td></tr>
                  <tr><td class="active">Penanganan:</td><td><b>{{ $record->treatment }}</b></td></tr>
                  <tr><td class="active">Rencana tindakan:</td><td><b>{{ $record->follow_up }}</b></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@else
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
  <div class="container text-center">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
              <h1 class="mb-4">Data Lansia Tidak Ada</h1>
              <p class="mb-4">Pastikan NIK yang anda masukkan sudah pernah melakukan pemeriksaan lansia sebelumnya</p>
          </div>
      </div>
  </div>
</div>
@endif





<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-12">
                <h3 class="text-white">Cari Kembali</h3>
            </div>
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input id="search-nik" type="text" class="form-control border-0 py-3" placeholder="NIK" required>
                    </div>
                    <div class="col-md-4">
                        <select id="search-month" class="form-select border-0 py-3">
                            @php
                                $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp
                            <option selected value="all">Semua</option>
                            @foreach ($months as $month)
                                <option value="{{ $loop->iteration }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="search-year" class="form-select border-0 py-3">
                            @php
                                $years = range(date('Y'), 2023)
                            @endphp
                            <option selected value="all">Semua</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button id="search-btn" class="btn btn-dark border-0 w-100 py-3">Cari</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

@push('addition-scripts')
    <script>
        $(function() {
            $("#search-btn").click(function() {
                if($("#search-nik").val() != "") {
                    const nik = $("#search-nik").val();
                    const month = $("#search-month").val();
                    const year = $("#search-year").val();
                    window.location.href = `/pemeriksaan-lansia?nik=${nik}&month=${month}&year=${year}`;
                }
            })
        })
    </script>
@endpush
@include('web.layout.footer')
