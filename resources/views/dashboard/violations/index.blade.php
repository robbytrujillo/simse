@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Data Pelanggaran</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pelanggaran</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <a href="#" data-toggle="modal" data-target="#violation_create_modal"
              class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2 d-flex justify-content-center align-items-center">
              <i class="ft-plus"></i> Tambah Pelanggaran
            </a>
            <form action="{{ route('violations.export') }}" method="GET" class="col-12 col-md-3">
              <div class="form-group">
                <select class="form-control" name="class" required>
                  <option value="">Pilih Kelas</option>
                  @foreach($classlists as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-bg-gradient-x-purple-blue col-12 col-md-12">
                <i class="ft-download"></i> Ekspor Data
              </button>
            </form>
          </div>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="mb-0 list-inline">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">

            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration" id="violation-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($violations as $violation)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $violation->student->name }}</td>
                    <td>{{ $violation->violationType->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($violation->date)->format('d M Y') }}</td>
                    <td>{{ $violation->reporter->name }}</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="{{ $violation->id }}"
                          class="mr-2 text-white btn btn-sm btn-success edit-modal" data-toggle="modal"
                          data-target="#violation_edit_modal" title="Ubah Pelanggaran">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="mx-1 btn btn-bg-gradient-x-red-pink btn-sm delete-violation" data-id="{{ $violation->id }}"
                          data-toggle="modal" data-target="#delete_violation_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('modal')
@include('dashboard.violations.modal.create')
@include('dashboard.violations.modal.edit')
@include('dashboard.violations.modal.delete')
@endpush
@push('js')
@include('dashboard.violations._script')
@endpush
@endsection
