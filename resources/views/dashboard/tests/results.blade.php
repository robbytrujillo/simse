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
                    <h4 class="card-title" id="horz-layout-colored-controls">Ujian Matematika</h4>
                    <h5>Deskripsi: Ujian Matematika Dasar</h5>
                    <div class="card-text">
                        <p>Kelas: 10A</p>
                        <p>Wali Kelas: Budi Santoso</p>
                        <p>Waktu Mulai: 08:00</p>
                        <p>Waktu Selesai: 10:00</p>
                    </div>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0 list-inline">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-bg-gradient-x-red-pink">
                        Export to Excel
                    </a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="exam-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nis</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kurnia</td>
                                        <td>12345</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Andi</td>
                                        <td>67890</td>
                                        <td>85</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Nugroho</td>
                                        <td>11223</td>
                                        <td>92</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nis</th>
                                        <th>Nilai</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

