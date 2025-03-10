<div class="modal fade" id="delete_sanction_type_modal" tabindex="-1" role="dialog" aria-labelledby="deleteSanctionTypeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="deleteSanctionTypeLabel">Konfirmasi Penghapusan Jenis Sanksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus jenis sanksi ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="delete_sanction_type_form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Jenis Sanksi</button>
                </form>
            </div>
        </div>
    </div>
</div>

