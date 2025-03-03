<div class="modal fade" id="announcement_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editAnnouncementLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="editAnnouncementLabel">Edit Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Judul Pengumuman</label>
                        <input type="text" class="form-control" name="title" id="edit_title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten Pengumuman</label>
                        <textarea class="form-control" name="content" id="edit_content" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Terbit</label>
                        <input type="date" class="form-control" name="published_at" id="edit_published_at" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

