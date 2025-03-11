<div class="modal fade" id="kurikulum_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editKurikulumLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="editKurikulumLabel">Edit Kurikulum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_kurikulum_form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_nama_kurikulum">Nama Kurikulum</label>
                        <input type="text" class="form-control" name="name" id="edit_nama_kurikulum" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_academic_year">Tahun Akademik</label>
                        <input type="text" class="form-control" name="academic_year" id="edit_academic_year" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Deskripsi</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Kurikulum</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

