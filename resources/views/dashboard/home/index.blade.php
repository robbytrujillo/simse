@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Prestasi Siswa</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <button class="btn btn-glow btn-round btn-bg-gradient-x-red-pink">
                                More
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-0 pb-0">
                    <div class="chartist">
                        <div id="project-stats" class="height-350 areaGradientShadow1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card pull-up">
                    <div class="btn btn-bg-gradient-x-orange-yellow">
                        <ul>
                            <li>Pengumuman 1</li>
                            <li>Pengumuman 2</li>
                        </ul>
                    </div>
                    <div class="btn btn-bg-gradient-x-blue-cyan">
                        <p>Anda tidak memiliki jadwal mengajar hari ini.</p>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title float-left" id="greetings">Hello!</h4><a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card pull-up bg-gradient-directional-primary">
                    <div class="card-header bg-hexagons-white">
                        <h4 class="card-title white">Grafik Data Prestasi Siswa</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <button class="btn btn-sm btn-white info box-shadow-1 round btn-min-width pull-right">Selengkapnya. <i class="ft-bar-chart pl-1"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons-info">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center width-100">
                                    <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                </div>
                                <div class="media-body text-right mt-1">
                                    <h3 class="font-large-2 white"></h3>
                                    <h6 class="mt-1"><span class="text-muted white">Data Prestasi <a href="#" class="darken-2 white">Sebulan Terakhir.</a></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row match-height">
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card card-transparent">
            <div class="card-header bg-transparent pl-0">
                <h5 class="card-title text-bold-700">Grafik Pelanggaran Siswa</h5>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content">
                <div id="project-income-chart" class="height-450 BarChartShadow"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-12">
        <h5 class="card-title text-bold-700 my-2">Informasi Jadwal 3 Hari Kedepan</h5>
        <div class="card">
            <div class="card-content">
                <div id="recent-projects" class="media-list position-relative">
                    <div class="table-responsive">
                        <table class="table table-padded table-xl mb-0" id="recent-project-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nama Guru</th>
                                    <th class="border-top-0">Nama Kelas</th>
                                    <th class="border-top-0">Mata Pelajaran</th>
                                    <th class="border-top-0">Jadwal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate align-middle">Nama Guru 1</td>
                                    <td class="text-truncate">Kelas 1</td>
                                    <td class="text-truncate">Matematika</td>
                                    <td class="text-truncate pb-0">
                                        <div class="badge badge-info">Senin: 08:00 - 10:00</div>
                                        <div class="badge badge-info">Selasa: 08:00 - 10:00</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-truncate align-middle">Nama Guru 2</td>
                                    <td class="text-truncate">Kelas 2</td>
                                    <td class="text-truncate">Bahasa Indonesia</td>
                                    <td class="text-truncate pb-0">
                                        <div class="badge badge-info">Rabu: 10:00 - 12:00</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row mt-1">
    <div class="col-md-12 col-lg-6 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Asal Perolehan Barang</h4>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content mt-1">
                <div id="new-projects" class="height-400 GradientlineShadow"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengumuman</h4>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body chat-application">
                    <div class="chats height-300">
                        <div class="chat">
                            <div class="chat-avatar">
                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                    <img src="{{ asset('back/images/PENGUMUMAN.jpg') }}" alt="avatar" />
                                </a>
                            </div>
                            <div class="chat-body">
                                <div class="chat-content">
                                    <strong>Pengumuman 1</strong>
                                </div>
                                <div class="chat-content">
                                    <p>Isi pengumuman pertama</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="chat-app-input mt-1 row">
                        <div class="col-12">
                            <fieldset>
                                <div class="input-group position-relative has-icon-left">
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {
        $("#greetings").html('Selamat datang!');
    });
</script>
@endpush
@endsection

