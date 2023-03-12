/*----------------------------
        Delete Account
    -------------------------------*/
/**
 * for sweet alert of delete account js
 */
function account_del(elem) {
    var id = $(elem).attr('data-id');
    var base_url = $('#base_url').val();
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
                    type: "get",
                    url: base_url + 'agent/account/delete/' + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                })
                    .done(function (response) {

                        Sweet(response.status, response.messages)
                    })
                    .fail(function () {
                        Sweet('error', 'Something went wrong!');
                    });
            });
        },
        allowOutsideClick: false
    });

}
/*-------------------------------
        Sweetalert Message Show
    -----------------------------------*/
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


