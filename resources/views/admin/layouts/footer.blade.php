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
        //------------------------------- Admin Profile Update --------------------

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
                                error: function(response) {
                                    swal.fire('Invalid error occur. Try again');

                                }
                            });
                        }
                    });

                }

            }
        });

        //------------------------------- Admin Leave Approval/Rejection -------------------------
        $('.acceptBtn').click(function(e) {
            var id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: '{{ url('') }}' + "/admin/leave/accept/" + id,
                    success: function(data) {

                        if (data == 1) {
                            swal.fire({
                                'icon': 'info',
                                'title': 'Leave Action',
                                'text': 'Leave Already Approved!'
                            }).then(() => {
                                window.location.reload();
                            });
                        } 
                        else if(data == 3) {
                            swal.fire({
                                'icon': 'success',
                                'title': 'Leave Action',
                                'text': 'Marked as absent as leave not approved'
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                        else  {
                            swal.fire({
                                'icon': 'success',
                                'title': 'Leave Action',
                                'text': 'New Leave(s) has/have been approved!'
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    },

                });
        });
        $('.rejectLeaveBtn').click(function(e) {
            var id = $(this).val();
            swal.fire({
                title: 'Are you sure?',
                text: "You want to decline this leave application?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Reject!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: '{{ url('') }}' + "/admin/leave/delete/" + id,
                        success: function(data) {
                            var result = JSON.parse(data);

                            if (result.status == true) {
                                swal.fire({
                                    'icon': 'success',
                                    'title': 'Leave Action',
                                    'text': result.message
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                swal.fire({
                                    'icon': 'error',
                                    'title': 'Leave Action',
                                    'text': result.message
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        },

                    });
                }
            })
        });
        //------------------------------- Admin Attendance Approval/Rejection --------------------

        $('#markAttendance').click(function(e) {
            e.preventDefault();

            var formdata = new FormData(document.getElementById('attendanceForm'));
            $.ajax({
                type: "POST",
                url: "{{ url('') }}" + '/attendance/mark',
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
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

        $('.rejectBtn').click(function(e) {
            var id = $(this).val();
            swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this attendance?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: '{{ url('') }}' + "/admin/attendance/delete/" + id,
                        success: function(data) {
                            var result = JSON.parse(data);

                            if (result.status == true) {
                                swal.fire({
                                    'icon': 'success',
                                    'title': 'Attendance Action',
                                    'text': result.message
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                swal.fire({
                                    'icon': 'error',
                                    'title': 'Leave Action',
                                    'text': result.message
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        },

                    });
                }
            })
        })

        $('.editBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ url('') }}' + "/getAttendance/" + id,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result) {
                        $('#statusSelected').empty();

                        $('#studentSelected').append('<option name="student" value=' +
                            result.user_id +
                            '>' + result.name + '</option>')
                        $('#statusSelected').prepend('<option name="status" selected=' +
                            result.status +
                            '>' + result.status + '</option>')
                        $('#statusSelected').append(
                            '<option value="Present"> Present </option>')
                        $('#statusSelected').append(
                            '<option value="Absent"> Absent </option>')
                        $('#statusSelected').append(
                            '<option value="Leave"> Leave </option>')
                    }
                }
            });
        });
        //attendance id passed to the function
        function getAttendance(id) {
            $('#editAttendance').click(function(e) {
                e.preventDefault();

                var formdata = new FormData(document.getElementById('editAttendanceForm'));
                $.ajax({
                    type: "POST",
                    url: "{{ url('') }}" + '/attendance/edit/' + id,
                    data: formdata,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {

                        if (response == 1) {
                            swal.fire({
                                'icon': 'success',
                                'text': 'Attendance Edited Successfully',
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
        }
        //fetching attendance id 
        $(".editBtn").click(function(event) {
            var id = $(this).val();
            getAttendance(id);
        });

        //----------------------------------- System Report ---------------------------------------- 
        $('#reportBtn').click(function(e) {
            e.preventDefault();
            var formdata = new FormData(document.getElementById('systemReportForm'));
            $.ajax({
                type: 'POST',
                url: '{{ url('') }}' + "/admin/system-report/all",
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data) {
                        $('#presents').html(data.presents);
                        $('#absents').html(data.absents);
                        $('#leaves').html(data.leaves);
                        $('#percentage').html(data.percentage + '%');
                        const result = JSON.stringify(data.students);
                        $('.report').empty();
                        var html = '';
                        $.each(JSON.parse(result), (key, student) => {
                            html = '<tr><td class="text-center">' + student.name +
                                '</td>' + '<td class="text-center">' + student
                                .created_at + '</td>' + '<td class="text-center">' +
                                student.status + '</td></tr>';
                            $('.report').append(html);
                            // console.log(key + ":" + student);
                        });
                    } else {
                        var html = '';
                        html = '<span> No Data Found! </span>'
                        $('.report').append(html);

                    }

                }
            })

        });
        //----------------------------------- Student Report ---------------------------------------- 

        $('#studentReportBtn').click(function(e) {
            e.preventDefault();
            var id = $('#stud_id').val();
            var formdata = new FormData(document.getElementById('studentReportForm'));
            $.ajax({
                type: 'POST',
                url: '{{ url('') }}' + "/admin/student-report/" + id,
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data) {
                        $('#presents').html(data.presents);
                        $('#absents').html(data.absents);
                        $('#leaves').html(data.leaves);
                        $('#percentage').html(data.percentage + '%');
                        const result = JSON.stringify(data.student);
                        $('.report').empty();
                        var html = '';
                        $.each(JSON.parse(result), (key, student) => {
                            html = '<tr><td class="text-center">' + student.name +
                                '</td>' + '<td class="text-center">' + student
                                .created_at + '</td>' + '<td class="text-center">'
                                + '</td></tr>';
                            $('.report').append(html);
                        });
                    } else {
                        var html = '';
                        html = '<span> No Data Found! </span>'
                        $('.votesList').append(html);

                    }

                }
            })

        });
        //----------------------------------- Student Grade ---------------------------------------- 

        $('#studentGradeBtn').click(function(e) {
            e.preventDefault();
            var id = $('#stud_id').val();
            var formdata = new FormData(document.getElementById('studentGradeForm'));
            $.ajax({
                type: 'POST',
                url: '{{ url('') }}' + "/admin/student-grade/" + id,
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data) {
                        const result = JSON.stringify(data.student);
                        var res = JSON.parse(result);
                        const year = new Date(res.created_at);
                        $('.grade').empty();
                        var html = '';
                            html = '<tr><td class="text-center">' + res.name +'</td>' + '<td class="text-center">' + year.getFullYear() + '</td>' +'<td class="text-center">' + data.grade +'</td> </tr>';
                            $('.grade').append(html);
                    } 
                    else {
                        var html = '';
                        html = '<span> No Data Found! </span>'
                        $('.grade').append(html);

                    }

                }
            })

        });
    });
</script>


</body>


</html>
