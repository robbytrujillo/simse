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
                <form action="{{ route('violations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" id="class_id" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($classlists as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="student_id" required>
                            <option value="">Pilih Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="violation_type">Jenis Pelanggaran</label>
                        <select class="form-control" name="violation_type_id" id="violation_type_id" required>
                            <option value="">Pilih Jenis Pelanggaran</option>
                            @foreach($violationTypes as $violationType)
                            <option value="{{ $violationType->id }}">{{ $violationType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pelanggaran</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Pelanggaran</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="penalty">Sanksi</label>
                        <select class="form-control" name="sanction_type_id" id="sanction_type_id" required>
                            <option value="">Pilih Jenis Sanksi</option>
                            @foreach($sanctionTypes as $sanctionType)
                            <option value="{{ $sanctionType->id }}">{{ $sanctionType->name }}</option>
                            @endforeach
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
