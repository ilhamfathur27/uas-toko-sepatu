<div class="slider-area ">
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ base_url('assets/landing-page/img/hero/category.jpg')}}" style="background-image: url(&quot;assets/landing-page/img/hero/category.jpg&quot;);">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="hero-cap text-center">
                      <h2>KERANJANG</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
<section class="cart_area section_padding">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Sepatu</th>
              <th scope="col">Harga</th>
              <th scope="col">Kuantitas</th>
              <th scope="col" class="text-right">Total</th>
            </tr>
          </thead>
          <tbody>
            @php
              $subtotal = 0;
            @endphp
            @foreach($data_keranjang as $keranjang)
            @php
              $subtotal += $keranjang['total_harga'];
            @endphp
            <tr>
              <td style="width: 730px">
                <div class="media">
                  <div class="d-flex">
                    <a href="{{ site_url('products/detail/'.$keranjang['id_sepatu']) }}">
                      <img src="{{ base_url('uploads/images/sepatu/'.$keranjang['foto']) }}" width="100px" alt="">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="{{ site_url('products/detail/'.$keranjang['id_sepatu']) }}">
                      <p>{{ $keranjang['nama_sepatu'] }}</p>
                    </a>
                  </div>
                </div>
              </td>
              <td>
                <h5>Rp. {{ $keranjang['harga'] }}</h5>
              </td>
              <td>
                <h4>{{ $keranjang['kuantitas'] }}</h4>
              </td>
              <td class="text-right">
                <h5>Rp. {{ $keranjang['total_harga'] }}</h5>
              </td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td class="text-right">
                <h5>Rp. {{ $subtotal }}</h5>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
          <button type="button" class="btn_1 checkout_btn_1" data-toggle="modal" data-target="#exampleModal">CHECKOUT</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ $api_checkout }}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CHECKOUT PRODUK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Kota</label>
            <input type="text" class="form-control" name="kota" aria-describedby="kotaHelp" placeholder="Kota">
            <small id="kotaHelp" class="form-text text-muted text-danger"></small>
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" aria-describedby="kecamatanHelp" placeholder="Kecamatan">
            <small id="kecamatanHelp" class="form-text text-muted text-danger"></small>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" aria-describedby="alamatHelp" placeholder="Alamat"></textarea>
            <small id="alamatHelp" class="form-text text-muted text-danger"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
          <button type="submit" class="btn btn-primary">PROCESS CHECKOUT</button>
        </div>
      </form>
    </div>
  </div>
</div>