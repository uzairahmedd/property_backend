//for step one sale type radio btn click
$("#create_status1").click(function (event) {
    $('#create_status1').attr('checked', 'checked');
    $('#create_status2').removeAttr('checked');

});

//for step one rent type radio btn click
$("#create_status2").click(function (event) {
    $('#create_status2').attr('checked', 'checked');
    $('#create_status1').removeAttr('checked');

});

/*---------------------
       	Image Remove
    --------------------------*/
var m_id='';
function remove_image(param,key) {
    m_id=key;
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to remove this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Do It!'
    }).then((result) => {
        if (result.value == true) {
            $('#m_area'+m_id).remove();
            $('#media_id').val(param);
            $('#basicform').submit();
        }
    })
}

$("#basicform").on('submit', function(e){
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
        processData:false,
        beforeSend: function() {
               
               $('.basicbtn').attr('disabled','');
               
              

        },
        
        success: function(response){ 
            $('.basicbtn').removeAttr('disabled')
            Sweet('success',response)
            
            // success(response)
        },
        error: function(xhr, status, error) 
        {
            $('.basicbtn').removeAttr('disabled')
            $('.errorarea').show();
            $.each(xhr.responseJSON.errors, function (key, item) 
            {
                Sweet('error',item)
                $("#errors").html("<li class='text-danger'>"+item+"</li>")
            });
            errosresponse(xhr, status, error);
        }
    })


});



/*-------------------------------
        Sweetalert Message Show
    -----------------------------------*/
    function Sweet(icon,title,time=3000){
  
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


var loadFile = function(event) {
    var output = document.getElementById('first_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    var add= $('.add_pics').text();
    $('.add_pics').text(parseInt(add)+1);
  };
  var loadFile1 = function(event) {
    var output = document.getElementById('second_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    var add= $('.add_pics').text();
    $('.add_pics').text(parseInt(add)+1);
  };
  var loadFile2 = function(event) {
    var output = document.getElementById('third_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    var add= $('.add_pics').text();
    $('.add_pics').text(parseInt(add)+1);
  };
  var loadFile3 = function(event) {
    var output = document.getElementById('forth_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    var add= $('.add_pics').text();
    $('.add_pics').text(parseInt(add)+1);
  };
  var loadFile4 = function(event) {
    var output = document.getElementById('five_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    var add= $('.add_pics').text();
    $('.add_pics').text(parseInt(add)+1);
  };



  (function ($) {
   //update phone 
   $("#update_phone").on("click", function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $("#update_phone").prop('disabled', true);
    $("#update_phone i").addClass('fa fa-spinner fa-spin ');
    var baseurl = $('#base_url').val();
    var url = baseurl + 'modify_phone';
    $.ajax({
        url: url,
        type: 'post',
        data: $("#modify_phone").serialize(),
        success: function (response) {
            // $("#update_phone").prop('disabled', false);
            $("#update_phone i").removeClass('fa fa-spinner fa-spin ');
            if (response.status == 'success') {

                window.location.href = response.data['url'];

            }
            if (response.status == 'error') {
                if (response.data['phone']) {
                    $('#phone_errors').html('<span class="error">' + response.data['phone'] + '</span>');
                }
                setTimeout(function () {
                    $('#phone_errors').html('');
                }, 20000);
            }
        }
    });
});
})(jQuery);


//ckeditor for description
ClassicEditor
.create( document.querySelector( '#description' ) )
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#ar_description' ) )
.catch( error => {
    console.error( error );
} );

