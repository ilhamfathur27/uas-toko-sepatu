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
            @foreach($data_keranjang as $keranjang)
            <tr>
              <td style="width: 730px">
                <div class="media">
                  <div class="d-flex">
                    <img src="assets/img/arrivel/arrivel_1.png" alt="">
                  </div>
                  <div class="media-body">
                    <p>{{ $keranjang['nama_sepatu'] }}</p>
                  </div>
                </div>
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
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td class="text-right">
                <h5>Rp. {{ "5000" }}</h5>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
          <a class="btn_1 checkout_btn_1" href="#">CHECKOUT</a>
        </div>
      </div>
    </div>
  </div>
</section>