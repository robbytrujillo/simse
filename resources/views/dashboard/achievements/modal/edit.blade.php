<div class="modal fade" id="achievement_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('achievements.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editAchievementForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="student_id">Siswa</label>
                        <select class="form-control" name="student_id" id="edit_student_id" required>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id', $achievement->student_id ?? '') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="achievement_type_id">Jenis Prestasi</label>
                        <select class="form-control" name="achievement_type_id" id="achievement_type_id" required>
                            <option value="">Pilih Prestasi</option>
                            @foreach($achievementstype as $achievementtype)
                            <option value="{{ $achievementtype->id }}"
                                {{ old('achievement_type_id', $achievement->achievement_type_id ?? '') == $achievementtype->id ? 'selected' : '' }}>
                                {{ $achievementtype->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Prestasi</label>
                        <input type="date" class="form-control" name="date" id="edit_date" value="{{ old('date', $achievement->date ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Prestasi</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3" required>{{ old('description', $achievement->description ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Hadiah / Penghargaan</label>
                        <select class="form-control" name="achievement_reward_id" id="achievement_reward_id" required>
                            <option value="">Pilih Hadiah</option>
                            @foreach($achievementsaward as $achievementaward)
                            <option value="{{ $achievementaward->id }}"
                                {{ old('achievement_reward_id', $achievement->achievement_reward_id ?? '') == $achievementaward->id ? 'selected' : '' }}>
                                {{ $achievementaward->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Update Foto Bukti Prestasi (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image" id="edit_image" accept="image/*">
                    </div>
                    <img id="image_preview" src="" alt="Image Preview" class="mt-2" style="max-width: 100px; display: none;">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Prestasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
