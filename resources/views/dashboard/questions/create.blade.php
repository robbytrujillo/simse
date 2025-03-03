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
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="exam_id" value="">

                            <div class="modal-body">
                                <!-- Form untuk soal -->
                                <div id="questions-container">
                                    <div class="question-group" id="question-0">
                                        <div class="form-group">
                                            <label for="question_text">Soal 1</label>
                                            <input type="text" class="form-control" name="questions[0][question_text]" placeholder="Masukkan soal" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="question_type">Tipe Soal</label>
                                            <select class="form-control" name="questions[0][question_type]" required>
                                                <option value="multiple_choice">Pilihan Ganda</option>
                                                <option value="true_false">Benar/Salah</option>
                                            </select>
                                        </div>

                                        <!-- Form untuk opsi -->
                                        <h5>Opsi</h5>
                                        <div class="form-group" id="options-container-0">
                                            <div class="option-group d-flex align-items-center mb-1">
                                                <input type="text" class="form-control mr-2" name="questions[0][options][0][option_text]" placeholder="Masukkan pilihan" required>
                                                <select class="form-control mr-2" name="questions[0][options][0][is_correct]" required>
                                                    <option value="0">Salah</option>
                                                    <option value="1">Benar</option>
                                                </select>
                                                <button type="button" class="btn btn-danger btn-sm mt-2">Hapus Opsi</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-secondary mt-2">Tambah Opsi</button>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-question">Tambah Soal</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Soal dan Opsi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
@endpush
@endsection

