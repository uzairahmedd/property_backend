// Property Step Js Start
$(document).ready(function (event) {
    $('.inter_val').click(function (e) {
        $(".inter_val").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val.selected").text();
        // var input_value = $("#interface_name").val();
        $("#interface_val").val(function() {
            return this.value +' ' + drop_text;
        });
        e.preventDefault();
    });
});


$(document).ready(function (event) {
    $('.inter_val2').click(function (e) {
        $(".inter_val2").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val2.selected").text();
        // var input_value = $("#interface_name").val();
        $("#interface_val2").val(function() {
            return this.value +' ' +drop_text;
        });
        e.preventDefault();
    });
});

$(document).ready(function (event) {
    $('.inter_val3').click(function (e) {
        $(".inter_val3").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val3.selected").text();
        // var input_value = $("#interface_name").val();
        $("#interface_val3").val(function() {
            return this.value +' ' + drop_text;
        });
        e.preventDefault();
    });
});
// Property Step Js End
