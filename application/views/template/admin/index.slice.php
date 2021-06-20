<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $judul }}</title>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
      rel="stylesheet"
    />
    <link
      href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <link href="{{ base_url('assets/admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ base_url('assets/admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link
      href="{{ base_url('assets/admin/plugins/flag-icons/css/flag-icon.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}"
      rel="stylesheet"
    />
    <link href="{{ base_url('assets/admin/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ base_url('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link
      href="{{ base_url('assets/admin/plugins/daterangepicker/daterangepicker.css') }}"
      rel="stylesheet"
    />
    <link id="sleek-css" rel="stylesheet" href="{{ base_url('assets/admin/css/sleek.css') }}" />
    <link href="{{ base_url('assets/images/icon.png') }}" rel="shortcut icon" />
    <script src="{{ base_url('assets/admin/plugins/nprogress/nprogress.js') }}"></script>
    
    <script src="{{ base_url('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
  </head>

  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      <!--
====================================
——— LEFT SIDEBAR WITH FOOTER
=====================================
-->
      <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
          <!-- Aplication Brand -->
          <div class="app-brand">
            <a href="{{ site_url() }}">
              <img src="{{ base_url('assets/images/icon.png') }}" width="30px" />
              <span class="brand-name">XTRALACES</span>
            </a>
          </div>
          <!-- begin sidebar scrollbar -->
          <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
              <li>
                <a href="{{ site_url('dashboard') }}" class="sidenav-item-link">
                  <i class="mdi mdi-view-dashboard-outline"></i>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li class="has-sub">
                <a
                  class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#sepatu"
                  aria-expanded="false"
                  aria-controls="sepatu"
                >
                  <i class="mdi mdi-magnify"></i>
                  <span class="nav-text">SEPATU</span> <b class="caret"></b>
                </a>
                <ul class="collapse" id="sepatu" data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    <li>
                      <a class="sidenav-item-link" href="{{ site_url("sepatu/create") }}">
                        <span class="nav-text">TAMBAH</span>
                      </a>
                    </li>
                    <li>
                      <a class="sidenav-item-link" href="{{ site_url("sepatu/list") }}">
                        <span class="nav-text">LIST</span>
                      </a>
                    </li>
                  </div>
                </ul>
              </li>

              <li>
                <a href="{{ site_url('transaksi-admin') }}" class="sidenav-item-link">
                  <i class="mdi mdi-book-open-page-variant"></i>
                  <span class="nav-text">Transaksi</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </aside>

      <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header" id="header">
          <nav class="navbar navbar-static-top navbar-expand-lg">
            <!-- Sidebar toggle button -->
            <button id="sidebar-toggler" class="sidebar-toggle">
              <span class="sr-only">Toggle navigation</span>
            </button>
            <!-- search form -->
            <div class="search-form d-none d-lg-inline-block">
              <div class="input-group">
                <button
                  type="button"
                  name="search"
                  id="search-btn"
                  class="btn btn-flat"
                >
                  <i class="mdi mdi-magnify"></i>
                </button>
                <input
                  type="text"
                  name="query"
                  id="search-input"
                  class="form-control"
                  placeholder="'button', 'chart' etc."
                  autofocus
                  autocomplete="off"
                />
              </div>
              <div id="search-results-container">
                <ul id="search-results"></ul>
              </div>
            </div>

            <div class="navbar-right">
              <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                  <button
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown"
                  >
                    <span class="d-none d-lg-inline-block">{{ user('nama') }}</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User image -->
                    <li class="dropdown-header">
                      <div class="d-inline-block">
                        {{ user('nama') }} <small class="pt-1">{{ user('email') }}</small>
                      </div>
                    </li>

                    <li>
                      <a href="{{ site_url('logout') }}">
                        <i class="mdi mdi-logout"></i> Log Out
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <div class="content-wrapper">
          <div class="content">
            {{ $contents }}
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM"
      defer
    ></script>
    <script src="{{ base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ base_url('assets/admin/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ base_url('assets/admin/js/sleek.js') }}"></script>
    <script src="{{ base_url('assets/admin/js/chart.js') }}"></script>
    <script src="{{ base_url('assets/admin/js/date-range.js') }}"></script>
    <script src="{{ base_url('assets/admin/js/map.js') }}"></script>
    <script src="{{ base_url('assets/admin/js/custom.js') }}"></script>
  </body>
</html>
