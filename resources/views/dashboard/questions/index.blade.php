@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Ujian</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Ujian</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration" id="exam-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Ujian</th>
                    <th>Deskripsi</th>
                    <th>Durasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Ujian Matematika</td>
                    <td>Ujian untuk menguji kemampuan matematika siswa.</td>
                    <td>90 menit</td>
                    <td><span class="badge badge-success">Aktif</span></td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-primary text-white" title="Kelola Soal">
                          <i class="ft-eye"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-primary text-white ml-1" title="Tambah Soal">
                          <i class="ft-list"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-warning text-white ml-1" title="Edit Ujian">
                          <i class="ft-edit"></i>
                        </a>

                        <form action="#" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger text-white ml-1" title="Hapus Soal">
                            <i class="ft-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Ujian Bahasa Inggris</td>
                    <td>Ujian untuk menguji kemampuan bahasa Inggris siswa.</td>
                    <td>60 menit</td>
                    <td><span class="badge badge-danger">Tidak Aktif</span></td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-primary text-white" title="Kelola Soal">
                          <i class="ft-eye"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-primary text-white ml-1" title="Tambah Soal">
                          <i class="ft-list"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-warning text-white ml-1" title="Edit Ujian">
                          <i class="ft-edit"></i>
                        </a>

                        <form action="#" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger text-white ml-1" title="Hapus Soal">
                            <i class="ft-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Ujian Fisika</td>
                    <td>Ujian untuk menguji pemahaman konsep fisika.</td>
                    <td>75 menit</td>
                    <td><span class="badge badge-success">Aktif</span></td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-primary text-white" title="Kelola Soal">
                          <i class="ft-eye"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-primary text-white ml-1" title="Tambah Soal">
                          <i class="ft-list"></i>
                        </a>

                        <a href="#" class="btn btn-sm btn-warning text-white ml-1" title="Edit Ujian">
                          <i class="ft-edit"></i>
                        </a>

                        <form action="#" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger text-white ml-1" title="Hapus Soal">
                            <i class="ft-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul Ujian</th>
                    <th>Deskripsi</th>
                    <th>Durasi</th>
                    <th>Status</th>
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
@endsection

