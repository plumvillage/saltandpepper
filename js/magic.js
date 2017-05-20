jQuery(function($){
	$grid = $('.isotope-container');
	$grid.isotope({
		itemSelector: '.pv_book',
		layoutMode: 'fitRows',
		percentPosition: false,
		fitRows: {
			columnWidth: '.pv_book',
			gutter: '.gutter-sizer'
		}
	})
	
	$grid.imagesLoaded().progress( function() {
		$grid.isotope('layout');
	});
	
	$('.filter-isotope').on( 'click', 'a', function(e) {
		var el = $(this);
		var filterValue = '';
		el.closest('ul').find('a.active').removeClass('active');
		el.addClass('active')
		$('.filter-isotope a.active').each(function(){
			filterValue += $(this).attr('data-filter');
		})
		$grid.isotope({ filter: filterValue });
		e.preventDefault();
	});

	
	if($('#ppp_hidden_fields').length){
		var urlParams;
		(window.onpopstate = function () {
		    var match,
		        pl     = /\+/g,  // Regex for replacing addition symbol with a space
		        search = /([^&=]+)=?([^&]*)/g,
		        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
		        query  = window.location.search.substring(1);
		
		    urlParams = {};
		    while (match = search.exec(query))
		       urlParams[decode(match[1])] = decode(match[2]);
		})();
		for(var key in urlParams){
			if($('#'+key).length){
				$('#'+key).val(urlParams[key])
			}
		}
	}
})