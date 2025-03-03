@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">Daftar Ujian Aktif</h3>
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
        <!-- Ujian Matematika -->
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="text-center card-body">
                        <div class="pt-0 pb-0 card-header">
                            <p class="info darken-2">Ujian Matematika</p>
                        </div>
                        <div class="card-content">
                            <span class="danger darken-2">
                                <i class="ft-check-circle" style="font-size: 70px;"></i>
                            </span>
                            <h5 class="mb-3 blue-grey lighten-1 text-bold-70">Skor: 90</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ujian Fisika -->
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="text-center card-body">
                        <div class="pt-0 pb-0 card-header">
                            <p class="info darken-2">Ujian Fisika</p>
                        </div>
                        <div class="card-content">
                            <span class="danger darken-2">
                                <i class="ft-layers" style="font-size: 70px;"></i>
                            </span>
                            <ul class="clearfix mt-2 list-inline">
                                <li>
                                    <h5 class="mb-3 blue-grey lighten-1 text-bold-70">Ujian untuk kelas Fisika semester ini</h5>
                                    <span class="info darken-2">
                                        <button class="btn btn-bg-gradient-x-blue-cyan">Mulai Ujian</button>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pesan jika belum ada ujian -->
        <div class="col-md-12">
            <div class="card">
                <div class="text-center card-body">
                    <h5>Maaf Belum Ada Ujian di Kelas Anda</h5>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

