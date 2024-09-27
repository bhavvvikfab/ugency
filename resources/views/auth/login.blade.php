<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('layout.headlinks')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">{{env('COMPANY_NAME' ?? 'Ugecy')}}</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form id="loginForm" method="post" class="row g-3 " novalidate>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Enter a valid Email address!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Enter your password!</div>
                      </div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div> 
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ route('registerView')}}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layout.appscript')

  <script>
    $(document).ready(function() {
      $('#loginForm').on('submit', async function(e) {
        e.preventDefault();

        $('.invalid-feedback').hide();
        $('.form-control').removeClass('is-invalid');

        let email = $.trim($('#yourEmail').val());
        let password = $('#yourPassword').val();

        let hasError = false;

        if (email === '') {
          $('#yourEmail').addClass('is-invalid');
          $('#yourEmail').siblings('.invalid-feedback').text('Enter a valid email address!').show();
          hasError = true;
        } else {
          let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(email)) {
            $('#yourEmail').addClass('is-invalid');
            $('#yourEmail').siblings('.invalid-feedback').text('Enter a valid email address.').show();
            hasError = true;
          }
        }

        if (password === '') {
          $('#yourPassword').addClass('is-invalid');
          $('#yourPassword').siblings('.invalid-feedback').text('Enter your password!').show();
          hasError = true;
        } else if (password.length < 6) {
          $('#yourPassword').addClass('is-invalid');
          $('#yourPassword').siblings('.invalid-feedback').text('Password must be at least 6 characters.').show();
          hasError = true;
        }

        if (hasError) return;

        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        try {
          const response = await ajaxRequest('login', formData)
          if (response.status) {
            $('#loginForm')[0].reset();
            window.location.href = '/dashboard';
          } else console.log('Register', response.message);
        } catch (error) {
          console.log('Error creating user:', error);
        }
      });
    });
  </script>
</body>

</html>