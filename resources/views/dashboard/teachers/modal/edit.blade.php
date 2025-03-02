<!-- Edit Teacher Modal -->
<div class="modal fade" id="teacher_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-blue-green white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" id="editTeacherForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" id="edit_full_name" value="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" class="form-control" name="position" id="edit_position" value="Guru Matematika" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="edit_gender" required>
                            <option value="L" id="edit_gender_l" selected>Laki-laki</option>
                            <option value="P" id="edit_gender_p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birth_place" id="edit_birth_place" value="Jakarta" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birth_date" id="edit_birth_date" value="1980-05-10" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="edit_address" rows="3" required>Jl. Raya No. 10, Jakarta</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" id="edit_phone" value="08123456789" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_email" value="johndoe@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="last_education">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="last_education" id="edit_last_education" value="S1 Pendidikan Matematika" required>
                    </div>
                    <div class="form-group">
                        <label for="education_institution">Institusi Pendidikan</label>
                        <input type="text" class="form-control" name="education_institution" id="edit_education_institution" value="Universitas Jakarta" required>
                    </div>
                    <div class="form-group">
                        <label for="graduation_year">Tahun Lulus</label>
                        <input type="number" class="form-control" name="graduation_year" id="edit_graduation_year" value="2005" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">NIP</label>
                        <input type="text" class="form-control" name="employee_id" id="edit_employee_id" value="1234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="employment_status">Status Pekerjaan</label>
                        <select class="form-control" name="employment_status" id="edit_employment_status" required>
                            <option value="PNS" selected>PNS</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" id="edit_start_date" value="2006-07-01" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Guru</label>
                        <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                    </div>
                    <img id="image_preview" src="" alt="Image Preview" class="mt-2" style="max-width: 100px; display: none;">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Guru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

