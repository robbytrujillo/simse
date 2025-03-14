<div class="modal fade" id="kurikulum_create_modal" tabindex="-1" role="dialog" aria-labelledby="createKurikulumLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createKurikulumLabel">Tambah Kurikulum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('curriculums.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Kurikulum</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="academic_year">Tahun Akademik</label>
                        <input type="text" class="form-control" name="academic_year" id="academic_year" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Kurikulum</label>
                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Kurikulum</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

