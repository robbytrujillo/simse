@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Jenis Pencapaian</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Pencapaian</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="#" data-toggle="modal" data-target="#achievement_type_create_modal"
            class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1">
            <i class="ft-plus"></i> Tambah Jenis Pencapaian
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
              <table class="table table-striped table-bordered zero-configuration" id="achievement-type-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Jenis Pencapaian</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Penghargaan Akademik</td>
                    <td>Pencapaian di bidang akademik seperti juara kelas.</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#achievement_type_edit_modal" title="Ubah Jenis Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-achievement-type"
                          data-toggle="modal" data-target="#delete_achievement_type_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Penghargaan Olahraga</td>
                    <td>Pencapaian di bidang olahraga seperti juara lomba lari.</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#achievement_type_edit_modal" title="Ubah Jenis Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-achievement-type"
                          data-toggle="modal" data-target="#delete_achievement_type_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Penghargaan Seni</td>
                    <td>Pencapaian di bidang seni seperti lomba lukis.</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#achievement_type_edit_modal" title="Ubah Jenis Pencapaian">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-achievement-type"
                          data-toggle="modal" data-target="#delete_achievement_type_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Jenis Pencapaian</th>
                    <th>Deskripsi</th>
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
@include('dashboard.achievement_types.modal.create')
@include('dashboard.achievement_types.modal.edit')
@include('dashboard.achievement_types.modal.delete')
@endpush
@push('js')
@include('dashboard.achievement_types._script')
@endpush
@endsection

