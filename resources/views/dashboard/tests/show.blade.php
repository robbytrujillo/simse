@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">Ujian Matematika</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="mr-1 breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Soal Ujian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>Deskripsi ujian Matematika yang akan dilaksanakan</p>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="mb-0 list-inline">
                            <li>
                                <div id="timer" class="mb-4"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="#" method="POST" id="exam-form">
                            @csrf
                            <input type="hidden" id="current-question-index" name="current_question_index" value="0">

                            <div id="question-container">
                                <div class="question-item" data-index="0" style="">
                                    <h5>1. Apa hasil dari 5 + 3?</h5>
                                    <div class="form-check">
                                        <input type="radio" name="answers[1]" value="1" class="form-check-input" id="option-1">
                                        <label class="form-check-label" for="option-1">A. 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[1]" value="2" class="form-check-input" id="option-2">
                                        <label class="form-check-label" for="option-2">B. 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[1]" value="3" class="form-check-input" id="option-3">
                                        <label class="form-check-label" for="option-3">C. 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[1]" value="4" class="form-check-input" id="option-4">
                                        <label class="form-check-label" for="option-4">D. 9</label>
                                    </div>
                                </div>

                                <div class="question-item" data-index="1" style="display: none;">
                                    <h5>2. Apa hasil dari 10 - 4?</h5>
                                    <div class="form-check">
                                        <input type="radio" name="answers[2]" value="1" class="form-check-input" id="option-5">
                                        <label class="form-check-label" for="option-5">A. 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[2]" value="2" class="form-check-input" id="option-6">
                                        <label class="form-check-label" for="option-6">B. 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[2]" value="3" class="form-check-input" id="option-7">
                                        <label class="form-check-label" for="option-7">C. 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[2]" value="4" class="form-check-input" id="option-8">
                                        <label class="form-check-label" for="option-8">D. 8</label>
                                    </div>
                                </div>

                                <div class="question-item" data-index="2" style="display: none;">
                                    <h5>3. Apa hasil dari 6 x 7?</h5>
                                    <div class="form-check">
                                        <input type="radio" name="answers[3]" value="1" class="form-check-input" id="option-9">
                                        <label class="form-check-label" for="option-9">A. 38</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[3]" value="2" class="form-check-input" id="option-10">
                                        <label class="form-check-label" for="option-10">B. 42</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[3]" value="3" class="form-check-input" id="option-11">
                                        <label class="form-check-label" for="option-11">C. 48</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="answers[3]" value="4" class="form-check-input" id="option-12">
                                        <label class="form-check-label" for="option-12">D. 56</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" id="prev-btn" class="mb-1 mr-2 btn btn-bg-gradient-x-blue-cyan col-12 col-md-4" style="display: none;">Previous</button>
                                <button type="button" id="next-btn" class="mb-1 mr-2 btn btn-bg-gradient-x-purple-blue col-12 col-md-4">Next</button>
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
    let currentIndex = 0;
    const totalQuestions = 3;

    document.getElementById('next-btn').addEventListener('click', function() {
        const currentQuestionIndex = parseInt(document.getElementById('current-question-index').value);
        const currentQuestion = document.querySelector(`.question-item[data-index="${currentQuestionIndex}"]`);
        const selectedOption = currentQuestion.querySelector('input[type="radio"]:checked');

        if (!selectedOption) {
            swal("Error!", "Silakan pilih salah satu jawaban sebelum melanjutkan.", "info");
            return;
        }

        const nextButton = document.getElementById('next-btn');
        if (nextButton.textContent === 'Finish') {
            document.getElementById('exam-form').submit();
            return;
        }

        currentQuestion.style.display = 'none';
        const nextIndex = currentQuestionIndex + 1;
        if (nextIndex < totalQuestions) {
            document.querySelector(`.question-item[data-index="${nextIndex}"]`).style.display = '';
            document.getElementById('current-question-index').value = nextIndex;

            if (nextIndex > 0) {
                document.getElementById('prev-btn').style.display = '';
            }

            if (nextIndex === totalQuestions - 1) {
                document.getElementById('next-btn').textContent = 'Finish';
            }
        } else {
            document.getElementById('exam-form').submit();
        }
    });

    document.getElementById('prev-btn').addEventListener('click', function() {
        const currentQuestionIndex = parseInt(document.getElementById('current-question-index').value);

        if (currentQuestionIndex > 0) {
            document.querySelector(`.question-item[data-index="${currentQuestionIndex}"]`).style.display = 'none';
            const prevIndex = currentQuestionIndex - 1;
            document.querySelector(`.question-item[data-index="${prevIndex}"]`).style.display = '';
            document.getElementById('current-question-index').value = prevIndex;

            if (prevIndex === 0) {
                document.getElementById('prev-btn').style.display = 'none';
            }

            document.getElementById('next-btn').textContent = 'Next';
            document.getElementById('next-btn').style.display = '';
        }
    });

    let duration = 30 * 60 * 1000;
    const timerInterval = setInterval(() => {
        if (duration <= 0) {
            document.getElementById('timer').innerText = "Waktu Habis";
            clearInterval(timerInterval);

            const nextButton = document.getElementById('next-btn');
            nextButton.textContent = 'Finish';

            nextButton.addEventListener('click', function() {
                document.getElementById('exam-form').submit();
            });
        } else {
            const minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((duration % (1000 * 60)) / 1000);
            document.getElementById('timer').innerText = `Sisa Waktu: ${minutes}m ${seconds}s`;
            duration -= 1000;
        }
    }, 1000);
</script>
@endpush
@endsection

