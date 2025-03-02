<div class="modal fade" id="teacher_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" value="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birth_place" value="Jakarta" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birth_date" value="1980-01-01" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" required>
                            <option value="L" selected>Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" rows="3" required>Jl. Merdeka No. 10</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" value="08123456789" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="johndoe@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="last_education">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="last_education" value="S1 Pendidikan" required>
                    </div>
                    <div class="form-group">
                        <label for="education_institution">Institusi Pendidikan</label>
                        <input type="text" class="form-control" name="education_institution" value="Universitas Indonesia" required>
                    </div>
                    <div class="form-group">
                        <label for="graduation_year">Tahun Lulus</label>
                        <input type="number" class="form-control" name="graduation_year" value="2005" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">NIP</label>
                        <input type="text" class="form-control" name="employee_id" value="123456789" required>
                    </div>
                    <div class="form-group">
                        <label for="employment_status">Status Pekerjaan</label>
                        <select class="form-control" name="employment_status" required>
                            <option value="PNS" selected>PNS</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" class="form-control" name="position" value="Guru Matematika" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" value="2010-06-01" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Guru</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Guru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

