
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $judul }}</title>
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ base_url('assets/admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
  <link id="sleek-css" rel="stylesheet" href="{{ base_url('assets/admin/css/sleek.css') }}" />
  <link href="{{ base_url('assets/admin/img/favicon.png') }}" rel="shortcut icon" />
  <script src="{{ base_url('assets/admin/plugins/nprogress/nprogress.js') }}"></script>
</head>
</head>
  <body class="bg-light-gray" id="body">
    <div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-4">
      <div class="col-xl-5 col-lg-6 col-md-10">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="app-brand">
              <a href="{{ site_url() }}">
                <span class="brand-name">XTRALACES HOME</span>
              </a>
            </div>
          </div>
          <div class="card-body p-5">

            <h4 class="text-dark mb-5">Register</h4>
            <form method="POST" action="{{ $register_api }}" id="formRegister" redirect="{{ $success_redirect }}">

              <div class="row">
                <div class="form-group col-md-12 mb-4">
                  <input type="text" name="nama" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Nama">
                  <p class="mt-2 text-danger"></p>
                </div>
                <div class="form-group col-md-12 mb-4">
                  <input type="text" name="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Email">
                  <p class="mt-2 text-danger"></p>
                </div>
                <div class="form-group col-md-12 ">
                  <input type="password" name="password" class="form-control input-lg" placeholder="Password">
                  <p class="mt-2 text-danger"></p>
                </div>
                <div class="col-md-12">
                  <div class="d-flex my-2 justify-content-between">
                    <div class="d-inline-block mr-3">
                      <label class="control control-checkbox">I Agree The Terms And Conditions
                        <input type="checkbox" />
                        <div class="control-indicator"></div>
                      </label>
             
                    </div>
                  </div>
                  <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">REGISTER</button>
                  <p>Already have an account?
                    <a class="text-blue" href="{{ site_url('login') }}">LOGIN</a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ base_url('assets/admin/plugins/jquery/jquery.js') }}"></script>
  <script src="{{ base_url('assets/admin/plugins/toaster/toastr.min.js') }}"></script>
  <script>
    $('#formRegister').submit(function(event){
      event.preventDefault();

      const myNode = $(this);
      let formMethod = myNode.attr("method");
      let formAction = myNode.attr("action");
      let formData = myNode.serialize();
      let redirectAfterSuccess = myNode.attr("redirect");
      const submitButton = myNode.find('button[type="submit"]');
      const submitText = submitButton.html();

      submitButton.html("LOADING....");
      submitButton.prop("disabled", true);
      
			$.ajax({
				type      : formMethod,
				url       : formAction,
				data      : formData,
				dataType  : 'JSON',
				success: function(response){
          if (response.status) {
            toastr.info('Register berhasil');
            window.location.href = redirectAfterSuccess;
          } else {
            toastr.warning(response.message);
            const errorData = response.error;
            errorData.forEach((item) => {
              myNode.find(`[name="${item.name}"]`).next().html(item.message);
            })
          }
        },
        error: function(response){
          toastr.error('Maaf, terjadi kesalhan, silahkan cek konsol anda');
        },
				complete: function() {
          submitButton.html(submitText);
          submitButton.prop("disabled", false);
				}
      });
    });
  </script>
</body>
</html>