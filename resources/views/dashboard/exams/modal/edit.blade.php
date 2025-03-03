<div class="modal fade" id="exam_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editExamLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="editExamLabel">Edit Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="exam_edit_form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_title">Judul Ujian</label>
                                <input type="text" class="form-control" name="title" id="edit_title" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_description">Deskripsi</label>
                                <textarea class="form-control" name="description" id="edit_description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_start_time">Waktu Mulai</label>
                                <input type="datetime-local" class="form-control" name="start_time" id="edit_start_time" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_end_time">Waktu Selesai</label>
                                <input type="datetime-local" class="form-control" name="end_time" id="edit_end_time" required>
                            </div>
                        </div>
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_duration">Durasi (Menit)</label>
                                <input type="number" class="form-control" name="duration" id="edit_duration" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_is_active">Status Aktif</label>
                                <select class="form-control" name="is_active" id="edit_is_active" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_class_id">Kelas</label>
                                <select class="form-control" name="class_id" id="edit_class_id" required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="1">Kelas 10 IPA</option>
                                    <option value="2">Kelas 10 IPS</option>
                                    <option value="3">Kelas 11 IPA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_teacher_id">Guru</label>
                                <select class="form-control" name="teacher_id" id="edit_teacher_id" required>
                                    <option value="">Pilih Guru</option>
                                    <option value="1">Bapak Andi</option>
                                    <option value="2">Ibu Siti</option>
                                    <option value="3">Bapak Budi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_mapel_id">Mata Pelajaran</label>
                                <select class="form-control" name="mapel_id" id="edit_mapel_id" required>
                                    <option value="">Pilih Mapel</option>
                                    <option value="1">Matematika</option>
                                    <option value="2">Bahasa Inggris</option>
                                    <option value="3">Fisika</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Ujian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
