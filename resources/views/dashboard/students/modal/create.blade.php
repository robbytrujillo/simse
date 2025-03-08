<div class="modal fade" id="student_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" name="nis" value="{{ old('nis') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Siswa</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select class="form-control" name="class_id" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control" name="gender" required>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dob">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Nama Ayah</label>
                                <input type="text" class="form-control" name="father_name" value="{{ old('father_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email Siswa</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Foto Siswa</label>
                                <input type="file" class="form-control-file" name="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

