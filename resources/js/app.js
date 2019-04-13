$(function() {
    alert(1);

    $(".enter-submit").on('keypress',function(e) {
	    if(e.which == 13) {
	        $(this).parents("form:eq(0)").submit();
	    }
	});
});