<div class="modal fade" id="exam_create_modal" tabindex="-1" role="dialog" aria-labelledby="createExamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createExamLabel">Tambah Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Judul Ujian</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Waktu Mulai</label>
                                <input type="datetime-local" class="form-control" name="start_time" required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">Waktu Selesai</label>
                                <input type="datetime-local" class="form-control" name="end_time" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">Durasi (Menit)</label>
                                <input type="number" class="form-control" name="duration" required>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select class="form-control" name="class_id" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Guru</label>
                                <select class="form-control" name="teacher_id" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mapel_id">Mata Pelajaran</label>
                                <select class="form-control" name="mapel_id" required>
                                    <option value="">Pilih Mapel</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="is_active">Status Aktif</label>
                                <select class="form-control" name="is_active" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Ujian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

