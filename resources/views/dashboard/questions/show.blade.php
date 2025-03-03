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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ujian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title">Daftar Soal Ujian</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="row match-height">
                            <!-- Soal 1 -->
                            <div class="col-sm-12 col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-header">
                                        <h4 class="card-title">Apa ibukota Indonesia?</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p><strong>Options:</strong></p>
                                            <ul>
                                                <li>
                                                    <span>Jakarta</span>
                                                    <span class="badge badge-success">Correct</span>
                                                </li>
                                                <li>
                                                    <span>Surabaya</span>
                                                    <span class="badge badge-danger">Incorrect</span>
                                                </li>
                                                <li>
                                                    <span>Medan</span>
                                                    <span class="badge badge-danger">Incorrect</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Soal 2 -->
                            <div class="col-sm-12 col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-header">
                                        <h4 class="card-title">Berapa hasil dari 5 + 3?</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p><strong>Options:</strong></p>
                                            <ul>
                                                <li>
                                                    <span>7</span>
                                                    <span class="badge badge-danger">Incorrect</span>
                                                </li>
                                                <li>
                                                    <span>8</span>
                                                    <span class="badge badge-success">Correct</span>
                                                </li>
                                                <li>
                                                    <span>9</span>
                                                    <span class="badge badge-danger">Incorrect</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Jika tidak ada data -->
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    <strong>Maaf!</strong> Belum ada data soal dan jawaban.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

