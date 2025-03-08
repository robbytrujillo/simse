<div class="modal fade" id="student_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('students.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editStudentForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="edit_nis" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Siswa</label>
                        <input type="text" class="form-control" name="email" id="edit_email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="edit_gender" required>
                            <option value="L" id="edit_gender_l">Laki-laki</option>
                            <option value="P" id="edit_gender_p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dob">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="dob" id="edit_dob" required>
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
                        <label for="father_name">Nama Ayah</label>
                        <input type="text" class="form-control" name="father_name" id="edit_father_name" required>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" id="edit_class_id" required>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Siswa</label>
                        <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                    </div>
                    <img id="image_preview" src="" alt="Image Preview" class="mt-2" style="max-width: 100px; display: none;">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
