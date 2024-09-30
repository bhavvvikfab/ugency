<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('layout.headlinks')
  <!-- Add CSRF Token -->
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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
                  <form class="row g-3 " id="userForm" method="post" novalidate>
                    <div class="col-12">
                      <label for="yourFirstName" class="form-label">First Name</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="firstName" class="form-control" id="yourFirstName" required>
                        <div class="invalid-feedback">Enter your First Name.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourLastName" class="form-label">Last Name</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="lastName" class="form-control" id="yourLastName" required>
                        <div class="invalid-feedback">Enter your Last Name.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Enter a valid Email address!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="phone" class="form-label">Phone</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone-fill"></i></span>
                        <input type="number" name="phone" class="form-control" id="phone" min="0" required>
                        <div class="invalid-feedback">Enter a valid phone number!</div>
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

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ route('loginView') }}">Log in</a></p>
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
      $('#userForm').on('submit', async function(e) {
        e.preventDefault();

        $('.invalid-feedback').hide();
        $('.form-control').removeClass('is-invalid');

        let firstName = $.trim($('#yourFirstName').val());
        let lastName = $.trim($('#yourLastName').val());
        let phone = $.trim($('#phone').val());
        let email = $.trim($('#yourEmail').val());
        let password = $('#yourPassword').val();

        let hasError = false; // To track if there's any validation error


        if (firstName === '') {
          $('#yourFirstName').addClass('is-invalid');
          $('#yourFirstName').siblings('.invalid-feedback').text('Enter your first name.').show();
          hasError = true;
        }

        if (lastName === '') {
          $('#yourLastName').addClass('is-invalid');
          $('#yourLastName').siblings('.invalid-feedback').text('Enter your last name.').show();
          hasError = true;
        }

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

        let phonePattern = /^\d+$/;
        if (phone === '') {
          $('#phone').addClass('is-invalid');
          $('#phone').siblings('.invalid-feedback').text('Enter a valid phone number!').show();
          hasError = true;
        } else if (!phonePattern.test(phone)) {
          $('#phone').addClass('is-invalid');
          $('#phone').siblings('.invalid-feedback').text('Phone number should contain only digits.').show();
          hasError = true;
        } else if (phone.length < 10) {
          $('#phone').addClass('is-invalid');
          $('#phone').siblings('.invalid-feedback').text('Phone number must be at least 10 digits.').show();
          hasError = true;
        }

        if (hasError) return;

        const formData = new FormData();
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('password', password);
        formData.append('role', 'clients');
        try {
          const response = await ajaxRequest('saveuser', formData)
          if (response.status) {
            $('#userForm')[0].reset();
            window.location.href = '/'
          } else console.log('Register', response.message);
        } catch (error) {
          console.log('Error creating user:', error);
        }
      });
    });
  </script>


</body>

</html>