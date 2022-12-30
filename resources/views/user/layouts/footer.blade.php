</main>


<!-- ========= All Javascript files linkup ======== -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
<script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/world-merc.js') }}"></script>
<script src="{{ asset('assets/js/polyfill.js') }}"></script>
<script src="{{ asset('assets/js/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable.js') }}"></script>
<script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://kit.fontawesome.com/4303e06f63.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        // $('#updateProfile').show();
        // $('#profileUpdateLoading').hide();
        $("#image").on("change", function(e) {
            e.preventDefault();
            if (this.files[0].size > 2000000) {
                swal.fire("Please upload file less than 2MB. Thanks!!");
                $(this).val('');
            } else {
                // $('#updateProfile').click((e)=>{
                var ext = $(this).val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    swal.fire("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");
                    $(this).val('');
                } else {
                    $('#profilebtn').click((e) => {
                        e.preventDefault();
                        // alert('dasda');
                        if ($('#image').val() == '') {
                            swal.fire("Please select an image to upload!");
                        } else {
                            var formdata = new FormData(document.getElementById('profileForm'));
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: '{{ url('') }}' + "/photo/update",
                                data: formdata,
                                processData: false,
                                contentType: false,
                                cache: false,
                                dataType: "json",
                                // beforeSend: function() {
                                //     $('#updateProfile').hide();
                                //     $('#profileUpdateLoading').show();

                                // },
                                success: function(response) {
                                    alert(response);
                                    if (response.success) {
                                        // $('#profileUpdateLoading').hide();
                                        // $('#updateProfile').show();
                                        $('#image').val('');
                                        swal.fire({
                                            'icon': 'success',
                                            'text': response.message,
                                        });


                                        // loadLogo();
                                    } else if (response == 2) {
                                        // $('#updateProfile').show();
                                        // $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire(
                                            "Invalid Image Format! Image Format Must Be JPG, JPEG or PNG."
                                        );

                                    } else if (response == 3) {
                                        // $('#updateProfile').show();
                                        // $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire(
                                            "Data could not be stored. Contact admin!"
                                        );

                                    } else if (response == 4) {
                                        // $('#updateProfile').show();
                                        // $('#profileUpdateLoading').hide();
                                        $('#image').val('');
                                        swal.fire("File is not valid.");

                                    } else {
                                        // $('#updateProfile').show();
                                        // $('#profileUpdateLoading').hide();
                                        swal.fire('Invalid error occur. Try again');
                                        $('#image').val('');


                                    }
                                },
                            });
                        }
                    });

                }

            }
        });
    });
</script>
</body>


</html>
