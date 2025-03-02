@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Teaching Data</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teaching Data</li>
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
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Pilihan Guru -->
                            <div class="form-group">
                                <label for="teacher_id">Guru</label>
                                <select class="form-control" name="teacher_id" required>
                                    <option value="" disabled>Pilih Guru</option>
                                    <option value="1">Guru A</option>
                                    <option value="2">Guru B</option>
                                    <option value="3">Guru C</option>
                                </select>
                            </div>

                            <!-- Pilihan Kelas -->
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select class="form-control" name="class_id" required>
                                    <option value="" disabled>Pilih Kelas</option>
                                    <option value="1">Kelas X</option>
                                    <option value="2">Kelas XI</option>
                                    <option value="3">Kelas XII</option>
                                </select>
                            </div>

                            <!-- Mata Pelajaran -->
                            <div class="form-group">
                                <label for="mapel_id">Mata Pelajaran</label>
                                <select class="form-control" name="mapel_id" required>
                                    <option value="" disabled>Pilih Mapel</option>
                                    <option value="1">Matematika</option>
                                    <option value="2">Fisika</option>
                                    <option value="3">Kimia</option>
                                </select>
                            </div>

                            <!-- Jam Mengajar -->
                            <div class="form-group">
                                <label for="hours_per_week">Jam Mengajar per Minggu</label>
                                <input type="number" class="form-control" name="hours_per_week" value="3" required>
                            </div>

                            <!-- Pilihan Hari -->
                            <div class="form-group mt-1">
                                <label for="days">Pilih Hari</label>
                                <select class="select2 js-example-programmatic-multi form-control" id="programmatic-multiple" name="days[]" multiple="multiple">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Perbarui Data Pengajaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
