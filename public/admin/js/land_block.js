"use strict";

function success(res) {
    location.reload()
}

$('#email').on('focusout', () => {
    $('#user_mail').val($('#email').val());
    $('#basicform3').submit();
});

function success3(res) {
    $('#user_id').val(res.id);
    $('.submitbtn').removeAttr('disabled');
}


//Add Input Fields
var max_fields = 100; //Maximum allowed input fields
var wrapper = $(".wrapper"); //Input fields wrapper
var add_button = $(".add_fields"); //Add button class or ID
var plot_basic_detail = $('#plot_basic_detail').text();
var bottom_measurement = $('#bottom_measurement').text();
var top_measurement = $('#top_measurement').text();
var right_measurement = $('#right_measurement').text();
var left_measurement = $('#left_measurement').text();
var plot_all_side_measurement = $('#plot_all_side_measurement').text();
var plot_top_left_coordinate = $('#plot_top_left_coordinate').text();
var plot_top_right_coordinate = $('#plot_top_right_coordinate').text();
var plot_right_bottom_coordinate = $('#plot_right_bottom_coordinate').text();
var plot_bottom_left_coordinate = $('#plot_bottom_left_coordinate').text();
var plot_center_coordinate = $('#plot_center_coordinate').text();
var plot_all_side_coordinate = $('#plot_all_side_coordinate').text();
var comma_seperated = $('.comma_seperated').text();
var plot_area = $('#plot_area').text();
var planned_number = $('#planned_number').text();
var plot_number = $('#plot_number').text();
var rem_plot_form = $('#rem_plot_form').text();
var residential = $('#residential').text();
var property_nature = $('#property_nature').text();
var plot_price = $('#plot_price').text();
var commercial = $('#commercial').text();
var land_count = $('#blockcount').text();
if (land_count == '') {
    land_count = 1;
}

