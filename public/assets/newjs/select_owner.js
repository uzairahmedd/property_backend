$(document).ready(function() {
    if ($('#owner').is(':checked')) {
        $(".select-account").addClass("hiden");
        $("#cr_number").addClass("hiden");
        $("#rega_number").addClass("hiden");
    }
    $("input[name=status]:radio").click(function () {
        if ($('input[name=status]:checked').val() == "1") {
            $(".select-account").addClass("hiden");
            $("#cr_number").addClass("hiden");
            $("#rega_number").addClass("hiden");

        } else if ($('input[name=status]:checked').val() == "2") {
            $(".select-account").removeClass("hiden");
            if ($('input[name=account_select]:checked').val() == "4") {
                $("#rega_number").removeClass("hiden");
                $("#cr_number").addClass("hiden");
            }

            $("input[name=account_select]:radio").click(function () {
                if ($('input[name=account_select]:checked').val() == "4") {
                    $("#rega_number").removeClass("hiden");
                    $("#cr_number").addClass("hiden");
                } else if ($('input[name=account_select]:checked').val() == "5") {
                    $("#cr_number").removeClass("hiden");
                    $("#rega_number").removeClass("hiden");
                }
            });
        }
        else if ($('input[name=status]:checked').val() == "3") {
            $("#cr_number").removeClass("hiden");
            $("#rega_number").addClass("hiden");
            $(".select-account").addClass("hiden");
        }

    });
});

