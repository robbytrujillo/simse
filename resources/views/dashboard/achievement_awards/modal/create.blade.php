<div class="modal fade" id="silabus_create_modal" tabindex="-1" role="dialog" aria-labelledby="createSilabusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createSilabusLabel">Tambah Silabus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('silabuses.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="curriculum_id">Kurikulum</label>
                        <select class="form-control" name="curriculum_id" required>
                            <option value="">Pilih Kurikulum</option>
                            @foreach($curriculums as $curriculum)
                            <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($classlists as $classlist)
                            <option value="{{ $classlist->id }}">{{ $classlist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Isi Konten</label>
                        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Silabus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
