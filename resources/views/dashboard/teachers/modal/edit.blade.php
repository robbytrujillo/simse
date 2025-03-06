<div class="modal fade" id="teacher_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editTeacherForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" id="edit_full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" class="form-control" name="position" id="edit_position" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="edit_gender" required>
                            <option value="L" id="edit_gender_l">Laki-laki</option>
                            <option value="P" id="edit_gender_p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birth_place" id="edit_birth_place" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birth_date" id="edit_birth_date" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="edit_address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" id="edit_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_email" required>
                    </div>
                    <div class="form-group">
                        <label for="last_education">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="last_education" id="edit_last_education" required>
                    </div>
                    <div class="form-group">
                        <label for="education_institution">Institusi Pendidikan</label>
                        <input type="text" class="form-control" name="education_institution" id="edit_education_institution" required>
                    </div>
                    <div class="form-group">
                        <label for="graduation_year">Tahun Lulus</label>
                        <input type="number" class="form-control" name="graduation_year" id="edit_graduation_year" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">NIP</label>
                        <input type="text" class="form-control" name="employee_id" id="edit_employee_id" required>
                    </div>
                    <div class="form-group">
                        <label for="employment_status">Status Pekerjaan</label>
                        <select class="form-control" name="employment_status" id="edit_employment_status" required>
                            <option value="">Pilih Status Pekerjaan</option>
                            <option value="PNS" {{ old('employment_status', $teacher->employment_status ?? '') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="Honorer" {{ old('employment_status', $teacher->employment_status ?? '') == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                            <option value="Kontrak" {{ old('employment_status', $teacher->employment_status ?? '') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" id="edit_start_date" required>
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
