(function ($) {
    "use strict";

    /*----------------------------
            Sweetalert Active
        -------------------------------*/
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    /*----------------------------
            Owl Carousel Active
        -------------------------------*/
    $('.property_gallery').owlCarousel({
        loop: true,
        items: 4,
        dots: false,
        responsiveClass:true,
        responsive: {
            0: {
                items: 4
            },
            250: {
                items: 2
            },
            350: {
                items: 3
            },
            767: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });

    /*-----------------------
           Chart Active
        --------------------------*/
    var path= $('#url_path').val();
    $.ajax({
        type: 'get',
        url: $('#base_url').val()+'page_analytics',
        data:{path:path},
        dataType: 'json',

        success: function(response){
            var labels=[];
            var counts=[];
            $.each(response, function(index, value){
                labels.push(value.date);
                counts.push(value.views);
            });

            var ctx = document.getElementById("myChart2");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Visitors',
                        data: counts,
                        backgroundColor: '#274abb',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    scales: {
                        xAxes: [{
                            ticks: {
                                maxRotation: 90,
                                minRotation: 80
                            },
                            gridLines: {
                                offsetGridLines: true // à rajouter
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    /*----------------------------
            Owl Carousel Active
        -------------------------------*/
    $('.property_gallery').owlCarousel({
        loop: true,
        items: 4,
        dots: false,
        responsiveClass:true,
        responsive: {
            0: {
                items: 4
            },
            250: {
                items: 3
            },
            350: {
                items: 3
            },
            767: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });

    /*------------------------------
            Magnific Popup Active
        ---------------------------------*/
    $('.gallery-img-property').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /*-----------------------
            Print Active
        --------------------------*/
    $('#print').on('click',function(){
        $.print('.left-property-section');
    });

    /*-----------------------------
           Review Load More Data
        --------------------------------*/
    $('#review_load_more').on('click',function(){
        page++;
        get_reviews();
    });

    /*-----------------------------
           Review Data Store
        --------------------------------*/
    $('#review_store').on('submit',function(e){
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
                $('#review_sent').attr('disabled','')
                $('#review_sent').html('Please Wait...');
            },
            success: function(response){
                if(response.error)
                {
                    $('.review-success-msg').html('<span class="ml-5">'+response.error+'</span>');
                    $('#review_sent').removeAttr('disabled');
                    $('#review_sent').html('Submit Review');
                }else{
                    document.getElementById("review_store").reset();
                    $('#review_sent').removeAttr('disabled');
                    $('#review_sent').html('Submit Review');
                    $('.review-success-msg').html('<p class="ml-5">Review successfully Sent</p>');
                }

            },
            error: function(xhr, status, error)
            {
                $('#review_sent').removeAttr('disabled');
                $('#review_sent').html('Submit Review');
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

    /*-----------------------------
           Mortgage Calculation
        --------------------------------*/
    $('#calculator').on('submit',function(e){
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
                $('#calculator_btn').attr('disabled','')
                $('#calculator_btn').html('Please Wait...');
            },
            success: function(response){
                if(response.error)
                {
                    $('.review-success-msg').html(response.error);
                    $('#calculator_btn').removeAttr('disabled');
                    $('#calculator_btn').html('Calculate');
                    $('.calculator_append').html('<div class="error-msg"><p>Incorrect Information</p></div>');
                }else{
                    $('#calculator_btn').removeAttr('disabled');
                    $('#calculator_btn').html('Calculate');
                    $('.calculator_append').html('<div class="form-group"><p>Monthly Repayment Costs: <span>$'+response.repement_cost+'</span></p><p>Monthly Interest Only Costs: <span>$'+response.interest_cost+'</span></p></div>');
                }

            },
            error: function(xhr, status, error)
            {
                $('#calculator_btn').removeAttr('disabled');
                $('#calculator_btn').html('Calculate');
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

})(jQuery);

/*-------------------------
        Reviews Data Get
    -----------------------------*/
var page = 1;
get_reviews();
function get_reviews()
{
    var url = $('#reviews_url').val();
    var property_id = $('#property_id').val();
    $.ajax({
        type: 'get',
        url: url+'?page=' + page,
        data: {id: property_id},
        dataType: 'json',
        beforeSend: function(){
            $('#review_load_more').html('Please Wait...');
        },
        success: function(response){
            if(response == 'error')
            {
                $('.propery-review-see-more-btn').html('<p>No Data Found</p>');
            }else{

                $('#review_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Reviews');
                $.each(response.data, function(index, value){

                    if(value.rating == 1)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 2)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 3)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 4)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 5)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li></ul> </nav></div>';
                    }

                    $('#reviews_data').append('<div class="property-review-single"><div class="review-author-img"><img src="https://ui-avatars.com/api/?name='+value.name+'&size=90&background=274ABB&color=fff" alt=""></div><div class="review-another-info"><h3>'+value.name+'</h3> <span>'+value.created_at.substr(0,10)+'</span>'+rating+'<div class="review-content"><p>'+value.review+'</p></div></div></div>');
                });
            }
        }
    })
}

/*-------------------------
        Favourite Property
    -----------------------------*/
function favourite_property(id)
{
    var url = $('#favourite_property_url').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: 'json',
        beforeSend: function() {
           if($('#favourite_btn').hasClass('active'))
           {
                $('#favourite_btn').removeClass('active');
           }else{
                $('#favourite_btn').addClass('active');
           }
        },
        success: function(response){

        },
        error: function(xhr, status, error)
        {
            $('.errorarea').show();
            $.each(xhr.responseJSON.errors, function (key, item)
            {
                Sweet('error',item)
                $("#errors").html("<li class='text-danger'>"+item+"</li>")
            });
            errosresponse(xhr, status, error);
        }
    })
}

/*-------------------------------
        Property Image Active
    ----------------------------------*/
function img_set(value)
{
    $('#property_single_img img').attr("src",value);
}

/*-----------------------------------
        Similar Property Data Get
    -------------------------------------*/
get_similar_property();
function get_similar_property()
{
    var url = $('#similar_property_url').val();
    var agent_id = $('#agent_id').val();
    $.ajax({
        type: 'get',
        url: url,
        data: {agent_id: agent_id},
        dataType: 'json',
        success: function(response){
            var asset_url = $('#base_url').val();
            $.each(response, function(index, value){
                $('#similar_property').append('<div class="col-lg-12"><div class="single-similar-property"> <a href="'+asset_url+'property/'+value.slug+'"><div class="row align-items-center"><div class="col-lg-4"><div class="property-similar-img"> <img class="img-fluid" src="'+value.post_preview.media.url+'" alt="property-img"></div></div><div class="col-lg-8 pl-0"><div class="property-main-content"><h4>'+value.title+'</h4><p>'+amount_format(value.min_price.price)+'-'+amount_format(value.max_price.price)+'</p></div></div></div> </a></div></div>');
            });
        }
    })
}
