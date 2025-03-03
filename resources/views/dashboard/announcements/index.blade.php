@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Pengumuman</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengumuman</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="#" data-toggle="modal" data-target="#announcement_create_modal"
            class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1">
            <i class="ft-plus"></i> Tambah Pengumuman
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
              <table class="table table-striped table-bordered zero-configuration" id="announcement-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Pengumuman</th>
                    <th>Konten</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Pengumuman 1</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>01-01-2025</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="1" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal" data-target="#announcement_edit_modal" title="Ubah Pengumuman">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-announcement" data-id="1" data-toggle="modal" data-target="#delete_announcement_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Pengumuman 2</td>
                    <td>Donec vehicula ex vel tincidunt efficitur.</td>
                    <td>02-01-2025</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="2" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal" data-target="#announcement_edit_modal" title="Ubah Pengumuman">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-announcement" data-id="2" data-toggle="modal" data-target="#delete_announcement_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Pengumuman 3</td>
                    <td>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</td>
                    <td>03-01-2025</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" data-id="3" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal" data-target="#announcement_edit_modal" title="Ubah Pengumuman">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-announcement" data-id="3" data-toggle="modal" data-target="#delete_announcement_modal" title="Hapus">
                          <i class="ft-delete"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul Pengumuman</th>
                    <th>Konten</th>
                    <th>Tanggal Terbit</th>
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
@include('dashboard.announcements.modal.create')
@include('dashboard.announcements.modal.edit')
@include('dashboard.announcements.modal.delete')
@endpush
@push('js')
@include('dashboard.announcements._script')
@endpush
@endsection

