<div class="modal fade" id="class_create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Kelas</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Wali Kelas</label>
                        <select class="form-control" name="teacher_id" id="edit_teacher" required>
                            <option value="">Pilih Guru</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

