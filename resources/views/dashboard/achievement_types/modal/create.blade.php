<div class="modal fade" id="achievement_type_create_modal" tabindex="-1" role="dialog" aria-labelledby="createAchievementTypeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createAchievementTypeLabel">Tambah Jenis Pencapaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('achievement-types.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Jenis Pencapaian</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Jenis Pencapaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

