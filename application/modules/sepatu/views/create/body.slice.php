<div class="card card-default">
  <div class="card-header card-header-border-bottom">
    <h2>Tambah Sepatu</h2>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ $api_add_sepatu }}">
      <div class="form-group">
        <label>Nama Sepatu</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Sepatu">
        <span class="mt-2 d-block text-danger"></span>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi"></textarea>
        <span class="mt-2 d-block text-danger"></span>
      </div>
      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" placeholder="Harga">
        <span class="mt-2 d-block text-danger"></span>
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" placeholder="Stok">
        <span class="mt-2 d-block text-danger"></span>
      </div>
      <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control-file">
      </div>
      <div class="form-footer pt-4 pt-5 mt-4 border-top">
        <button type="reset" class="btn btn-secondary btn-default">Batal</button>
        <button type="submit" class="btn btn-primary btn-default">Tambah</button>
      </div>
    </form>
  </div>
</div>