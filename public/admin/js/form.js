(function ($) {
    "use strict";
    //step 1 submit
    $("#step_one_form").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                console.log(response);
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    function errosresponse(xhr) {

        $('.alert-success').hide();
        $('.alert-danger').show();
        $("#errors").html("<li class='text-danger'>" + xhr.responseJSON.errors.url + "</li>")
    }
    //step 2 Submit
    $("#step_two_submit").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                console.log(response);
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);

                if (response.status == 'error') {
                    Sweet('error', response.message);
                }
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    //
    //
    // $("#step_two_submit").on('submit', function (e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var basicbtnhtml = $('.basicbtn').html();
    //     $.ajax({
    //         type: 'POST',
    //         url: this.action,
    //         data: new FormData(this),
    //         dataType: 'json',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         beforeSend: function () {
    //
    //             $('.basicbtn').html("Please Wait....");
    //             $('.basicbtn').attr('disabled', '')
    //
    //         },
    //         success: function (response) {
    //             console.log(response);
    //             $('.basicbtn').removeAttr('disabled')
    //             Sweet('success', response);
    //             $('.basicbtn').html(basicbtnhtml);
    //             Sweet('error', response.message.errors);
    //             if(response.status == 'error')
    //             {
    //                 Sweet('error', response.message);
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             $('.basicbtn').html(basicbtnhtml);
    //             $('.basicbtn').removeAttr('disabled')
    //             $('.errorarea').show();
    //             $(response.data.area).show();
    //             $.each(xhr.responseJSON.errors, function (key, item) {
    //                 Sweet('error', item)
    //                 $("#errors").html("<li class='text-danger'>" + item + "</li>")
    //             });
    //             errosresponse(xhr, status, error);
    //         }
    //     })
    // });

    //step 3 Submit
    $("#step_three_submit").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
                if (response.status == 'error') {
                    Sweet('error', response.message);
                }
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });


    //step 4 Submit
    $("#step_four_submit").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
                if (response.status == 'error') {
                    Sweet('error', response.message);
                }
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });


    //step 5 Submit
    $("#step_fifth_submit").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
                if (response.status == 'error') {
                    Sweet('error', response.message);
                }
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    //step 5 Submit
    $("#step_sixth_submit").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
                if (response.status == 'error') {
                    Sweet('error', response.message);
                }
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });


    $(".basicform_with_reload").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })


    });

    $(".basicform_with_reset").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },

            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                $('.basicform_with_reset').trigger('reset');
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })


    });


    $(".basicform_with_next").on('submit', function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html('Please Wait....');
                $('.basicbtn').attr('disabled', '')

            },

            success: function (response) {

            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })


    });
    //sweet alert box for delete
    $("#confirm_basicform").on('submit', function (e) {
        e.preventDefault();
        var url = this.action;
        var form = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this!",
            showCancelButton: true,
            confirmButtonColor: '#094193',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: form,
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                    })
                        .done(function (response) {

                            Sweet('success', response);
                            success(response);
                        })
                        .fail(function () {
                            Sweet('error', 'Something went wrong!');
                        });
                });
            },
            allowOutsideClick: false
        });

        // $.ajax({
        // 	type: 'POST',
        // 	url: this.action,
        // 	data: new FormData(this),
        // 	dataType: 'json',
        // 	contentType: false,
        // 	cache: false,
        // 	processData: false,
        // 	beforeSend: function () {

        // 		$('.basicbtn').attr('disabled', '');



        // 	},

        // 	success: function (response) {
        // 		$('.basicbtn').removeAttr('disabled')
        // 		Sweet('success', response)

        // 		success(response)
        // 	},
        // 	error: function (xhr, status, error) {
        // 		$('.basicbtn').removeAttr('disabled')
        // 		$('.errorarea').show();
        // 		$.each(xhr.responseJSON.errors, function (key, item) {
        // 			Sweet('error', item)
        // 			$("#errors").html("<li class='text-danger'>" + item + "</li>")
        // 		});
        // 		errosresponse(xhr, status, error);
        // 	}
        // })
    });

    $("#basicform").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').attr('disabled', '');



            },

            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response)

                success(response)
            },
            error: function (xhr, status, error) {
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    $(".basicform").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    $(".land_block_basicform").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                $('.term_id').val(response.data);
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response.message);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });


    $(".land_block_updateform").on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var basicbtnhtml = $('.basicbtn').html();
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $('.basicbtn').html("Please Wait....");
                $('.basicbtn').attr('disabled', '')

            },
            success: function (response) {
                console.log(response);
                $('.term_id').val(response.data);
                $('.basicbtn').removeAttr('disabled')
                Sweet('success', response.message);
                $('.basicbtn').html(basicbtnhtml);
                success(response);
            },
            error: function (xhr, status, error) {
                $('.basicbtn').html(basicbtnhtml);
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    $("#basicform3").on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: this.method,
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                success3(response)
            },
            error: function (xhr, status, error) {
                $('.errorarea').show();

                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    //id basicform1 when submit
    $("#basicform1").on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                success(response)
            },
            error: function (xhr, status, error) {
                $('.errorarea').show();

                $.each(xhr.responseJSON.errors, function (key, item) {
                    Sweet('error', item)
                    $("#errors").html("<li class='text-danger'>" + item + "</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

    $(".checkAll").on('click', function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });


    function Sweet(icon, title, time = 3000) {

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: time,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        Toast.fire({
            icon: icon,
            title: title,
        })
    }

    $(".cancel").on('click', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Do It!'
        }).then((result) => {
            if (result.value == true) {
                window.location.href = link;
            }
        })
    });
})(jQuery);


