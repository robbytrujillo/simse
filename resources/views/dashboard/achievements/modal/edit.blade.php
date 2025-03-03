<!-- Edit Achievement Modal -->
<div class="modal fade" id="achievement_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" id="editAchievementForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="edit_student_id" required>
                            <option value="1" selected>John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Robert Johnson</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achievement_type_id">Jenis Prestasi</label>
                        <select class="form-control" name="achievement_type_id" id="achievement_type_id" required>
                            <option value="1" selected>Keunggulan Akademik</option>
                            <option value="2">Prestasi Olahraga</option>
                            <option value="3">Seni dan Kreativitas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Prestasi</label>
                        <input type="date" class="form-control" name="date" id="edit_date" value="2025-01-23" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Prestasi</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3" required>Meraih juara pertama dalam lomba sains tingkat sekolah.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Hadiah / Penghargaan</label>
                        <select class="form-control" name="achievement_reward_id" id="achievement_reward_id" required>
                            <option value="1" selected>Medali Emas</option>
                            <option value="2">Medali Perak</option>
                            <option value="3">Sertifikat Penghargaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Update Foto Bukti Prestasi (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                    </div>
                    <img id="image_preview" src="path/to/image.jpg" alt="Image Preview" class="mt-2" style="max-width: 100px; display: none;">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Perbarui Prestasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

