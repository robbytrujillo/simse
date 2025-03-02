@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Guru</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Guru</li>
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
            <a href="#" data-toggle="modal" data-target="#teacher_create_modal"
              class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1 d-flex justify-content-center align-items-center">
              <i class="ft-plus"></i> Tambah Guru
            </a>

            <form action="#" method="POST" class="col-12 col-md-3" enctype="multipart/form-data">
              @csrf
              <input type="file" class="mb-1" name="file" accept=".xlsx, .csv">
              <button type="submit" class="btn btn-bg-gradient-x-purple-blue col-12 col-md-6 mr-1 mb-1">Import Excel</button>
            </form>

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
                <table class="table table-striped table-bordered zero-configuration" id="teacher-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Guru</th>
                      <th>Posisi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>John Doe</td>
                      <td>Guru Matematika</td>
                      <td>
                        <div class="d-flex justify-content-start align-items-center">
                          <a href="#" data-id="1"
                            class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                            data-target="#teacher_edit_modal" title="Ubah Guru">
                            <i class="ft-edit"></i>
                          </a>
                          <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-teacher" data-id="1"
                            data-toggle="modal" data-target="#delete_teacher_modal" title="Hapus">
                            <i class="ft-delete"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jane Smith</td>
                      <td>Guru Bahasa Inggris</td>
                      <td>
                        <div class="d-flex justify-content-start align-items-center">
                          <a href="#" data-id="2"
                            class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                            data-target="#teacher_edit_modal" title="Ubah Guru">
                            <i class="ft-edit"></i>
                          </a>
                          <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-teacher" data-id="2"
                            data-toggle="modal" data-target="#delete_teacher_modal" title="Hapus">
                            <i class="ft-delete"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Michael Johnson</td>
                      <td>Guru Sejarah</td>
                      <td>
                        <div class="d-flex justify-content-start align-items-center">
                          <a href="#" data-id="3"
                            class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                            data-target="#teacher_edit_modal" title="Ubah Guru">
                            <i class="ft-edit"></i>
                          </a>
                          <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-teacher" data-id="3"
                            data-toggle="modal" data-target="#delete_teacher_modal" title="Hapus">
                            <i class="ft-delete"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Guru</th>
                      <th>Posisi</th>
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
@include('dashboard.teachers.modal.create')
@include('dashboard.teachers.modal.edit')
@include('dashboard.teachers.modal.delete')
@endpush

@push('js')
@include('dashboard.teachers._script')
@endpush
@endsection

