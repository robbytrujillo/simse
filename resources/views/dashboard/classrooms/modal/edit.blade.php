<div class="modal fade" id="class_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Kelas</label>
                        <input type="text" class="form-control" name="name" id="edit_name" value="Kelas 1A" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="edit_slug" value="kelas-1a" readonly>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Wali Kelas</label>
                        <select class="form-control" name="teacher_id" id="edit_teacher" required>
                            <option value="">Pilih Guru</option>
                            <option value="1">Budi Santoso</option>
                            <option value="2">Ani Suryani</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

