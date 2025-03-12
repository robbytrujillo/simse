@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">{{ $exam->title }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="mr-1 breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Silabus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Menampilkan timer countdown -->
    
    <div class="row match-height">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header ">
                    
                <p>{{ $exam->description }}</p>
                
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
                        <form action="{{ route('exams.storeAnswers', $exam->id) }}" method="POST" id="exam-form">
                            @csrf
                            <input type="hidden" id="current-question-index" name="current_question_index" value="0">

                            <!-- Wrapper untuk soal -->
                            <div id="question-container">
                                @foreach ($questions as $index => $question)
                                <div class="question-item" data-index="{{ $index }}" style="{{ $index == 0 ? '' : 'display: none;' }}">
                                    <h5>{{ $index + 1 }}. {{ $question->question_text }}</h5>

                                    @foreach ($question->options as $optionIndex => $option)
                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            name="answers[{{ $question->id }}]"
                                            value="{{ $option->id }}"
                                            class="form-check-input"
                                            id="option-{{ $option->id }}">
                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                            @php
                                            $optionLetter = chr(97 + $optionIndex);
                                            @endphp
                                            {{ strtoupper($optionLetter) }}. {{ $option->option_text }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
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
    const questions = @json($questions);
    const totalQuestions = questions.length;
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

        const form = document.getElementById('exam-form');
        const formData = new FormData(form);
        formData.append('current_question_index', currentQuestionIndex);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        }).then(response => {
            if (response.ok) {
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
                    form.submit();
                }
            }
        });
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
            document.getElementById('next-btn').textContent = 'Next';
            document.getElementById('next-btn').style.display = '';
        }
    });
    let duration = {{$examDuration}}* 60 * 1000;
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
