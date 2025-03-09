@extends('layouts.dashboard')

@section('content')
<section id="configuration">
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-4 col-12">
            <h3 class="content-header-title">Teaching Data</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="mr-1 breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teaching Data</li>
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
                        <form action="{{ route('teachings.update', $teaching->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="teacher_id">Guru</label>
                                <select class="form-control" name="teacher_id" required>
                                    <option value="" disabled>Pilih Guru</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $teacher->id == $teaching->teacher_id ? 'selected' : '' }}>
                                        {{ $teacher->full_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select class="form-control" name="class_id" required>
                                    <option value="" disabled>Pilih Kelas</option>
                                    @foreach($classlists as $class)
                                    <option value="{{ $class->id }}" {{ $class->id == $teaching->class_id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <select class="form-control" name="mapel_id" required>
                                <option value="" disabled>Pilih Mapel</option>
                                @foreach($mapels as $mapel)
                                <option value="{{ $mapel->id }}" {{ $mapel->id == $teaching->mapel_id ? 'selected' : '' }}>
                                    {{ $mapel->nama_mapel }}
                                </option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="hours_per_week">Jam Mengajar per Minggu</label>
                                <input type="number" class="form-control" name="hours_per_week" value="{{ old('hours_per_week', $teaching->hours_per_week) }}" required>
                            </div>

                            <div class="mt-1 form-group">
                                <div class="text-bold-600 font-medium-2">
                                    Pilih Hari
                                </div>
                                <select class="select2 js-example-programmatic-multi form-control" id="programmatic-multiple" name="days[]" multiple="multiple">
                                    <option value="Senin" {{ in_array('Senin', $teaching->day ?? []) ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ in_array('Selasa', $teaching->day ?? []) ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ in_array('Rabu', $teaching->day ?? []) ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ in_array('Kamis', $teaching->day ?? []) ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ in_array('Jumat', $teaching->day ?? []) ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ in_array('Sabtu', $teaching->day ?? []) ? 'selected' : '' }}>Sabtu</option>
                                </select>
                            </div>

                            <div id="dynamic-fields"></div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Perbarui Data Pengajaran</button>
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
    $(document).ready(function() {
        $('.select2').select2();

        function updateDayFields() {
            const selectedDays = $('#programmatic-multiple').val();
            const dynamicFields = $('#dynamic-fields');
            const teachingData = @json($teaching);
            const days = teachingData.day || [];
            const startTimes = teachingData.start_time || [];
            const endTimes = teachingData.end_time || [];

            dynamicFields.empty();

            selectedDays.forEach(function(day, index) {
                const startTime = startTimes[index] || '';
                const endTime = endTimes[index] || '';

                dynamicFields.append(`
                <div class="form-group day-item" id="day-item-${index}">
                    <label for="day_${day}">${day}</label>
                    <input type="text" class="form-control" name="day[]" value="${day}" required readonly>
                </div>
                <div class="form-group">
                    <label for="start_time_${day}">Jam Mulai ${day}</label>
                    <input type="time" class="form-control" name="start_time[]" value="${startTime}" required>
                </div>
                <div class="form-group">
                    <label for="end_time_${day}">Jam Selesai ${day}</label>
                    <input type="time" class="form-control" name="end_time[]" value="${endTime}" required>
                </div>
            `);
            });
        }

        updateDayFields();

        $('#programmatic-multiple').change(function() {
            updateDayFields();
        });
    });
</script>
@endpush
@endsection

