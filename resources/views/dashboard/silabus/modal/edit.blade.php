<!-- Edit Modal for Silabus -->
<div class="modal fade" id="silabus_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editSilabusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="editSilabusLabel">Edit Silabus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_silabus_form"  method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="curriculum_id">Kurikulum</label>
                        <select class="form-control" name="curriculum_id" id="edit_curriculum_id" required>
                            <!-- Static Data for Curriculum -->
                            <option value="1" selected>Kurikulum A</option>
                            <option value="2">Kurikulum B</option>
                            <option value="3">Kurikulum C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" name="class_id" id="edit_class_id" required>
                            <!-- Static Data for Class -->
                            <option value="1" selected>Kelas 1</option>
                            <option value="2">Kelas 2</option>
                            <option value="3">Kelas 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="edit_mapel_id" required>
                            <!-- Static Data for Mapel -->
                            <option value="1" selected>Matematika</option>
                            <option value="2">Fisika</option>
                            <option value="3">Kimia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_content">Konten</label>
                        <textarea class="form-control" name="content" id="edit_content" rows="3" required>Isi silabus disini</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Silabus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