$(function () {
    $("#nature").on("change", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#property_type").val("");
        var id = $(this).val();
        var url = '/admin/real-state/property_type/' + id;
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $('#property_type').html('');
                $('#property_type').append('<option disabled selected>Select property type</option>');
                $.each(response.category_data, function (index, value) {
                    $.each(value.parent, function (index, value_data) {

                        $('#property_type').append('<option value=' + value_data.id + '>' + value_data.name + '</option>');
                    });
                });

            }
        });
    });
});

$(function () {
    $("#property_type").on("change", function (e) {
        e.preventDefault();
        var text = $(this).find('option:selected').text();
        if (text.indexOf('land') > -1 || text.indexOf('Land') > -1) {
            $('#features').addClass('hiden');
        }
        else {
            $('#features').removeClass('hiden');
        }
    });
});

//for csv property data view
function get_property_data(elem) {
    $('#main_contend').html('');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(elem).data('value');
    var url = '/admin/real-state/get_property_data/' + id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('#property_data_modal').modal('show');

            $.each(response, function (index, value) {
                console.log();
                $('#main_contend').append('<div class="row"><label><b>' + index + ': </b><span>' + value + '</span></label></div>');
            });

        }
    });
}
//land block districts
$('#land_block_city').change(function () {
    var city_id = this.value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_districts/' + city_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            var select = $('#land_block_district').html('');
            // var please_select_district=$('#select_district').text();

            // $("#land_block_district").select2().append('<option disabled selected>'+please_select_district+'</option>');
            $.each(response, function (index, value) {
                name = value.name;
                if (locale == 'ar') {
                    name = value.ar_name;
                }
                $("#land_block_district").select2().append('<option value="' + value.id + '">' + name + '</option>');
                if (value.id == select) {
                    $("#district_val").select2().val(select).trigger('change');
                }
            });
        }
    });
});

//for property logs
function property_logs(elem) {
    var property_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_property_logs/' + property_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length > 1) {
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}



//for admin logs
function admin_logs(elem) {
    var admin_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_admin_logs/' + admin_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length > 1) {
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}



//for property logs
function landBlock_logs(elem) {
    var block_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_landBlock_logs/' + block_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });
}


//for create features logs
function feature_logs(elem) {
    var feature_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_feature_logs/' + feature_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });
}




//for category logs
function category_logs(elem) {
    var category_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_category_logs/' + category_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}


// for input logs
function input_logs(elem) {
    var input_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/real-state/get_input_logs/' + input_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });
}


// for Role Logs
function role_logs(elem) {
    var role_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/get_role_logs/' + role_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}


// for Role Logs
function adminPermission_logs(elem) {
    var adminPermission_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/get_adminpermission_logs/' + adminPermission_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}


// for location logs
function location_logs(elem) {
    var location_id = $(elem).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = '/admin/get_location_logs/' + location_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $('.modal-body').html('');
            if (response.status == 'success') {
                $('#property_logs_modal').modal('show');
                if (response.data.length >= 1) {
                    console.log('in');
                    $.each(response.data, function (index, value) {
                        $('.modal-body').append('<div><h6>* ' + value.message + '</h3><label>Request:</label><p style="overflow-wrap: break-word !important;">' + value.request + '</p><label>Response:</label><p>' + value.response + '</p></div>');
                    });
                }
                else {
                    $('.modal-body').append('<h7>No Logs found</h6>');
                }
            }
        }
    });

}


