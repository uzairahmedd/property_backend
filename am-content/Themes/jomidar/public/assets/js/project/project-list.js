"use strict";

/*----------------------------
        Properties Data Get
    ------------------------------*/
var base_url = $('#base_url').val();
var url=base_url+'get_projects';
get_properties(url)
function get_properties(url){
	 $.ajax({
        type: 'get',
        url: url,
        data: $('.search_form').serialize(),
        dataType: 'json',
        beforeSend: function(){
            before_render_list('#item_lists',12)
        },
        success: function(response){ 
            $('.property_placeholder').remove();
            if(response.data.length == 0){
               $('.show-pagination-info').hide();
               $('#item_lists').html('<div class="col-12 no-more"><h3 class="text-center">No more listing avaiable</h3></div>')
            }
            else{
                $('.show-pagination-info').show();
                $('.no-more').remove();
            }
        	render_project('#item_lists',response.data);
           if(response.from == null){
              var from=0;
           }
          else{
              var from=response.from;
           }

          if(response.total == null){
              var total=0;
           }
          else{
              var total=response.total;
           }

          $('#from').html(from);
          $('#to').html(response.to);
          $('#total').html(total);
          if(response.links.length > 3) {
            render_pagination('.pagination',response.links);
         }
          
        }
    })
}

/*-------------------------------------
        Properties Pagination Render
    -----------------------------------------*/
function render_pagination(target,data){
       $('.page-item').remove();
       $.each(data, function(key,value){
            if(value.label === '&laquo; Previous'){
                if(value.url === null){
                    var is_disabled="disabled"; 
                    var is_active=null;
                }
                else{
                    var is_active='page-link-no'+key;
                    var is_disabled='onClick="PaginationClicked('+key+')"';
                }
                var html='<li  class="page-item"><a '+is_disabled+' class="page-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="fas fa-long-arrow-alt-left"></i></a></li>';
            }
            else if(value.label === 'Next &raquo;'){
                if(value.url === null){
                    var is_disabled="disabled"; 
                    var is_active=null;
                }
                else{
                    var is_active='page-link-no'+key;
                   var is_disabled='onClick="PaginationClicked('+key+')"';
                }
                var html='<li class="page-item"><a '+is_disabled+'  class="page-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="fas fa-long-arrow-alt-right"></i></a></li>';
            }
            else{
                if(value.active==true){
                    var is_active="active";
                    var is_disabled="disabled";
                    var url=null;

                }
                else{
                    var is_active='page-link-no'+key;
                    var is_disabled='onClick="PaginationClicked('+key+')"';
                    var url=value.url;
                }
                var html='<li class="page-item"><a class="page-link '+is_active+'" '+is_disabled+' href="javascript:void(0)" data-url="'+url+'">'+value.label+'</a></li>';
            }
            if(value.url !== null){
              $(target).append(html);
            }   
    });
}

/*-------------------------------------
        Pagination Clicked Function
    -----------------------------------------*/
function PaginationClicked(key){
     var url =$('.page-link-no'+key).data('url');
     get_properties(url);
}