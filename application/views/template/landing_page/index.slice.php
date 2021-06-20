<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ isset($judul) ? $judul : "TOKO SEPATU" }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ base_url('assets/landing-page/css/style.css') }}" />
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="{{ base_url('assets/landing-page/img/logo/logo.png') }}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <header>
      <!-- Header Start -->
      <div class="header-area">
        <div class="main-header">
          <!-- <div class="header-top top-bg d-none d-lg-block">
            <div class="container-fluid">
              <div class="col-xl-12">
                <div
                  class="row d-flex justify-content-between align-items-center"
                >
                  <div class="header-info-left d-flex">
                    <div class="flag">
                      <img src="assets/img/icon/header_icon.png" alt="" />
                    </div>
                    <div class="select-this">
                      <form action="#">
                        <div class="select-itms">
                          <select name="select" id="select1">
                            <option value="">USA</option>
                            <option value="">SPN</option>
                            <option value="">CDA</option>
                            <option value="">USD</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <ul class="contact-now">
                      <li>+777 2345 7886</li>
                    </ul>
                  </div>
                  <div class="header-info-right">
                    <ul>
                      <li><a href="login.html">My Account </a></li>
                      <li><a href="product_list.html">Wish List </a></li>
                      <li><a href="cart.html">Shopping</a></li>
                      <li><a href="cart.html">Cart</a></li>
                      <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="header-bottom header-sticky">
            <div class="container-fluid">
              <div class="d-flex align-items-center">
                
                <div class="col-auto">
                  <div class="logo">
                    <a href="{{ site_url() }}">
                      <img src="{{ base_url('assets/landing-page/img/logo/logo.png') }}" alt=""/>
                    </a>
                  </div>
                </div>
                <div class="flex-grow-1 d-flex align-items-center justify-content-end">
                  <div class="col-auto">
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                      <nav>
                        <ul id="navigation">
                          <li><a href="{{ site_url() }}">Home</a></li>
                          <li><a href="{{ site_url('products') }}">Product List</a></li>
                          <li><a href="{{ site_url('contact') }}">Contact</a></li>
                          @if(user('user_login'))
                            <li><a href="{{ site_url('checkout') }}">Checkout</a></li>
                          @endif
                        </ul>
                      </nav>
                    </div>
                  </div>
                  <div class="col-auto">
                    <ul
                      class="header-right f-right d-none d-lg-block d-flex justify-content-between"
                    >
                      <li class="d-none d-xl-block">
                        <div class="form-box f-right">
                          <input
                            type="text"
                            name="Search"
                            placeholder="Search products"
                          />
                          <div class="search-icon">
                            <i class="fas fa-search special-tag"></i>
                          </div>
                        </div>
                      </li>
                      @if(user('user_login'))
                        <li>
                          <div class="shopping-card" total="{{ $jumlah_isi_keranjang }}">
                            <a href="{{ site_url("keranjang") }}"
                              ><i class="fas fa-shopping-cart"></i
                            ></a>
                          </div>
                        </li>
                      @endif

                      @if(user('user_login'))
                        <li class="d-none d-lg-block">
                          <a href="{{ site_url('logout') }}" class="btn header-btn">Logout</a>
                        </li>
                      @else
                        <li class="d-none d-lg-block">
                          <a href="{{ site_url('login') }}" class="btn header-btn">Login</a>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
                
              </div>
              <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header End -->
    </header>
    <main>
      {{ $contents }}
    </main>
    <footer>
      <!-- Footer Start-->
      <div class="footer-area footer-padding">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">
                  <!-- logo -->
                  <div class="footer-logo">
                    <a href="index.html">
                      <img src="{{ base_url('assets/landing-page/img/logo/logo2_footer.png') }}" alt=""/>
                    </a>
                  </div>
                  <div class="footer-tittle">
                    <div class="footer-pera">
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                        sed do eiusmod tempor incididunt ut labore.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Quick Links</h4>
                  <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#"> Offers & Discounts</a></li>
                    <li><a href="#"> Get Coupon</a></li>
                    <li><a href="#"> Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>New Products</h4>
                  <ul>
                    <li><a href="#">Woman Cloth</a></li>
                    <li><a href="#">Fashion Accessories</a></li>
                    <li><a href="#"> Man Accessories</a></li>
                    <li><a href="#"> Rubber made Toys</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Support</h4>
                  <ul>
                    <li><a href="#">Frequently Asked Questions</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Report a Payment Issue</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Footer bottom -->
          <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7">
              <div class="footer-copy-right">
                <p>
                  Created by Ilham Fathur
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                </p>
              </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5">
              <div class="footer-copy-right f-right">
                <!-- social -->
                <div class="footer-social">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-behance"></i></a>
                  <a href="#"><i class="fas fa-globe"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer End-->
    </footer>

    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ base_url('assets/landing-page/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ base_url('assets/landing-page/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/popper.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ base_url('assets/landing-page/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ base_url('assets/landing-page/js/owl.carousel.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/slick.min.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ base_url('assets/landing-page/js/wow.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/animated.headline.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ base_url('assets/landing-page/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ base_url('assets/landing-page/js/contact.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.form.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.validate.min.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/mail-script.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ base_url('assets/landing-page/js/plugins.js') }}"></script>
    <script src="{{ base_url('assets/landing-page/js/main.js') }}"></script>
  </body>
</html>
