@extends('layout.app')
@section('title')
Profile
@endsection
@section('body')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>Kevin Anderson</h2>
                        <h3>Web Designer</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">Web Designer</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <form id="editProfileForm" method="post">
                                    <!-- Profile Image Section -->
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- First Name -->
                                    <div class="row mb-3">
                                        <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstName" type="text" class="form-control" id="firstName" value="">
                                            <div class="invalid-feedback" id="firstNameErr">Enter your first name!</div>
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="row mb-3">
                                        <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastName" type="text" class="form-control" id="lastName" value="">
                                            <div class="invalid-feedback" id="lastNameErr">Enter your last name!</div>
                                        </div>
                                    </div>

                                    <!-- Country -->
                                    <div class="row mb-3">
                                        <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="country" class="form-select" id="country">
                                                <option value="">--Select a country--</option>
                                                <!-- disabled selected -->
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="countryErr">Select your country!</div>
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="row mb-3">
                                        <label for="city" class="col-md-4 col-lg-3 col-form-label">City</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="city" class="form-control" id="city">
                                                <option value="">--Select a city--</option>
                                                @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="cityErr">Select your city!</div>
                                        </div>
                                    </div>


                                    <!-- Phone -->
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="phone" value="">
                                            <div class="invalid-feedback" id="phoneErr">Enter your phone number!</div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="">
                                            <div class="invalid-feedback" id="emailErr">Enter a valid email address!</div>
                                        </div>
                                    </div>

                                    <!-- Language -->
                                    <div class="row mb-3">
                                        <label for="language" class="col-md-4 col-lg-3 col-form-label">Language</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="language" class="form-select" id="language" required>
                                                <option value="">--Select a language--</option>
                                                @foreach ($languages as $language)
                                                <option value="{{ $language->id }}">{{ $language->language_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="languageErr">Select your language!</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Social Links</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div id="socialLinksContainer">
                                                <div class="input-group mb-2">
                                                    <input name="socialPlatform[]" type="text" class="form-control" placeholder="Social Media">
                                                    <input name="socialLink[]" type="text" class="form-control" placeholder="https://socialplatform.com/username">
                                                    <button class="btn btn-primary" id="addSocialLinkBtn" type="button"><i class="bi bi-plus-lg"></i></button>
                                                </div>
                                                <div class="invalid-feedback" id="socialLinksErr">Enter social media link!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form id="changePasswordForm" method="post">

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                            <div class="invalid-feedback" id="currPassErr">Enter your current password!</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                            <div class="invalid-feedback">Enter your new password!</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            <div class="invalid-feedback">Re-enter your new password!</div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        $('#editProfileForm').on('submit',async function(e) {
            e.preventDefault(); // Prevent default form submission

            // Flag to track if the form is valid
            let isValid = true;

            // Loop through all form controls with the 'form-control' class
            $('#editProfileForm .form-control, .form-select').each(function() {
                const input = $(this);
                const value = input.val().trim(); // Get trimmed value

                // Check if the value is empty
                if (value === '') {
                    input.addClass('is-invalid'); // Add invalid class
                    isValid = false; // Set isValid to false
                    // Show respective error message
                    input.siblings('.invalid-feedback').show();
                } else {
                    input.removeClass('is-invalid'); // Remove invalid class
                    input.siblings('.invalid-feedback').hide(); // Hide error message
                }
                if (!isValid) console.log('isValid', isValid, input)

            });

            // Validate each social link
            $('#socialLinksContainer .input-group').each(function() {
                const platformInput = $(this).find('input[name="socialPlatform[]"]');
                const linkInput = $(this).find('input[name="socialLink[]"]');
                const feedback = $(this).siblings('.invalid-feedback');

                // Reset validation state
                platformInput.removeClass('is-invalid');
                linkInput.removeClass('is-invalid');
                feedback.hide(); // Hide previous feedback

                // Check for empty platform or link
                if (platformInput.val().trim() === '' || linkInput.val().trim() === '') {
                    platformInput.addClass('is-invalid'); // Add invalid class
                    linkInput.addClass('is-invalid'); // Add invalid class
                    feedback.show(); // Show error message
                    isValid = false; // Set overall form validity to false
                }
            });

            if (isValid) {
                const formData = $(this).serialize();
                try {
                    const response = await ajaxRequest('', formData) // add route name
                    if (response.status) {
                        $('#editProfileForm')[0].reset();
                        window.location.href = '/'
                    } else console.log('Profile', response.message);
                } catch (error) {
                    console.log('Error while updating Profile:', error);
                }
            }
        });


        $('#changePasswordForm').on('submit', async function(e) {
            e.preventDefault();

            $('.form-control').removeClass('is-invalid');
            // $('.invalid-feedback').text('');

            const currentPassword = $('#currentPassword').val().trim();
            const newPassword = $('#newPassword').val().trim();
            const renewPassword = $('#renewPassword').val().trim();

            let isValid = true;

            if (!currentPassword) {
                isValid = false;
                $('#currentPassword').addClass('is-invalid');
            }

            if (!newPassword) {
                isValid = false;
                $('#newPassword').addClass('is-invalid');
            }

            if (newPassword !== renewPassword) {
                isValid = false;
                $('#renewPassword').addClass('is-invalid');
                $('#renewPassword').siblings('.invalid-feedback').text('New passwords do not match.');
            }

            if (!renewPassword) {
                isValid = false;
                $('#renewPassword').addClass('is-invalid');
            }

            if (newPassword.length < 5) {
                isValid = false;
                $('#newPassword').addClass('is-invalid');
                $('#newPassword').siblings('.invalid-feedback').text('New password must be at least 5 characters long.');
            }
            if (isValid) {
                const formData = new FormData()
                formData.append('currentPassword', currentPassword)
                formData.append('newPassword', newPassword)
                const response = await ajaxRequest('changepassword', formData)
                if (response.status) {
                    $('#changePasswordForm')[0].reset();
                } else {
                    $('#currentPassword').addClass('is-invalid');
                    $('#currentPassword').siblings('.invalid-feedback').html(response.message);
                }
            }
        });


        $('#addSocialLinkBtn').on('click', function() {
            $('#socialLinksContainer').append(`
            <div class="input-group mb-2">
                <input name="socialPlatform[]" type="text" class="form-control" placeholder="Social Media">
                <input name="socialLink[]" type="text" class="form-control" placeholder="https://socialplatform.com/username">
                <button class="btn btn-danger remove-social-btn" type="button"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="invalid-feedback" style="display: none;">Enter social media link!</div>
        `);
            checkSocialLinks();
        });

        // Remove social link input group
        $(document).on('click', '.remove-social-btn', function() {
            const inputGroup = $(this).closest('.input-group');
            inputGroup.next('.invalid-feedback').remove(); // Remove the corresponding error message
            inputGroup.remove(); // Remove the input group
            checkSocialLinks();
        });

        // Check number of social links and adjust button visibility
        function checkSocialLinks() {
            let totalLinks = $('#socialLinksContainer .input-group').length;

            $('#socialLinksContainer .input-group').each(function(index) {
                if (index === 0) {
                    $(this).find('.remove-social-btn').remove(); // Ensure no remove button on first input group
                    if ($('#addSocialLinkBtn').length === 0) {
                        $(this).append('<button class="btn btn-success" id="addSocialLinkBtn" type="button"><i class="bi bi-plus-lg"></i></button>');
                    }
                } else {
                    $(this).find('#addSocialLinkBtn').remove();
                    if ($(this).find('.remove-social-btn').length === 0) {
                        $(this).append('<button class="btn btn-danger remove-social-btn" type="button"><i class="bi bi-x-lg"></i></button>');
                    }
                }
            });
        }
        // Initial check
        checkSocialLinks();

    })
</script>
@endpush