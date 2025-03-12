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
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                            <div class="modal-body">
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
                                        <h5>Opsi</h5>
                                        <div class="form-group" id="options-container-0">
                                            <div class="mb-1 option-group d-flex align-items-center">
                                                <input type="text" class="mr-2 form-control" name="questions[0][options][0][option_text]" placeholder="Masukkan pilihan" required>
                                                <select class="mr-2 form-control" name="questions[0][options][0][is_correct]" required>
                                                    <option value="0">Salah</option>
                                                    <option value="1">Benar</option>
                                                </select>
                                                <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
                                            </div>
                                        </div>
                                        <button type="button" class="mt-2 btn btn-sm btn-secondary">Tambah Opsi</button>
                                    </div>
                                </div>

                                <button type="button" class="mt-2 btn btn-sm btn-secondary" id="add-question">Tambah Soal</button>
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
<script>
    let questionIndex = 1;
    let optionIndex = [1];

    document.getElementById('add-question').addEventListener('click', function() {
        let newQuestionGroup = document.createElement('div');
        newQuestionGroup.classList.add('question-group');
        newQuestionGroup.setAttribute('id', `question-${questionIndex}`);
        newQuestionGroup.innerHTML = `
            <div class="form-group">
                <label for="question_text">Soal ${questionIndex + 1}</label>
                <input type="text" class="form-control" name="questions[${questionIndex}][question_text]" placeholder="Masukkan soal" required>
            </div>
            <div class="form-group">
                <label for="question_type">Tipe Soal</label>
                <select class="form-control" name="questions[${questionIndex}][question_type]" required>
                    <option value="multiple_choice">Pilihan Ganda</option>
                    <option value="true_false">Benar/Salah</option>
                </select>
            </div>

            <h5>Opsi</h5>
            <div class="form-group" id="options-container-${questionIndex}">
                <div class="mb-1 option-group d-flex align-items-center">
                    <input type="text" class="mr-2 form-control" name="questions[${questionIndex}][options][0][option_text]" placeholder="Masukkan pilihan" required>
                    <select class="mr-2 form-control" name="questions[${questionIndex}][options][0][is_correct]" required>
                        <option value="0">Salah</option>
                        <option value="1">Benar</option>
                    </select>
                    <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
                </div>
            </div>
            <button type="button" class="mt-2 btn btn-sm btn-secondary">Tambah Opsi</button>
        `;
        document.getElementById('questions-container').appendChild(newQuestionGroup);
        optionIndex.push(1);
        questionIndex++;
    });
    function addOption(questionIndex) {
        let currentOptionIndex = optionIndex[questionIndex];
        let optionsContainer = document.getElementById('options-container-' + questionIndex);
        let newOptionGroup = document.createElement('div');
        newOptionGroup.classList.add('option-group', 'd-flex', 'align-items-center', 'mb-3');
        newOptionGroup.innerHTML = `
            <input type="text" class="mr-2 form-control" name="questions[${questionIndex}][options][${currentOptionIndex}][option_text]" placeholder="Masukkan pilihan" required>
            <select class="mr-2 form-control" name="questions[${questionIndex}][options][${currentOptionIndex}][is_correct]" required>
                <option value="0">Salah</option>
                <option value="1">Benar</option>
            </select>
            <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
        `;
        optionsContainer.appendChild(newOptionGroup);
        optionIndex[questionIndex]++;
    }
    function removeOption(questionIndex, optionIndex) {
        let optionsContainer = document.getElementById('options-container-' + questionIndex);
        let optionGroup = optionsContainer.children[optionIndex];
        optionsContainer.removeChild(optionGroup);
    }
</script>
@endpush
@endsection

