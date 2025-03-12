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
                    <h4 class="card-title" id="horz-layout-colored-controls">{{ $exam->title }}</h4>
                    <h5>Deskripsi: {{ $exam->description }}</h5>
                    <div class="card-text">
                        <p>Kelas: {{ $exam->classRoom->name }}</p>
                        <p>Wali Kelas: {{ $exam->classRoom->teacher->full_name }}</p>
                        <p>Waktu Mulai: {{ $exam->start_time }}</p>
                        <p>Waktu Selesai: {{ $exam->end_time }}</p>
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
                    <a href="{{ route('results.export', ['id' => $exam->id, 'export' => true]) }}" class="btn btn-bg-gradient-x-red-pink">
                        Export to Excel
                    </a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="exam-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nis</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exam->results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->student->name ?? 'Tidak diketahui' }}</td>
                                        <td>{{ $result->student->students->first()->nis ?? 'Tidak diketahui' }}</td>
                                        <td>{{ $result->score }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nis</th>
                                        <th>Nilai</th>
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
