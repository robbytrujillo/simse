<div class="modal fade" id="teaching_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="teacher_id">Guru</label>
                        <select class="form-control" name="teacher_id" required>
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            @foreach($classlists as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" required>
                            <option value="" selected disabled>Pilih Mapel</option>
                            @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hours_per_week">Jam Mengajar per Minggu</label>
                        <input type="number" class="form-control" name="hours_per_week" value="{{ old('hours_per_week') }}" required>
                    </div>
                    <div class="mt-1 form-group">
                        <div class="text-bold-600 font-medium-2">
                            Pilih Hari
                        </div>
                        <select class="select2 js-example-programmatic-multi form-control" id="programmatic-multiple-create" multiple="multiple">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="btn-group btn-group-sm" role="group" aria-label="Pengaturan dan penghapusan pilihan Select2 secara programatik">
                        <button type="button" class="js-programmatic-multi-set-val btn btn-primary btn-lighten-1">
                            Setel ke Senin - Sabtu
                        </button>
                        <button type="button" class="js-programmatic-multi-clear btn btn-primary btn-lighten-1">
                            Hapus
                        </button>
                    </div>
                    <div id="dynamic-fields"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Pengajaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function updateDayFields() {
            const selectedDays = $('#programmatic-multiple-create').val();
            const dynamicFields = $('#dynamic-fields'); 

            dynamicFields.empty(); 
            selectedDays.forEach(function(day) {
                dynamicFields.append(`
                    <div class="form-group">
                        <label for="day_${day}">${day}</label>
                        <input type="text" class="form-control" name="day[]" value="${day}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="start_time_${day}">Jam Mulai ${day}</label>
                        <input type="time" class="form-control" name="start_time[]" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time_${day}">Jam Selesai ${day}</label>
                        <input type="time" class="form-control" name="end_time[]" required>
                    </div>
                `);
            });
        }

        $('.js-programmatic-multi-set-val').click(function() {
            $('#programmatic-multiple-create').val(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']).trigger('change');
        });

        $('.js-programmatic-multi-clear').click(function() {
            $('#programmatic-multiple-create').val([]).trigger('change');
        });

        $('#programmatic-multiple-create').change(function() {
            updateDayFields();
        });
        updateDayFields();
    });
</script>

