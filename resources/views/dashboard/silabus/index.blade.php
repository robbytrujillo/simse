@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Silabus</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Silabus</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="#" data-toggle="modal" data-target="#silabus_create_modal"
            class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1">
            <i class="ft-plus"></i> Tambah Silabus
          </a>
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
              <table class="table table-striped table-bordered zero-configuration" id="silabus-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kurikulum</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Isi Konten</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data Statis -->
                  <tr>
                    <td>1</td>
                    <td>Kurikulum 2021</td>
                    <td>Matematika</td>
                    <td>Kelas 10</td>
                    <td>Konten silabus Matematika untuk kelas 10</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#silabus_edit_modal" title="Ubah Silabus">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-silabus" data-toggle="modal"
                          data-target="#delete_silabus_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Kurikulum 2022</td>
                    <td>Bahasa Inggris</td>
                    <td>Kelas 11</td>
                    <td>Konten silabus Bahasa Inggris untuk kelas 11</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#silabus_edit_modal" title="Ubah Silabus">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-silabus" data-toggle="modal"
                          data-target="#delete_silabus_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Tambahkan data lainnya jika diperlukan -->
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Kurikulum</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Isi Konten</th>
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
@include('dashboard.silabus.modal.create')
@include('dashboard.silabus.modal.edit')
@include('dashboard.silabus.modal.delete')
@endpush

@push('js')
@include('dashboard.silabus._script')
@endpush

@endsection

