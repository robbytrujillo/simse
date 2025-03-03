@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
      <h3 class="content-header-title">Data Siswa</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="breadcrumb-wrapper mr-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Siswa</li>
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
            <a href="#" data-toggle="modal" data-target="#student_create_modal"
              class="btn btn-bg-gradient-x-purple-blue col-12 col-md-2 mr-1 mb-1 d-flex justify-content-center align-items-center">
              <i class="ft-plus"></i> Tambah Siswa
            </a>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration" id="student-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $students = [
                      ['id' => 1, 'name' => 'Ahmad', 'class' => '10 IPA 1'],
                      ['id' => 2, 'name' => 'Budi', 'class' => '10 IPA 2'],
                      ['id' => 3, 'name' => 'Citra', 'class' => '10 IPS 1']
                    ];
                  @endphp
                  @foreach($students as $index => $student)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['class'] }}</td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-sm btn-success text-white edit-modal mr-2" data-toggle="modal"
                          data-target="#student_edit_modal" title="Ubah Siswa">
                          <i class="ft-edit"></i>
                        </a>
                        <a href="#" class="btn btn-bg-gradient-x-red-pink btn-sm mx-1 delete-student" data-toggle="modal"
                          data-target="#delete_student_modal" title="Hapus">
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
                    <th>Kelas</th>
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
@include('dashboard.students.modal.create')
@include('dashboard.students.modal.edit')
@include('dashboard.students.modal.delete')
@endpush
@push('js')
@include('dashboard.students._script')
@endpush
@endsection

