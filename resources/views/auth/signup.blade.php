@include('user.layouts.head')



<!-- ========== signin-section start ========== -->
<section class="signin-section">
    <div class="container-fluid">
      

        <div class="row g-0 auth-row">
            <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                    <div class="auth-cover">
                        <div class="title text-center">
                            <h1 class="text-primary mb-10">Get Started</h1>
                            <p class="text-medium">
                                Start creating the best possible user experience
                                <br class="d-sm-block" />
                                for you customers.
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
                <div class="signup-wrapper">
                    <div class="form-wrapper">
                        <h6 class="mb-15">Sign Up Form</h6>
                        <p class="text-sm mb-25">
                            Start creating the best possible user experience for you
                            customers.
                        </p>
                        <form id="registerForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Name</label>
                                        <input type="text" placeholder="Name" name="name" id="name"/>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" name="email" id="email" />
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
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Password" name="cpassword" id="cpassword" />
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-12">
                                    <div class="button-group d-flex justify-content-center flex-wrap">
                                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                        <div class="singup-option pt-40">

                            <p class="text-sm text-medium text-dark text-center">
                                Already have an account? <a href="{{ url('/login')}}">Sign In</a>
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
    $('#registerForm').validate({
        rules: {
          name: {
            required: true,
            maxlength: 50
          },
          email: {
            required: true,
            email: true,
            maxlength: 100
          },

          password: {
            required: true,
            minlength: 8,
            maxlength: 255
          },
          // confirm password
          cpassword: {
            required: true,
            minlength: 8,
            maxlength: 255,
            equalTo: "#password"
          },
        

        },

        submitHandler: function(form, e) {
          e.preventDefault();
          $.post('register', $('form').serialize(), (data) => {
            var result = JSON.parse(data);
            if (result.status == true) {
              swal.fire({
                'icon': 'success',
                'title': 'Success',
                'text': result.message
              }).then(() => {
                window.location.href = "{{url('/login')}}";
              })
            } else {
              swal.fire({
                'icon': 'error',
                'title': 'Failed',
                'text': result.message
              })

            }
          });

          return false;
        }
      });
</script>