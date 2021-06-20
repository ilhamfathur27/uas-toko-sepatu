<div class="card card-default">
  <div class="card-header card-header-border-bottom">
    <h2>{{ $title }}</h2>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ $api_sepatu }}" id="formSepatu" primary-key="{{ $id_sepatu }}">
      <div class="form-group">
        <label>Nama Sepatu</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Sepatu" value="{{ $sepatu['nama'] }}">
        <span class="mt-2 d-block text-danger input-message"></span>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi">{{ $sepatu['deskripsi'] }}</textarea>
        <span class="mt-2 d-block text-danger input-message"></span>
      </div>
      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ $sepatu['harga'] }}">
        <span class="mt-2 d-block text-danger input-message"></span>
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" placeholder="Stok" value="{{ $sepatu['stok'] }}">
        <span class="mt-2 d-block text-danger input-message"></span>
      </div>
      <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control-file">
        <span class="mt-2 d-block text-danger input-message"></span>
      </div>
      <div class="form-footer pt-4 pt-5 mt-4 border-top">
        <button type="reset" class="btn btn-secondary btn-default">Batal</button>
        <button type="submit" class="btn btn-primary btn-default">Update</button>
      </div>
    </form>
  </div>
</div>
<script>
$("#formSepatu").submit(function(event){
  event.preventDefault();
  const myNode = $(this);
  const primaryKey = myNode.attr("primary-key");
  const formMethod = myNode.attr("method");
  const formAction = myNode.attr("action");
  let formData = new FormData(myNode[0]);

  $.ajax({
    type          : formMethod,
    url           : formAction,
    enctype       : "multipart/form-data",
    data          : formData,
    processData   : false,
    cache         : false,
    contentType   : false,
    dataType      : "JSON",
    success       : function(response){
      if (response.status) {
        toastr.info(response.message);
        window.history.back();
      } else {
        toastr.warning(response.message);
        const errorData = response.error;
        errorData.forEach((item) => {
          myNode.find(`[name="${item.name}"]`).next().html(item.message);
        })
      }
    },
    error         : function(response){
      toastr.error('Maaf, terjadi kesalhan, silahkan cek konsol anda');
    },
    complete      : function() {
      submitButton.html(submitText);
      submitButton.prop("disabled", false);
    }
  });
});
</script>