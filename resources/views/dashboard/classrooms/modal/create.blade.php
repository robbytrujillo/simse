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
                <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_place">Tempat Lahir</label>
                        <input type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" required>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" rows="3" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_education">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="last_education" value="{{ old('last_education') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="education_institution">Institusi Pendidikan</label>
                        <input type="text" class="form-control" name="education_institution" value="{{ old('education_institution') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="graduation_year">Tahun Lulus</label>
                        <input type="number" class="form-control" name="graduation_year" value="{{ old('graduation_year') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">NIP</label>
                        <input type="text" class="form-control" name="employee_id" value="{{ old('employee_id') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="employment_status">Status Pekerjaan</label>
                        <select class="form-control" name="employment_status" required>
                            <option value="">Pilih Status Pekerjaan</option>
                            <option value="PNS" {{ old('employment_status') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="Honorer" {{ old('employment_status') == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                            <option value="Kontrak" {{ old('employment_status') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" class="form-control" name="position" value="{{ old('position') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Guru</label>
                        <input type="file" class="form-control-file" name="image" >
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
