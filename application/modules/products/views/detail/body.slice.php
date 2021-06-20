<div class="slider-area">
  <div
    class="single-slider slider-height2 d-flex align-items-center"
    data-background="{{ base_url('assets/landing-page/img/hero/category.jpg')}}"
    style="background-image: url('assets/landing-page/img/hero/category.jpg')"
  >
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2>Product List</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="product_image_area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="product_img_slide owl-carousel owl-loaded owl-drag">
          <div class="owl-stage-outer">
            <div
              class="owl-stage"
              style="
                transform: translate3d(-2280px, 0px, 0px);
                transition: all 0s ease 0s;
                width: 7980px;
              "
            >
              <div class="owl-item cloned" style="width: 1140px">
                <div class="single_product_img">
                  <img
                    src="{{ base_url('uploads/images/sepatu/'.$sepatu['foto']) }}"
                    alt="#"
                    class="img-fluid"
                    height="200px"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev">
              <i class="ti-angle-left"></i></button
            ><button type="button" role="presentation" class="owl-next">
              <i class="ti-angle-right"></i>
            </button>
          </div>
          <div class="owl-dots disabled"></div>
        </div>
      </div>
      <div class="col-lg-8">
        <div
          class="single_product_text text-center"
          harga="{{ $sepatu['harga'] }}"
        >
          <h3>{{ $sepatu["nama"] }}</h3>
          <p>{{ $sepatu["deskripsi"] }}</p>
          <div class="card_area">
            <div class="product_count_area">
              <p>Kuantitas</p>
              <div class="product_count d-inline-block">
                <span class="product_count_item inumber-decrement">
                  <i class="ti-minus"></i
                ></span>
                <input
                  class="product_count_item input-number"
                  type="text"
                  value="1"
                  min="0"
                  max="10"
                />
                <span class="product_count_item number-increment">
                  <i class="ti-plus"></i
                ></span>
              </div>
              <p id="totalHarga">Rp. <span>{{ $sepatu['harga'] }}</span></p>
            </div>
            <div class="add_to_cart">
              <a href="#" class="btn_3">TAMBAH KE KERANJANG</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>