<div class="modal fade" id="violation_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('violations.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editViolationForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="violation_type">Jenis Pelanggaran</label>
                        <select class="form-control" name="violation_type_id" id="edit_violation_type" required>
                            @foreach ($violationTypes as $type)
                            <option value="{{ $type->id }}" {{ old('violation_type_id', $violation->violation_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Pelanggaran</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pelanggaran</label>
                        <input type="date" class="form-control" name="date" id="edit_date" required>
                    </div>
                    <div class="form-group">
                        <label for="penalty">Sanksi</label>
                        <select class="form-control" name="sanction_type_id" id="edit_penalty" required>
                            @foreach ($sanctionTypes as $type)
                            <option value="{{ $type->id }}" {{ old('sanction_type_id', $violation->sanction_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="edit_student_id" required>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Update Foto Bukti Pelanggaran (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                    </div>
                    <img id="image_preview" src="" alt="Image Preview" class="mt-2" style="max-width: 100px; display: none;">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Pelanggaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
