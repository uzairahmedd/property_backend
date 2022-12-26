(function ($) {
	"use strict";
	//basicform submit
	$("#productform").on('submit', function (e) {
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

				$('.basicbtn').attr('disabled', '')

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

	$(".basicform_with_reload").on('submit', function (e) {
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
				location.reload();
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
		var text=$(this).find('option:selected').text();
		
       if(text.indexOf('land') > -1 || text.indexOf('Land') > -1){
        $('#features').addClass('hiden');
	   }
	   else{
		$('#features').removeClass('hiden');
	   }
	});
});

