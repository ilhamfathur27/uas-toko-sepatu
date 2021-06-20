<div class="slider-area ">
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ base_url('assets/landing-page/img/hero/category.jpg')}}" style="background-image: url(&quot;assets/landing-page/img/hero/category.jpg&quot;);">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="hero-cap text-center">
                      <h2>TRANSAKSI</h2>
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
              <th scope="col">Id Transaksi</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Total Harga</th>
              <th scope="col" class="text-right">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_keranjang as $keranjang)
            <tr>
              <td class="text-left">
                <h5>{{ $keranjang['nama_sepatu'] }}</h5>
              </td>
              <td>
                <h5>Rp. {{ $keranjang['harga'] }}</h5>
              </td>
              <td>
                <div class="product_count">
                  <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                  <input class="input-number" type="text" value="{{ $keranjang['kuantitas'] }}" min="0" max="10">
                  <span class="input-number-increment"> <i class="ti-plus"></i></span>
                </div>
              </td>
              <td class="text-right">
                <h5>Rp. {{ $keranjang['total_harga'] }}</h5>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>