$('.header-box-top-area').on('click','li',function(e){
    e.preventDefault();
    $(this).addClass('active').siblings().removeClass('active');
});

function status_change(id)
{
    $('#property_status').val(id);
}