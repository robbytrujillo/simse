<!-- Delete Confirmation Modal for Achievement Type -->
<div class="modal fade" id="delete_achievement_type_modal" tabindex="-1" role="dialog" aria-labelledby="deleteAchievementTypeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="deleteAchievementTypeLabel">Konfirmasi Penghapusan Jenis Pencapaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jenis pencapaian ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="delete_achievement_type_form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Jenis Pencapaian</button>
                </form>
            </div>
        </div>
    </div>
</div>