$(document).ready(function () {
    //for edit
    if (window.location.href.indexOf("edit") != -1) {
        land_block_plot_measurements();
    }

    function land_block_plot_measurements() {
        var id = $('#term_id').val();
        var base_url = $('#base_url').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = base_url + '/admin/real-state/edit_land_block_property/' + id;
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $(wrapper).html('');

                var count = response.data.blockcount;
                $('.parent_category').html('');
                if (count < max_fields) {
                    var x = 1;
                    //add input field
                    $.each(response.data.post_data, function (index_val, value) {


                        $(wrapper).append('<input type="hidden" name="id[]" value="' + value.id + '">  <div style=""><hr><h6 style="text-align:center">' + x + ' : ' + plot_basic_detail + '</h6><div class="row"> <div class="col-sm-3"><div class="form-group"><label for="property_nature">' + property_nature + '</label><div class="landblock_parent_category' + index_val + '"></div></div></div> <div class="col-sm-3"><div class="form-group"><label for="number">' + plot_number + '</label> <input type="text" name="plot_number[]" value="' + value.plot_number + '" id="number" required="" placeholder="' + plot_number + '" class="form-control"> </div></div> <div class="col-sm-2"><div class="form-group"><label for="price">' + plot_price + '</label> <input type="text" name="plot_price[]"  required="" value="' + value.price + '" placeholder="' + plot_price + '" class="form-control"></div> </div><div class="col-sm-2"> <div class="form-group"><label for="planned_number">' + planned_number + '</label><input type="text" name="planned_number[]"  required="" value="' + value.planned_number + '" placeholder="' + planned_number + '" class="form-control"></div></div><div class="col-sm-2"><div class="form-group"><label for="planned_number">' + plot_area + '</label><input type="text" name="total_area[]" value="' + value.total_area + '" id="planned_number" required="" placeholder="' + plot_area + '" class="form-control"></div> </div> </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_coordinate + '</h6> <div class="row"> <div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_center_coordinate + '</label><input type="text" name="center_coordinate[]" id="center_coordinate" value="' + value.center_coordinate + '" required="" placeholder="' + comma_seperated + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_bottom_left_coordinate + '</label><input type="text" name="bottom_left_coordinate[]" value="' + value.bottom_left_coordinate + '"  required="" placeholder="' + plot_bottom_left_coordinate + '" class="form-control"></div></div><div class="col-sm-4"> <div class="form-group"> <label for="bottom_right_coordinate">' + plot_right_bottom_coordinate + '</label><input type="text" name="bottom_right_coordinate[]" value="' + value.bottom_right_coordinate + '" required="" placeholder="' + plot_right_bottom_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"> <label for="top_right_coordinate">' + plot_top_right_coordinate + '</label><input type="text" name="top_right_coordinate[]"  required="" value="' + value.top_right_coordinate + '" placeholder="' + plot_top_right_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="top_left_coordinate">' + plot_top_left_coordinate + '</label><input type="text" name="top_left_coordinate[]" value="' + value.top_left_coordinate + '" required="" placeholder="' + plot_top_left_coordinate + '" class="form-control"> </div></div>  </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_measurement + '</h6><div class="row"><div class="col-sm-3"><div class="form-group"><label for="left_measurement">' + left_measurement + '</label><input type="text" name="left_measurement[]"  required="" placeholder="' + left_measurement + '" value="' + value.left_measurement + '" class="form-control"></div> </div><div class="col-sm-3"><div class="form-group"><label for="right_measurement">' + right_measurement + '</label><input type="text" name="right_measurement[]" value="' + value.right_measurement + '" required="" placeholder="' + right_measurement + '" class="form-control"></div></div><div class="col-sm-3"><div class="form-group"><label for="top_measurement">' + top_measurement + '</label><input type="text" name="top_measurement[]" value="' + value.top_measurement + '"  required="" placeholder="' + top_measurement + '" class="form-control"></div> </div><div class="col-sm-3"> <div class="form-group"><label for="bottom_measurement">' + bottom_measurement + '</label><input type="text" name="bottom_measurement[]"  required="" value="' + value.bottom_measurement + '" placeholder="' + bottom_measurement + '" class="form-control"></div></div></div></div>');
                        $('.landblock_parent_category' + index_val).html('');
                        $('.landblock_parent_category' + index_val).html('<select class="form-control form-select-lg mb-3 nature_dropdown' + index_val + '"  name="property_nature[]" required="" aria-label=".form-select-lg example"><option value="" disabled >select</option></select>');
                        $.each(response.data.parent_category, function (index, parent_value) {
                            var check = '';
                            var name = parent_value.name;
                            if (locale == 'ar') {
                                name = parent_value.ar_name;
                            }
                            if (parent_value.id == parseInt(value.parent_category)) {
                                check = 'selected';
                            }
                            $('.nature_dropdown' + index_val).append('<option value="' + parent_value.id + '"  ' + check + '>' + name + '</option>');
                        });

                        x++;
                    });
                }
            }
        })
    }


    //when user click on remove button
    $(wrapper).on("click", ".remove_field", function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //remove inout field
        // x--; //inout field decrement
    })

    //for addition
    $(add_button).click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '/admin/real-state/parent_property';
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $('.parent_category').html('');
                if (land_count < max_fields) {
                    land_count++; //input field increment
                    //add input field
                    $(wrapper).append('<div><input type="hidden" name="id[]" value=""> <hr><h6 style="text-align:center">' + land_count + ' : ' + plot_basic_detail + '</h6><div class="row"> <div class="col-sm-3"><div class="form-group"><label for="property_nature">' + property_nature + '</label><select class="form-control form-select-lg mb-3 parent_category" name="property_nature[]" required="" aria-label=".form-select-lg example"></select></div></div> <div class="col-sm-3"><div class="form-group"><label for="number">' + plot_number + '</label> <input type="text" name="plot_number[]" id="number" required="" placeholder="' + plot_number + '" class="form-control"> </div></div> <div class="col-sm-2"><div class="form-group"><label for="price">' + plot_price + '</label> <input type="text" name="plot_price[]"  required="" placeholder="' + plot_price + '" class="form-control"></div> </div><div class="col-sm-2"> <div class="form-group"><label for="planned_number">' + planned_number + '</label><input type="text" name="planned_number[]"  required="" placeholder="' + planned_number + '" class="form-control"></div></div><div class="col-sm-2"><div class="form-group"><label for="planned_number">' + plot_area + '</label><input type="text" name="total_area[]" id="planned_number" required="" placeholder="' + plot_area + '" class="form-control"></div> </div> </div><hr> <h6 style="text-align:center">' + land_count + ' : ' + plot_all_side_coordinate + '</h6> <div class="row"> <div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_center_coordinate + '</label><input type="text" name="center_coordinate[]" id="center_coordinate" required="" placeholder="' + comma_seperated + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_bottom_left_coordinate + '</label><input type="text" name="bottom_left_coordinate[]"  required="" placeholder="' + plot_bottom_left_coordinate + '" class="form-control"></div></div><div class="col-sm-4"> <div class="form-group"> <label for="bottom_right_coordinate">' + plot_right_bottom_coordinate + '</label><input type="text" name="bottom_right_coordinate[]"  required="" placeholder="' + plot_right_bottom_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"> <label for="top_right_coordinate">' + plot_top_right_coordinate + '</label><input type="text" name="top_right_coordinate[]"  required="" placeholder="' + plot_top_right_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="top_left_coordinate">' + plot_top_left_coordinate + '</label><input type="text" name="top_left_coordinate[]"  required="" placeholder="' + plot_top_left_coordinate + '" class="form-control"> </div></div>  </div><hr> <h6 style="text-align:center">' + land_count + ' : ' + plot_all_side_measurement + '</h6><div class="row"><div class="col-sm-3"><div class="form-group"><label for="left_measurement">' + left_measurement + '</label><input type="text" name="left_measurement[]"  required="" placeholder="' + left_measurement + '" class="form-control"></div> </div><div class="col-sm-3"><div class="form-group"><label for="right_measurement">' + right_measurement + '</label><input type="text" name="right_measurement[]" required="" placeholder="' + right_measurement + '" class="form-control"></div></div><div class="col-sm-3"><div class="form-group"><label for="top_measurement">' + top_measurement + '</label><input type="text" name="top_measurement[]"  required="" placeholder="' + top_measurement + '" class="form-control"></div> </div><div class="col-sm-3"> <div class="form-group"><label for="bottom_measurement">' + bottom_measurement + '</label><input type="text" name="bottom_measurement[]"  required="" placeholder="' + bottom_measurement + '" class="form-control"></div></div></div><div class="d-flex justify-content-end"><a href="javascript:void(0);" class="remove_field btn btn-danger" style="float:right;">' + rem_plot_form + '</a></div></div>');

                }
                var name = '';
                $('.parent_category').append('<option disabled selected>' + property_nature + '</option>');
                $.each(response.data, function (index, value_data) {
                    name = value_data.name
                    if (locale == 'ar') {
                        name = value_data.ar_name;
                    }
                    $('.parent_category').append('<option value=' + value_data.id + '>' + name + '</option>');
                });
            }
        })
    });
});

// Upload Images
var loadFile = function (event) {
    var output = document.getElementById('first_image');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};


/*---------------------
              Image Remove
    --------------------------*/
var m_id = '';

function remove_image(param, key) {
    m_id = key;
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
            $('#m_area' + m_id).remove();
            $('#media_id').val(param);
            $('#basicform').submit();
        }
    })
}

