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

        $("#image").on("change", function(e) {
            e.preventDefault();
            if (this.files[0].size > 2000000) {
                swal.fire("Please upload file less than 2MB. Thanks!!");
                $(this).val('');
            } else {
                var ext = $(this).val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    swal.fire("Invalid Image Format! Image Format Must Be JPG, JPEG or PNG.");
                    $(this).val('');
                } else {
                    $('#profilebtn').click((e) => {
                        e.preventDefault();
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

                                success: function(response) {
                                    if (response.success) {
                                        $('#image').val('');
                                        swal.fire({
                                            'icon': 'success',
                                            'text': response.message,
                                        }).then(() => {
                                            window.location.reload();
                                        });

                                    } else if (response == 2) {
                                        $('#image').val('');
                                        swal.fire(
                                            "Invalid Image Format! Image Format Must Be JPG, JPEG or PNG."
                                        );

                                    } else if (response == 3) {
                                        $('#image').val('');
                                        swal.fire(
                                            "Data could not be stored. Contact admin!"
                                        );

                                    } else {
                                        swal.fire('Invalid error occur. Try again');
                                        $('#image').val('');
                                    }
                                },
                                error: function(response){
                                    swal.fire('Invalid error occur. Try again');

                                }
                            });
                        }
                    });

                }

            }
        });

        //Mark Attendance 
        $('#markAttendance').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ url('') }}" + '/attendance/mark',
                success: function(response) {
                    
                    if (response == 1) {
                        swal.fire({
                            'icon': 'success',
                            'text': 'Attendance Marked Successfully',
                        }).then(() => {
                            window.location.reload();
                        });

                    } else if (response == 0) {
                        swal.fire({
                            'icon': 'info',
                            'text': 'Attendance Already Marked',
                        });
                    } else {
                        swal.fire({
                            'icon': 'info',
                            'text': 'Attendance Could Not Be Marked',
                        });

                    }

                },
                error: function(response) {
                    swal.fire({
                            'icon': 'error',
                            'text': 'Failed to Mark Attendance. Contact Admin!',
                        });
                }

            });
        });
        //--------------------------------------------------------------------------------

        //------------------------------- Mark Leave -------------------------------------
        $('#leaveBtn').click(function(e){
            e.preventDefault();
            var formdata = new FormData(document.getElementById('leaveForm'));
            $.ajax({
                type: "POST",
                url: '{{ url('') }}' + "/attendance/leave",
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(response){
                    if(response == 1){
                        swal.fire({
                            'icon': 'success',
                            'text': 'Request Sent Successfully!',
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                    else if(response == 0){
                        swal.fire({
                            'icon': 'info',
                            'text': 'An unexpected error occured. Please contact Admin!',
                        });
                    }
                    else if(response == 3){
                        swal.fire({
                            'icon': 'info',
                            'text': 'Please Enter the fields correctly.',
                        });
                    }
                },
                error:function(response){
                    swal.fire({
                            'icon': 'error',
                            'text': 'An unexpected error occured. Please contact Admin!',
                        });
                }

            });

        });
    });
</script>


</body>


</html>
