@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Edit Data Ujian</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Ujian</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="exam_id" value="1">

                            <div class="modal-body">
                                <!-- Form untuk soal -->
                                <div id="questions-container">
                                    <div class="question-group" id="question-0">
                                        <div class="form-group">
                                            <label for="question_text">Soal 1</label>
                                            <input type="text" class="form-control" name="questions[0][question_text]" value="Apa ibukota Indonesia?" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="question_type">Tipe Soal</label>
                                            <select class="form-control" name="questions[0][question_type]" required>
                                                <option value="multiple_choice" selected>Pilihan Ganda</option>
                                                <option value="true_false">Benar/Salah</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="questions[0][id]" value="1">

                                        <!-- Form untuk opsi -->
                                        <h5>Opsi</h5>
                                        <div class="form-group" id="options-container-0">
                                            <div class="option-group d-flex align-items-center mb-1">
                                                <input type="text" class="form-control mr-2" name="questions[0][options][0][option_text]" value="Jakarta" required>
                                                <select class="form-control mr-2" name="questions[0][options][0][is_correct]" required>
                                                    <option value="0">Salah</option>
                                                    <option value="1" selected>Benar</option>
                                                </select>
                                                <button type="button" class="btn btn-danger btn-sm mt-2">Hapus Opsi</button>
                                            </div>
                                            <div class="option-group d-flex align-items-center mb-1">
                                                <input type="text" class="form-control mr-2" name="questions[0][options][1][option_text]" value="Surabaya" required>
                                                <select class="form-control mr-2" name="questions[0][options][1][is_correct]" required>
                                                    <option value="0" selected>Salah</option>
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
                                <a href="#" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

