@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">Edit Data Ujian</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="mr-1 breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Ujian</a></li>
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
                        <form action="{{ route('questions.update', $exam->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                            <div class="modal-body">
                                <div id="questions-container">
                                    @forelse($questions as $questionIndex => $question)
                                    <div class="question-group" id="question-{{ $questionIndex }}">
                                        <div class="form-group">
                                            <label for="question_text">Soal {{ $questionIndex + 1 }}</label>
                                            <input type="text" class="form-control" name="questions[{{ $questionIndex }}][question_text]" value="{{ $question->question_text }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="question_type">Tipe Soal</label>
                                            <select class="form-control" name="questions[{{ $questionIndex }}][question_type]" required>
                                                <option value="multiple_choice" {{ $question->question_type == 'multiple_choice' ? 'selected' : '' }}>Pilihan Ganda</option>
                                                <option value="true_false" {{ $question->question_type == 'true_false' ? 'selected' : '' }}>Benar/Salah</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="questions[{{ $questionIndex }}][id]" value="{{ isset($question->id) ? $question->id : '' }}">
                                        <h5>Opsi</h5>
                                        <div class="form-group" id="options-container-{{ $questionIndex }}">
                                            @foreach($question->options as $optionIndex => $option)
                                            <div class="mb-1 option-group d-flex align-items-center">
                                                <input type="text" class="mr-2 form-control" name="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][option_text]" value="{{ $option->option_text }}" required>
                                                <select class="mr-2 form-control" name="questions[{{ $questionIndex }}][options][{{ $optionIndex }}][is_correct]" required>
                                                    <option value="0" {{ $option->is_correct == 0 ? 'selected' : '' }}>Salah</option>
                                                    <option value="1" {{ $option->is_correct == 1 ? 'selected' : '' }}>Benar</option>
                                                </select>
                                                <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="mt-2 btn btn-sm btn-secondary">Tambah Opsi</button>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="alert alert-warning">
                                            <strong>Maaf!</strong> Belum ada data soal dan jawaban.
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                                @if($questions->isNotEmpty())
                                <button type="button" class="mt-2 btn btn-sm btn-secondary" id="add-question">Tambah Soal</button>
                                @endif
                            </div>
                            <div class="modal-footer">
                                @if($questions->isNotEmpty())
                                <a href="{{ route('questions.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                @endif
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
    let questionIndex = {{ count($questions) }};
    let optionIndex = [];
    function addOption(questionIndex) {
        const optionsContainer = document.getElementById(`options-container-${questionIndex}`);
        const newOptionIndex = optionsContainer.children.length;

        const newOptionGroup = document.createElement('div');
        newOptionGroup.classList.add('option-group', 'd-flex', 'align-items-center', 'mb-1');
        newOptionGroup.innerHTML = `
        <input type="text" class="mr-2 form-control" name="questions[${questionIndex}][options][${newOptionIndex}][option_text]" placeholder="Masukkan pilihan" required>
        <select class="mr-2 form-control" name="questions[${questionIndex}][options][${newOptionIndex}][is_correct]" required>
            <option value="0">Salah</option>
            <option value="1">Benar</option>
        </select>
        <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
    `;
        optionsContainer.appendChild(newOptionGroup);
    }
    function removeOption(questionIndex, optionIndex) {
        const optionsContainer = document.getElementById(`options-container-${questionIndex}`);
        const optionGroup = optionsContainer.querySelector(`.option-group:nth-child(${optionIndex + 1})`);
        optionGroup.remove();
        const hiddenInput = optionGroup.querySelector('input[name*="[id]"]');
        if (hiddenInput) {
            hiddenInput.value = ''; 
        }
    }
    document.getElementById('add-question').addEventListener('click', function() {
        const questionsContainer = document.getElementById('questions-container');
        const newQuestionGroup = document.createElement('div');
        newQuestionGroup.classList.add('question-group');
        newQuestionGroup.innerHTML = `
            <div class="form-group">
                <label for="question_text">Soal ${questionIndex + 1}</label>
                <input type="text" class="form-control" name="questions[${questionIndex}][question_text]" required>
            </div>
            <div class="form-group">
                <label for="question_type">Tipe Soal</label>
                <select class="form-control" name="questions[${questionIndex}][question_type]" required>
                    <option value="multiple_choice">Pilihan Ganda</option>
                    <option value="true_false">Benar/Salah</option>
                </select>
            </div>
            <div id="options-container-${questionIndex}">
                <div class="mb-1 option-group d-flex align-items-center">
                    <input type="text" class="mr-2 form-control" name="questions[${questionIndex}][options][0][option_text]" placeholder="Masukkan pilihan" required>
                    <select class="mr-2 form-control" name="questions[${questionIndex}][options][0][is_correct]" required>
                        <option value="0">Salah</option>
                        <option value="1">Benar</option>
                    </select>
                    <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
                </div>
                <div class="mb-1 option-group d-flex align-items-center">
                    <input type="text" class="mr-2 form-control" name="questions[${questionIndex}][options][1][option_text]" placeholder="Masukkan pilihan" required>
                    <select class="mr-2 form-control" name="questions[${questionIndex}][options][1][is_correct]" required>
                        <option value="0">Salah</option>
                        <option value="1">Benar</option>
                    </select>
                    <button type="button" class="mt-2 btn btn-danger btn-sm">Hapus Opsi</button>
                </div>
            </div>
            <button type="button" class="mt-2 btn btn-sm btn-secondary">Tambah Opsi</button>
        `;
        questionsContainer.appendChild(newQuestionGroup);
        questionIndex++;
    });
</script>
@endpush
@endsection
