(function ($) {
	"use strict";

	/*----------------------------
       		Checkbox all Active
		   ------------------------------*/
	$('.use').on('click',function(){
		$('#preview').attr('src',myradiovalue);
	});

	

	/*----------------------------
       		Input data append in div
		   ------------------------------*/
	$('#description').on('input',function(){
		$('#seodescription').html($('#description').val());
	});
})(jQuery);	