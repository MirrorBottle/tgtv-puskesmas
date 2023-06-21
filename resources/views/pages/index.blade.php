{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Halaman</h4>
                        <a href="{{ route("$module_name.create", request()->type) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i>
                            Tambah Halaman
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addition-scripts')
    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                responsive: true,
                ajax: '{{ route("$module_name.index_data", request()->type) }}',
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'banner',
                        name: 'banner',
                        render: function(data, type, row, meta) {
                            return `<img src="${row.banner}" alt="${row.title}" class="img-fluid" style="max-height: 200px">`
                        }
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        })
    </script>
@endpush
