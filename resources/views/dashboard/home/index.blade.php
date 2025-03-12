@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Prestasi Siswa</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="mb-0 list-inline">
                        <li>
                            <a href="{{ route('achievements.index') }}" class="btn btn-glow btn-round btn-bg-gradient-x-red-pink">
                                More
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="p-0 pb-0 card-body">
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
                    @if (!empty($notifications))
                    <div class="btn btn-bg-gradient-x-orange-yellow">
                        <ul>
                            @foreach ($notifications as $notification)
                            <li>{{ $notification }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="btn btn-bg-gradient-x-blue-cyan">
                        <p>Anda tidak memiliki jadwal mengajar hari ini.</p>
                    </div>
                    @endif
                    <div class="card-header">
                        <h4 class="float-left card-title" id="greetings"></h4><a class="heading-elements-toggle"><i
                                class="la la-ellipsis-v font-medium-3"></i></a>
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
                            <ul class="mb-0 list-inline">
                                <li>
                                    <a class="btn btn-sm btn-white info box-shadow-1 round btn-min-width pull-right" href="{{ url('dashboard/achievements') }}">Selengkapnya. <i class="pl-1 ft-bar-chart"></i></a>
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
                                <div class="mt-1 text-right media-body">
                                    <h3 class="font-large-2 white"></h3>
                                    <h6 class="mt-1"><span class="text-muted white">Data Prestasi <a href="#"
                                                class="darken-2 white">Sebulan Terakhir.</a></span></h6>
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
            <div class="pl-0 bg-transparent card-header">
                <h5 class="card-title text-bold-700">Grafik Pelanggaran Siswa</h5>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content">
                <div id="project-income-chart" class="height-450 BarChartShadow"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-12">
        <h5 class="my-2 card-title text-bold-700">Informasi Jadwal 3 Hari Kedepan</h5>
        <div class="card">
            <div class="card-content">
                <div id="recent-projects" class="media-list position-relative">
                    <div class="table-responsive">
                        <table class="table mb-0 table-padded table-xl" id="recent-project-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nama Guru</th>
                                    <th class="border-top-0">Nama Kelas</th>
                                    <th class="border-top-0">Mata Pelajaran</th>
                                    <th class="border-top-0">Jadwal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="align-middle text-truncate">
                                        {{ $schedule->teacher->full_name ?? 'Nama Guru Tidak Ditemukan' }}
                                    </td>
                                    <td class="text-truncate">
                                        {{ $schedule->classRoom->name ?? 'Nama Kelas Tidak Ditemukan' }}
                                    </td>
                                    <td class="text-truncate">
                                        {{ $schedule->mapel->nama_mapel ?? 'Mata Pelajaran Tidak Ditemukan' }}
                                    </td>
                                    <td class="pb-0 text-truncate">
                                        @foreach ($schedule->day as $index => $day)
                                        @if (in_array($day, $filteredDays)) 
                                        <div class="badge badge-info">{{ $day }}: {{ $schedule->start_time[$index] }} - {{ $schedule->end_time[$index] }}</div>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="mt-1 row">
    <div class="col-md-12 col-lg-6 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik Asal Perolehan Barang</h4>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="mb-0 list-inline">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-1 card-content">
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
                    <ul class="mb-0 list-inline">
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
                        @foreach($announcements as $announcement)
                        <div class="chat">
                            <div class="chat-avatar">
                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                    <img src="{{ asset('back/images/PENGUMUMAN.jpg') }}" alt="avatar" />
                                </a>
                            </div>
                            <div class="chat-body">
                                <div class="chat-content">
                                    <strong>{{ $announcement->title }}</strong>
                                </div>
                                <div class="chat-content">
                                    <p>{{ $announcement->content }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <form class="mt-1 chat-app-input row">
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
        $("#greetings").html(greetings());
    });
</script>
@endpush
@endsection
