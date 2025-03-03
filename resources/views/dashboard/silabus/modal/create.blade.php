<!-- Create Modal for Silabus -->
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
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="curriculum_id">Kurikulum</label>
                        <select class="form-control" name="curriculum_id" required>
                            <option value="">Pilih Kurikulum</option>
                            <!-- Static Data for Curriculum -->
                            <option value="1">Kurikulum A</option>
                            <option value="2">Kurikulum B</option>
                            <option value="3">Kurikulum C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" required>
                            <option value="">Pilih Kelas</option>
                            <!-- Static Data for Class -->
                            <option value="1">Kelas 1</option>
                            <option value="2">Kelas 2</option>
                            <option value="3">Kelas 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            <!-- Static Data for Mapel -->
                            <option value="1">Matematika</option>
                            <option value="2">Fisika</option>
                            <option value="3">Kimia</option>
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

