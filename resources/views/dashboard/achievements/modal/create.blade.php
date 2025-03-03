<div class="modal fade" id="achievement_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pencapaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Class Selection Dropdown -->
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="1">Kelas A</option>
                            <option value="2">Kelas B</option>
                            <option value="3">Kelas C</option>
                        </select>
                    </div>

                    <!-- Student Selection Dropdown -->
                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="student_id" required>
                            <option value="1">John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Robert Johnson</option>
                        </select>
                    </div>

                    <!-- Achievement Type Dropdown -->
                    <div class="form-group">
                        <label for="achievement_type_id">Jenis Pencapaian</label>
                        <select class="form-control" name="achievement_type_id" id="achievement_type_id" required>
                            <option value="1">Keunggulan Akademik</option>
                            <option value="2">Prestasi Olahraga</option>
                            <option value="3">Seni dan Kreativitas</option>
                        </select>
                    </div>

                    <!-- Achievement Date -->
                    <div class="form-group">
                        <label for="date">Tanggal Pencapaian</label>
                        <input type="date" class="form-control" name="date" value="2025-01-23" required>
                    </div>

                    <!-- Achievement Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi Pencapaian</label>
                        <textarea class="form-control" name="description" rows="3" required>Meraih juara pertama dalam lomba sains tingkat sekolah.</textarea>
                    </div>

                    <!-- Achievement Reward -->
                    <div class="form-group">
                        <label for="achievement_reward_id">Hadiah / Penghargaan</label>
                        <select class="form-control" name="achievement_reward_id" id="achievement_reward_id" required>
                            <option value="1">Medali Emas</option>
                            <option value="2">Medali Perak</option>
                            <option value="3">Sertifikat Penghargaan</option>
                        </select>
                    </div>

                    <!-- Achievement Photo (if any) -->
                    <div class="form-group">
                        <label for="image">Upload Foto Bukti Pencapaian (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Tambah Pencapaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

