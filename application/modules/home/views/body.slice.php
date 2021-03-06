
<!-- slider Area Start -->
<div class="slider-area">
  <!-- Mobile Menu -->
  <div class="slider-active">
    <div
      class="single-slider slider-height"
      data-background="{{ base_url('assets/landing-page/img/hero/h1_hero.jpg') }}"
    >
      <div class="container">
        <div
          class="row d-flex align-items-center justify-content-between"
        >
          <div
            class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block"
          >
            <div
              class="hero__img"
              data-animation="bounceIn"
              data-delay=".4s"
            >
              <img src="{{ base_url('assets/landing-page/img/hero/hero_man.png') }}" alt="" />
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
            <div class="hero__caption">
              <h1 data-animation="fadeInRight" data-delay=".6s">
                SMALL <br />
                BUT SURE
              </h1>
              <p data-animation="fadeInRight" data-delay=".8s">
                XTRALACES
              </p>
              <!-- Hero-btn -->
              <div
                class="hero__btn"
                data-animation="fadeInRight"
                data-delay="1s"
              >
                <a href="{{ site_url('products') }}" class="btn hero-btn"
                  >Shop Now</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="single-slider slider-height"
      data-background="{{ base_url('assets/landing-page/img/hero/h1_hero.jpg') }}"
    >
      <div class="container">
        <div
          class="row d-flex align-items-center justify-content-between"
        >
          <div
            class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block"
          >
            <div
              class="hero__img"
              data-animation="bounceIn"
              data-delay=".4s"
            >
              <img src="{{ base_url('assets/landing-page/img/hero/hero_man.png') }}" alt="" />
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
            <div class="hero__caption">
              <span data-animation="fadeInRight" data-delay=".4s"
                >60% Discount</span
              >
              <h1 data-animation="fadeInRight" data-delay=".6s">
                Winter <br />
                Collection
              </h1>
              <p data-animation="fadeInRight" data-delay=".8s">
                Best Cloth Collection By 2020!
              </p>
              <!-- Hero-btn -->
              <div
                class="hero__btn"
                data-animation="fadeInRight"
                data-delay="1s"
              >
                <a href="industries.html" class="btn hero-btn"
                  >Shop Now</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- slider Area End-->

<!-- Latest Products Start -->
<section class="latest-product-area padding-bottom section-padding30">
  <div class="container">
    <div
      class="row product-btn d-flex justify-content-end align-items-end"
    >
      <!-- Section Tittle -->
      <div class="col-12">
        <div class="section-tittle mb-30">
          <h2>Best Products</h2>
        </div>
      </div>
    </div>
    <!-- Nav Card -->
    <div class="tab-content" id="nav-tabContent">
      <!-- card one -->
      <div
        class="tab-pane fade show active"
        id="nav-home"
        role="tabpanel"
        aria-labelledby="nav-home-tab"
      >
        <div class="row">
          @foreach($data_sepatu as $sepatu)
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="single-product mb-60">
                <div class="product-img">
                  <a href="{{ site_url('products/detail/'.$sepatu['id_sepatu']) }}">
                    <img src="{{ base_url('uploads/images/sepatu/'.$sepatu['foto']) }}" alt="" />
                  </a>
                  <div class="new-product">
                    <span>BEST SELLER</span>
                  </div>
                </div>
                <div class="product-caption">
                  <h4>
                    <a href="{{ site_url('products/detail/'.$sepatu['id_sepatu']) }}">
                      {{ $sepatu['nama'] }}
                    </a>
                  </h4>
                  <div class="price">
                    <ul>
                      <li>Rp. {{ $sepatu['harga'] }}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <!-- Card two -->
      <div
        class="tab-pane fade"
        id="nav-profile"
        role="tabpanel"
        aria-labelledby="nav-profile-tab"
      >
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product4.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product5.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product6.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product2.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product3.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product1.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card three -->
      <div
        class="tab-pane fade"
        id="nav-contact"
        role="tabpanel"
        aria-labelledby="nav-contact-tab"
      >
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product2.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product3.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product1.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product4.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product6.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product5.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- card foure -->
      <div
        class="tab-pane fade"
        id="nav-last"
        role="tabpanel"
        aria-labelledby="nav-last-tab"
      >
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product1.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product2.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product3.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product4.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product5.png') }}" alt="" />
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-product mb-60">
              <div class="product-img">
                <img src="{{ base_url('assets/landing-page/img/categori/product6.png') }}" alt="" />
                <div class="new-product">
                  <span>New</span>
                </div>
              </div>
              <div class="product-caption">
                <div class="product-ratting">
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star low-star"></i>
                  <i class="far fa-star low-star"></i>
                </div>
                <h4><a href="#">Green Dress with details</a></h4>
                <div class="price">
                  <ul>
                    <li>$40.00</li>
                    <li class="discount">$60.00</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Nav Card -->
  </div>
</section>
<!-- Latest Products End -->

<!-- Latest Offers Start -->
<div class="latest-wrapper lf-padding">
  <div
    class="latest-area latest-height d-flex align-items-center"
    data-background="{{ base_url('assets/landing-page/img/collection/latest-offer.png') }}"
  >
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
          <div class="latest-caption">
            <h2>Get Our<br />Latest Offers News</h2>
            <p>Subscribe news latter</p>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-6">
          <div class="latest-subscribe">
            <form action="#">
              <input type="email" placeholder="Your email here" />
              <button>Shop Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- man Shape -->
    <div class="man-shape">
      <img src="{{ base_url('assets/landing-page/img/collection/latest-man.png') }}" alt="" />
    </div>
  </div>
</div>
<!-- Latest Offers End -->