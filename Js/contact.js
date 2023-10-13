/*global $,alert*/
$('.namer').on("blur",function () {
	"use strict";
	if ($(this).val().length < 4) {
		$(this).css("border", "1px solid red");
		$(this).parent().parent().find('.alert-error').fadeIn(200);
		
	}
		else {
			$(this).css("border", "1px solid green");
			$(this).parent().parent().find('.alert-error').fadeOut(200);
			
		}
	
});