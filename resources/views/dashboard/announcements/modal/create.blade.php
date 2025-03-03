<div class="modal fade" id="announcement_create_modal" tabindex="-1" role="dialog" aria-labelledby="createAnnouncementLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createAnnouncementLabel">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Pengumuman</label>
                        <input type="text" class="form-control" name="title" id="create_title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten Pengumuman</label>
                        <textarea class="form-control" name="content" id="create_content" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="published_at">Tanggal Terbit</label>
                        <input type="date" class="form-control" name="published_at" id="create_published_at" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

