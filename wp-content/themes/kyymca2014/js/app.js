// Make navbar catch on scroll
$(window).scroll(function() {
	if ($(window).width() >= 768) {
		var pagePosition = $(document).scrollTop();
		var headerHeight = 104;
		var navHeight = $('.nav').height();
		// console.log('container position is: ' + containerPosition);
		// console.log('landing page height is: ' + landingHeight);
		if (pagePosition >= headerHeight) {
			var margin = $(document).width() / 2 - 500;
			$('.nav')
				.css('max-width', '1000px')
				// .css('margin-left', margin + 'px')
				.css('margin-top', '0px')
				.css('z-index', '9999')
				.css('position','fixed')
				.css('top','0');
			if ($('li#nav-search').length == 0) {
				$('ul#menu-header').prepend('<li id="nav-search"><i class="fa fa-search"></i></li>');
				$('li#nav-search').click(function() {
					$('#header-search-input').focus();
				});
			}
			$('.wrapper')
				.css('padding-top', navHeight + 27 + 'px');
		}
		else {
			$('.nav')
				.css('margin-left', '0px')
				.css('margin-top', '7px')
				.css('position','relative');
			$('.wrapper')
				.css('padding-top', '20px');
			$('li#nav-search').remove();
		}
	}
	else {
		$('.nav')
			.css('margin-left', '0px')
			.css('margin-top', '7px')
			.css('position','relative');
		$('.wrapper')
			.css('padding-top', '20px');
	}
});


// Customize Twitterfeed Styles
customizeTwitter = function() { 
	setTimeout(function() {
		var twitterFeed = $('#twitter-widget-0').contents();
		var linkColor = $('a').css('color');
		twitterFeed.find('li.tweet').css('font-family','Verdana');
		twitterFeed.find('.e-entry-content').css('font-family','Verdana');
		twitterFeed.find('.summary').css('font-family','Verdana');
		twitterFeed.find('.e-entry-title').css('font-family','Verdana');
		twitterFeed.find('.e-entry-title a').css('color', linkColor);
		twitterFeed.find('.retweet-credit').css('font-family','Verdana');
	},1500);
};

$(document).ready(function(){
	if ($('.region-map-county')) {
		$('.region-map-county').tooltip();

		$('.region-map-county').on('click', function() {
			var region = $(this).attr('region').toLowerCase();
			$('.region-info').not($('#' + region)).toggle(false);
			$('#' + region).toggle(true);
		});
	}
	customizeTwitter();
});
