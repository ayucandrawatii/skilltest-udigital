(function($){
	/* Showmenu on mobile */
	$('.showmenu').click(function(){
    	var parent = $(this).parent().parent().parent().parent().parent();
    	var child = parent.find('.mobile-menu #navbarSupportedContentMb');
    	child.toggleClass('show');
    });

	/* Bootstrap Nav */
	$('.navbar .menu-item-has-children').hover(function() {
		$(this).find('.dropdown-menu').first().stop(true, true).delay(150).slideDown();
	}, function() {
		$(this).find('.dropdown-menu').first().stop(true, true).delay(50).slideUp();
	});

	$('.dropdown-menu li a').on('click', function(){
	    $('.navbar-collapse').collapse('hide');
	});

})(jQuery)