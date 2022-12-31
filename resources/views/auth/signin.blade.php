@include('user.layouts.head')


<!-- ========== signin-section start ========== -->
<section class="signin-section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Sign in</h2>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row g-0 auth-row">
            <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                    <div class="auth-cover">
                        <div class="title text-center">
                            <h1 class="text-primary mb-10">Welcome Back</h1>
                            <p class="text-medium">
                                Sign in to your Existing account to continue
                            </p>
                        </div>
                        <div class="cover-image">
                            <img src="assets/images/auth/signin-image.svg" alt="" />
                        </div>
                        <div class="shape-image">
                            <img src="assets/images/auth/shape.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                        <h6 class="mb-15">Sign In Form</h6>
                        <p class="text-sm mb-25">
                            Start creating the best possible user experience for you
                            customers.
                        </p>
                        <form id="login-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input name="email" id="email" type="email" placeholder="Email" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password" id="password" />
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                        <a href="reset-password.html" class="hover-underline">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="button-group d-flex justify-content-center flex-wrap">
                                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                        <div class="singin-option pt-40">

                            <p class="text-sm text-medium text-dark text-center">
                                Don’t have any account yet?
                                <a href="{{ url('register') }}">Create an account</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>
<!-- ========== signin-section end ========== -->
@include('user.layouts.footer')
<script>
    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },

        },
        // in 'messages' user have to specify message as per rules
        messages: {

            username: {
                required: "Please enter an email",
                email: " Please enter valid email"
            },
            password: {
                required: " Please enter a password",
            },
        },
        submitHandler: function(form, e) {
            e.preventDefault();
            $.post('login', $('form').serialize(), (data) => {
                var result = JSON.parse(data);
                if (result.status == true) {
                    swal.fire({
                        'icon': 'success',
                        'title': 'Authentication',
                        'text': result.message
                    });
                    window.location.href = "{{ route('user_dashboard') }}";
                } else if (data == 'admin') {
                    swal.fire({
                        'icon': 'success',
                        'title': 'Authentication',
                        'text': result.message
                    });
                    window.location.href = "{{ route('admin_dashboard') }}";

                } else {
                    swal.fire({
                        'icon': 'info',
                        'title': 'Authentication',
                        'text': result.message
                    })

                }
            })

            return false;
        }
    });
</script>
