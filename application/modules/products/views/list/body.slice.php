<div class="slider-area ">
  <!-- Mobile Menu -->
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ base_url('assets/landing-page/img/hero/category.jpg')}}" style="background-image: url(&quot;assets/landing-page/img/hero/category.jpg&quot;);">
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

<section class="product_list section_padding">
  <div class="container">
    <div class="product_list">
        <div class="row">
            @foreach($data_sepatu as $sepatu)
            <div class="col-lg-6 col-sm-6">
                <div class="single_product_item">
                    <img src="{{ base_url('uploads/images/sepatu/'.$sepatu['foto']) }}" alt="" class="img-fluid">
                    <h3>
                        <a href="{{ site_url('products/detail/'.$sepatu['id_sepatu']) }}">{{ $sepatu['nama'] }}</a>
                    </h3>
                    <p>Rp. {{ $sepatu['harga'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="load_more_btn text-center">
            <button type="button" class="btn_3" onclick="loadMoreSepatu()">Load More</button>
        </div> -->
    </div>
  </div>
</section>

<section class="client_review">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="client_review_slider owl-carousel owl-loaded owl-drag">
                  
                  
                  
              <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3000px, 0px, 0px); transition: all 0.25s ease 0s; width: 5250px;"><div class="owl-item cloned" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client_1.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item cloned" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client_2.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client_1.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item active" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client_2.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item cloned" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div><div class="owl-item cloned" style="width: 750px;"><div class="single_client_review">
                      <div class="client_img">
                          <img src="assets/img/client_1.png" alt="#">
                      </div>
                      <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                      <h5>- Micky Mouse</h5>
                  </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"> <i class="ti-angle-left"></i> </button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i> </button></div><div class="owl-dots disabled"></div></div>
          </div>
      </div>
  </div>
</section>

<div class="shop-method-area section-padding30">
  <div class="container">
      <div class="row d-flex justify-content-between">
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="single-method mb-40">
                  <i class="ti-package"></i>
                  <h6>Free Shipping Method</h6>
                  <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
              </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="single-method mb-40">
                  <i class="ti-unlock"></i>
                  <h6>Secure Payment System</h6>
                  <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
              </div>
          </div> 
          <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="single-method mb-40">
                  <i class="ti-reload"></i>
                  <h6>Secure Payment System</h6>
                  <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
              </div>
          </div>
      </div>
  </div>
</div>

<section class="subscribe_part section_padding">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="subscribe_part_content">
                  <h2>Get promotions &amp; updates!</h2>
                  <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                  <div class="subscribe_form">
                      <input type="email" placeholder="Enter your mail">
                      <a href="#" class="btn_1">Subscribe</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>