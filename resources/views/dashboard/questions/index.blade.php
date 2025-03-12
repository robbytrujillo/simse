@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Data Ujian</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
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
                  @foreach($exams as $exam)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $exam->title }}</td>
                    <td>{{ $exam->description ?? 'Tidak Ada Deskripsi' }}</td>
                    <td>{{ $exam->duration }} menit</td>
                    <td>
                      <span class="badge {{ $exam->is_active ? 'badge-success' : 'badge-danger' }}">
                        {{ $exam->is_active ? 'Aktif' : 'Tidak Aktif' }}
                      </span>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start align-items-center">
                        <a href="{{ route('questions.lihat', $exam->id) }}" class="text-white btn btn-sm btn-primary" title="Kelola Soal">
                          <i class="ft-eye"></i>
                        </a>

                        <a href="{{ route('questions.create', ['exam_id' => $exam->id]) }}" class="ml-1 text-white btn btn-sm btn-primary" title="Kelola Soal">
                          <i class="ft-list"></i>
                        </a>

                        <a href="{{ route('questions.edit', $exam->id) }}" class="ml-1 text-white btn btn-sm btn-warning" title="Edit Ujian">
                          <i class="ft-edit"></i>
                        </a>
                        <form action="{{ route('questions.destroy', $exam->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="ml-1 text-white btn btn-sm btn-danger" title="Hapus Soal">
                            <i class="ft-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>

                  </tr>
                  @endforeach
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
