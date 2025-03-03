<div class="modal fade" id="violation_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Class Selection Dropdown -->
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="">Pilih Kelas</option>
                            <option value="1">Kelas A</option>
                            <option value="2">Kelas B</option>
                            <option value="3">Kelas C</option>
                        </select>
                    </div>

                    <!-- Student Selection Dropdown -->
                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="student_id" required>
                            <option value="">Pilih Siswa</option>
                            <option value="1">Siswa 1</option>
                            <option value="2">Siswa 2</option>
                            <option value="3">Siswa 3</option>
                        </select>
                    </div>

                    <!-- Other form fields -->
                    <div class="form-group">
                        <label for="violation_type">Jenis Pelanggaran</label>
                        <select class="form-control" name="violation_type_id" id="violation_type_id" required>
                            <option value="">Pilih Jenis Pelanggaran</option>
                            <option value="1">Terlambat</option>
                            <option value="2">Tidak Menggunakan Seragam</option>
                            <option value="3">Bolos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pelanggaran</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Pelanggaran</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penalty">Sanksi</label>
                        <select class="form-control" name="sanction_type_id" id="sanction_type_id" required>
                            <option value="">Pilih Jenis Sanksi</option>
                            <option value="1">Peringatan</option>
                            <option value="2">Skorsing</option>
                            <option value="3">Panggilan Orang Tua</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Foto Bukti Pelanggaran (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Tambah Pelanggaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

