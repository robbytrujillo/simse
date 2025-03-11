<div class="modal fade" id="achievement_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pencapaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="class_id">Jenis Pencapaian</label>
                        <select class="form-control" name="achievement_type_id" id="achievement_type_id" required>
                            <option value="">Pilih Pencapaian</option>
                            @foreach($achievementstype as $achievementtype)
                            <option value="{{ $achievementtype->id }}">{{ $achievementtype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pencapaian</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Pencapaian</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Hadiah / Penghargaan</label>
                        <select class="form-control" name="achievement_reward_id" id="achievement_reward_id" required>
                            <option value="">Pilih Hadiah</option>
                            @foreach($achievementsaward as $achievementaward)
                            <option value="{{ $achievementaward->id }}">{{ $achievementaward->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Foto Bukti Pencapaian (Jika ada)</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Tambah Pencapaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
