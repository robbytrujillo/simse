<div class="modal fade" id="inventory_create_modal" tabindex="-1" role="dialog" aria-labelledby="createInventoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-x-purple-blue white">
                <h5 class="modal-title" id="createInventoryLabel">Tambah Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_code">Kode Barang</label>
                                <input type="text" class="form-control" name="item_code" required>
                            </div>
                            <div class="form-group">
                                <label for="item_name">Nama Barang</label>
                                <input type="text" class="form-control" name="item_name" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Meja</option>
                                    <option value="2">Kursi</option>
                                    <option value="3">Komputer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vendor_id">Asal Perolehan</label>
                                <select name="vendor_id" class="form-control" required>
                                    <option value="">Pilih Asal</option>
                                    <option value="1">Dana Sekolah</option>
                                    <option value="2">Dana BOS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Jumlah</label>
                                <input type="number" class="form-control" name="quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select class="form-control" name="class_id" required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="1" >Kelas A</option>
                                    <option value="2" >Kelas B</option>
                                    <option value="3" >Kelas C</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="condition">Kondisi</label>
                                <select name="condition" class="form-control" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="procurement_date">Tanggal Pengadaan</label>
                                <input type="date" class="form-control" name="procurement_date" required>
                            </div>
                            <div class="form-group">
                                <label for="remarks">Keterangan</label>
                                <textarea class="form-control" name="remarks" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-bg-gradient-x-purple-blue">Tambah Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
