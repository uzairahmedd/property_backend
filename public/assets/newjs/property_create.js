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
