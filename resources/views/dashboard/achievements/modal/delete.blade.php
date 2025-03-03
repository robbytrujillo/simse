<!-- Delete Confirmation Modal for Achievement -->
<div class="modal fade" id="delete_achievement_modal" tabindex="-1" role="dialog" aria-labelledby="deleteAchievementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-red-pink white">
                <h5 class="modal-title" id="deleteAchievementModalLabel">Konfirmasi Penghapusan Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus prestasi ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="delete_achievement_form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Prestasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

