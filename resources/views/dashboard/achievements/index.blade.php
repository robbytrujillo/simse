@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Pencapaian</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
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
            <!-- Tombol Tambah Pelanggaran -->
            <a href="#" data-toggle="modal" data-target="#achievement_create_modal"
              class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1 d-flex justify-content-center align-items-center">
              <i class="ft-plus"></i> Tambah Pencapaian
            </a>

            <!-- Form Ekspor Data -->
            <form action="#" method="GET" class="col-12 col-md-3">
              <div class="form-group">
                <select class="form-control" name="class" required>
                  <option value="">Pilih Kelas</option>
                  <option value="1">Kelas 1</option>
                  <option value="2">Kelas 2</option>
                  <option value="3">Kelas 3</option>
                </select>
              </div>
              <button type="submit" class="btn btn-bg-gradient-x-purple-blue col-12 col-md-12">
                <i class="ft-download"></i> Ekspor Data
              </button>
            </form>
          </div>

          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
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
                  <!-- Static Data Example -->
                  <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Prestasi Akademik</td>
                    <td>12 Jan 2025</td>
                    <td>Guru A</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="1"
                          class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#achievement_edit_modal" title="Ubah Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-achievement" data-id="1"
                          data-toggle="modal" data-target="#delete_achievement_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Prestasi Olahraga</td>
                    <td>15 Jan 2025</td>
                    <td>Guru B</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="2"
                          class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#achievement_edit_modal" title="Ubah Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-achievement" data-id="2"
                          data-toggle="modal" data-target="#delete_achievement_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
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

