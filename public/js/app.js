$(function() {
    $(".enter-submit").on('keypress',function(e) {
	    if(e.which == 13) {
	        $(this).parents("form:eq(0)").submit();
	    }
	});

	$(".change-submit").on('change',function(e) {
	    $(this).parents("form:eq(0)").submit();
	});
});