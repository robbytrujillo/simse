@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Data Pencapaian</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pencapaian</li>
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
            <a href="#" data-toggle="modal" data-target="#achievement_create_modal"
              class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2 d-flex justify-content-center align-items-center">
              <i class="ft-plus"></i> Tambah Pencapaian
            </a>
            <form action="{{ route('achievements.export') }}" method="GET" class="col-12 col-md-3">
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
              <table class="table table-striped table-bordered zero-configuration" id="achievement-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Pencapaian</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($achievements as $achievement)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $achievement->student->name }}</td>
                    <td>{{ $achievement->achievementType->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}</td>
                    <td>{{ $achievement->reporter->name }}</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="{{ $achievement->id }}"
                          class="mr-2 text-white btn btn-sm btn-success edit-modal" data-toggle="modal"
                          data-target="#achievement_edit_modal" title="Ubah Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="mx-1 btn btn-bg-gradient-x-red-pink btn-sm delete-achievement" data-id="{{ $achievement->id }}"
                          data-toggle="modal" data-target="#delete_achievement_modal" title="Hapus">
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
                    <th>Jenis Pencapaian</th>
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
@include('dashboard.achievements.modal.create')
@include('dashboard.achievements.modal.edit')
@include('dashboard.achievements.modal.delete')
@endpush
@push('js')
@include('dashboard.achievements._script')
@endpush
@endsection
