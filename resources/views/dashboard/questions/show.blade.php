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
            <div class="shadow-sm card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Soal Ujian</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="row match-height">
                            @forelse ($questions as $question)
                                <div class="col-sm-12 col-md-4">
                                    <div class="border shadow-sm card">
                                        <div class="card-header">
                                            <h4 class="card-title">{{ $question->question_text }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-text">
                                                <p><strong>Options:</strong></p>
                                                <ul>
                                                    @foreach ($question->options as $option)
                                                        <li>
                                                            <span>{{ $option->option_text }}</span> 
                                                            @if ($option->is_correct)
                                                                <span class="badge badge-success">Correct</span>
                                                            @else
                                                                <span class="badge badge-danger">Incorrect</span>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        <strong>Maaf!</strong> Belum ada data soal dan jawaban.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

