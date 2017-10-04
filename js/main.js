function abc(n) {
	return (n + "").split("").reverse().join("").replace(/(\d{3})/g, "$1 ").split("").reverse().join("").replace(/^ /, "");
}


// ф-ия для футтера снизу страницы
footerOnBottom = function () {
  var vh = $('footer').outerHeight(true);
  $('.page-wrapp').css('padding-bottom', vh)
}

countTtlPrice2 = function () {
	var a = parseInt($('#goodsTtlPrice').text().replace(/\D+/g,"")),
		b = parseInt($('#goodsDiscount').text().replace(/\D+/g,"")),
		c;
	// c = a - b;
	c = a;
	$('#ttlPrice2').html(abc(c) + ' <span class="rouble">й</span>')
}
countDiscount = function () {
	var a = parseInt($('#goodsTtlPrice').text().replace(/\D+/g,"")),
		b = $('#goodsDiscount').attr('data-discount'),
		c;
	c = a * b;
	c = Math.round(c);
	$('#goodsDiscount').html('<b>' + abc(c) + ' </b><span class="rouble">й</span>')
}
countItemsNumber = function () {
	var a = 0;
	$('.cart-wrap_left-block_line').each(function () {
		a = a + parseInt($(this).find('input[type="number"]').val());
	})
	$('#goodsCounter').html('<b>' + a + '</b>');
}
countTtlPrice = function () {
	var a = 0;
	$('.cart-wrap_left-block_line').each(function () {
		var b = parseInt($(this).find('.price').text().replace(/\D+/g,""));
		var c = parseInt($(this).find('input[type="number"]').val());
		a = a + (b * c);
	})
	$('#goodsTtlPrice').html('<b>' + abc(a) + ' </b><span class="rouble">й</span>');
}

countTtlWeight = function () {
	var a = 0;
	$('.cart-wrap_left-block_line').each(function () {
		var b = parseFloat($(this).attr('data-weight'));
		var c = parseInt($(this).find('input[type="number"]').val());
		a = a + (b * c);
		// alert(b);
	})
	$('#goodsWeight').html('<b>' + a.toFixed(2) + ' кг');
}
showGoTopButton = function () {
	var scrollTop = $(window).scrollTop();
	if (scrollTop >= 300) {
		$('.go-to-top').addClass('active');
	} else {
		$('.go-to-top').removeClass('active');
	}
}


$(document).ready(function() {
	// прижать футер к низу
	footerOnBottom();
	$('.home-slider-wrap').owlCarousel({
		autoPlay: 5000,
		singleItem: true,
		navigation: false,
		pagination: true
	});

	showGoTopButton();

	$('.main-partners-block-wrap_slider').owlCarousel({
		autoPlay: false,
		navigation: false,
		pagination: true,
		itemsCustom: [[0, 2], [320, 2], [450, 4], [768, 5], [990, 6], [1200, 7]]
	});

	$('.good-item_similar-slider_slider').owlCarousel({
		autoPlay: false,
		navigation: false,
		pagination: true,
		itemsCustom: [[0, 1], [400, 1], [600, 3], [768, 3], [990, 4], [1200, 5]]
	});

	var sync1 = $(".good-item_slider-wrap_big");
	var sync2 = $(".good-item_slider-wrap_thumbs");
	sync1.owlCarousel({
		singleItem : true,
		slideSpeed : 1000,
		navigation: false,
		pagination: true,
		afterAction : syncPosition,
		responsiveRefreshRate : 200,
	});
	sync2.owlCarousel({
		itemsCustom: [[0, 2], [320, 2], [450, 4], [768, 5], [990, 4], [1200, 4]],
		pagination: false,
		navigation: true,
		navigationText: ['<svg class="svg-icon arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>','<svg class="svg-icon arrow-icon">                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>'],
		responsiveRefreshRate : 100,
		afterInit : function(el){
		  el.find(".owl-item").eq(0).addClass("synced");
		}
	});
	function syncPosition(el){
		var current = this.currentItem;
		$(".good-item_slider-wrap_thumbs")
		  .find(".owl-item")
		  .removeClass("synced")
		  .eq(current)
		  .addClass("synced")
		if($(".good-item_slider-wrap_thumbs").data("owlCarousel") !== undefined){
		  center(current)
		}
	}
	$(".good-item_slider-wrap_thumbs").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	});
	function center(number){
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for(var i in sync2visible){
		  if(num === sync2visible[i]){
		    var found = true;
		  }
		}
		if(found===false){
		  if(num>sync2visible[sync2visible.length-1]){
		    sync2.trigger("owl.goTo", num - sync2visible.length+2)
		  }else{
		    if(num - 1 === -1){
		      num = 0;
		    }
		    sync2.trigger("owl.goTo", num);
		  }
		} else if(num === sync2visible[sync2visible.length-1]){
		  sync2.trigger("owl.goTo", sync2visible[1])
		} else if(num === sync2visible[0]){
		  sync2.trigger("owl.goTo", num-1)
		}
	}

	$('.main-items-wrap_items-place_item_buttons-wrap span.plus').on('click', function () {
		var curVal = parseInt($(this).siblings('input').val());
		$(this).siblings('input').val(curVal+1);
		if($('.cart-wrap_left-block_line').length > 0) {
			countTtlPrice();
			countItemsNumber();
			countDiscount();
			countTtlPrice2();
			countTtlWeight();
		}
	})
	$('.main-items-wrap_items-place_item_buttons-wrap span.minus').on('click', function () {
		var curVal = parseInt($(this).siblings('input').val()),
			minVal = parseInt($(this).siblings('input').attr('data-min-value'));
		if ((curVal - 1) >= minVal) {
			$(this).siblings('input').val(curVal-1);
		}
		if($('.cart-wrap_left-block_line').length > 0) {
			countTtlPrice();
			countItemsNumber();
			countDiscount();
			countTtlPrice2();
			countTtlWeight();
		}
	})

	$('.main-items-wrap_items-mob-slider').owlCarousel({
		autoPlay: false,
		navigation: true,
		navigationText: ['<svg class="svg-icon arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>','<svg class="svg-icon arrow-icon">                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>'],
		pagination: false,
		itemsCustom: [[0, 1], [500, 2], [700, 3], [990, 6], [1200, 7]]
	})

	$('.mob-button-trigger.catalog-mob-trigger').on('click', function () {
		$('#mob-menu-left').modal('show');
	})

	$('.mob-button-trigger.menu-mob-trigger').on('click', function () {
		$('#mob-menu-right').modal('show');
	})

	$('.main-nav-wrap_catalog-open-trigger').on('click', function () {
		var par = $('.main-nav-wrap');
		if ($(this).hasClass('active')) {
			// par.removeClass('active');
			$(this).removeClass('active');
			$('.main-nav-wrap_inner').slideUp('slow');
		} else {
			// par.addClass('active');
			$(this).addClass('active');
			$('.main-nav-wrap_inner').slideDown('slow');
		}
		return false;	
	})

	$('.full_catalog-categories-wrap_col_show-more').on('click', function () {
		var par = $(this).siblings('ul');
		if (par.hasClass('active')) {
			par.removeClass('active');
			$(this).find('span').text('Весь список');
		} else {
			par.addClass('active');
			$(this).find('span').text('Скрыть');
		}
		return false;
	})

	$('.full_catalog-categories-wrap_col > ul > li.w-ul > a').on('click', function () {
		var par = $(this).closest('.w-ul');
		if (par.hasClass('active')) {
			par.removeClass('active');
			par.find('.nav-ul_second-lvl_ul').slideUp('slow');
		} else {
			$('.full_catalog-categories-wrap_col > ul > li.w-ul').removeClass('active').find('.nav-ul_second-lvl_ul').slideUp('slow');

			par.addClass('active');
			par.find('.nav-ul_second-lvl_ul').slideDown('slow');

		}
		return false;
	})

	$( "#priceRangeSlider" ).slider({
	    range: true,
	    min: 100,
	    max: 20000,
	    values: [ 100, 20000 ],
	    create: function( event, ui ) {
	    	$('.ui-slider-handle:first-of-type').append('<svg class="svg-icon arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>');
	    	$('.ui-slider-handle:last-of-type').append('<svg class="svg-icon arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg>');
	    	var min = $(this).slider("option", "min");
	    	var max = $(this).slider("option", "max");
	    	min = abc(min);
	    	max = abc(max);
	    	$('.catalog-filter-block_price_inputs .from input').val(min);
	    	$('.catalog-filter-block_price_inputs .to input').val(max);
	    },
	    slide: function( event, ui ) {
	    	var min = ui.values[0];
	    	var max = ui.values[1];
	    	min = abc(min);
	    	max = abc(max);
	    	$('.catalog-filter-block_price_inputs .from input').val(min);
	    	$('.catalog-filter-block_price_inputs .to input').val(max);
	    	$('.catalog-filter-buttons_show').removeClass('unactive');
        }
	});

	$('#priceRangeSlider').draggable();
	
	$('.catalog-filter-block_price_inputs .from input').on('change', function () {
		var val = $(this).val();
		val = parseInt(val);
		console.log('changed');
		if ((val >= $( "#priceRangeSlider" ).slider("option", "min")) && (val <= $( "#priceRangeSlider" ).slider("option", "max")) && (val <= $( "#priceRangeSlider" ).slider("values", 1))) {
			$(this).val(abc(val));
			$( "#priceRangeSlider" ).slider( "values", 0, val);
		} else {
			$(this).val($( "#priceRangeSlider" ).slider("option", "min"));
			var min = $( "#priceRangeSlider" ).slider("option", "min");
			$( "#priceRangeSlider" ).slider( "values", 0, min);

		}
	});
	$('.catalog-filter-block_price_inputs .to input').on('change', function () {
		var val = $(this).val();
		val = parseInt(val);
		if ((val >= $( "#priceRangeSlider" ).slider("option", "min")) && (val <= $( "#priceRangeSlider" ).slider("option", "max")) && (val >= $( "#priceRangeSlider" ).slider("values", 0))) {
			$(this).val(abc(val));
			$( "#priceRangeSlider" ).slider( "values", 1, val);
		} else {
			$(this).val($( "#priceRangeSlider" ).slider("option", "max"));
			var max = $( "#priceRangeSlider" ).slider("option", "max");
			$( "#priceRangeSlider" ).slider( "values", 1, max);
		}
	});

	if ($('.catalog-filter-block').length > 0) {
		$('.catalog-filter-block').each(function () {
			var par = $(this);
			var child = par.find('.catalog-filter-block_body');
			if (par.hasClass('active')) {
				child.slideDown();
			}
		})
	}

	$('.catalog-filter-block_title').on('click', function () {
		var par = $(this).closest('.catalog-filter-block');
		var child = par.find('.catalog-filter-block_body');
		if (par.hasClass('active')) {
			par.removeClass('active');
			child.slideUp();

		} else {
			par.addClass('active');
			child.slideDown();
		}
	})

	$('.catalog-filter-buttons_reset button').on('click', function () {
		var min = $( "#priceRangeSlider" ).slider("option", "min");
		$( "#priceRangeSlider" ).slider( "values", 0, min);
		var max = $( "#priceRangeSlider" ).slider("option", "max");
		$( "#priceRangeSlider" ).slider( "values", 1, max);
		$('.catalog-filter-block_price_inputs .from input').val(abc(min));
		$('.catalog-filter-block_price_inputs .to input').val(abc(max));
		$('.catalog-filter-block').find('input[type="checkbox"]').attr('checked', false);;
	})

	$('.catalog-filter-block input').on('change', function () {
		$('.catalog-filter-buttons_show').removeClass('unactive');
	})

	$('.catalog-nav_title.visible-xs.visible-sm').on('click', function () {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');

		} else {
			$(this).addClass('active');
		}
	})
	
	$('.catalog-filter_title.visible-xs.visible-sm').on('click', function () {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');

		} else {
			$(this).addClass('active');
		}
	})

	$('.catalog-title-line_view-style > div').on('click', function () {
		$('.catalog-title-line_view-style > div').removeClass('active');
		$(this).addClass('active');
		if ($(this).hasClass('line-style')) {
			$('.catalog-items-wrap').addClass('line-style');
			$('.main-items-wrap_items-place_item').addClass('line-style');
		} else {
			$('.catalog-items-wrap').removeClass('line-style');
			$('.main-items-wrap_items-place_item').removeClass('line-style');
		}
	})

	$('.reg-wrap_type-chose input').on('change', function () {
		if ($('#secondBlockTriggerRadio').prop('checked')) {
			$('#rightBlock').addClass('active');
		} else {
			$('#rightBlock').removeClass('active');
		}
	})

	
	$('.personal-info-wrap_line').on('click', '.edit-icon', function () {
		$('.personal-info-wrap_line .text2').removeClass('edit');
		$(this).closest('.personal-info-wrap_line').find('.text2').addClass('edit');
		var input = $(this).closest('.personal-info-wrap_line').find('input');
		input.focus();
		var tmpStr = input.val();
		input.val('');
		input.val(tmpStr);
	})

	$(document).click(function(event) {
		if ($(event.target).closest(".text2.edit").length || $(event.target).closest(".edit-icon").length) return;
		$(".text2.edit").removeClass('edit');
		event.stopPropagation();
	});

	$('.personal-info-wrap_line input').on('change', function () {
		val = $(this).val();
		$(this).closest('.personal-info-wrap_line').find('.text2').find('span').text(val);
	});

	if ($('#contactsMapPlace').length > 0) {
		// alert();
		var map;
		var map_center;
		function initialize() {
		    var center_w = 56.350017;
		    var center_h = 43.806143;

		    map_center = new google.maps.LatLng(center_w, center_h)

		    var mapCanvas = document.getElementById('contactsMapPlace');
		    var mapOptions = {
		      center: map_center,
		      zoom: 16,
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
		      scrollwheel: false,
		      draggable: true,
		    }
		    map = new google.maps.Map(mapCanvas, mapOptions);
		    var icon1 = "img/template/map-icon.png";
		    var myLatLng = new google.maps.LatLng(56.350017, 43.806143);
		    var beachMarker = new google.maps.Marker({
		          position: myLatLng,
		          map: map,
		          icon: icon1
		    });
		    google.maps.event.addListener(map, 'dblclick', function(event){
		        this.setOptions({scrollwheel:true});
		    });
		    google.maps.event.addListener(map, 'mouseout', function(event){
		        this.setOptions({scrollwheel:false});
		    });
		}
		google.maps.event.addDomListener(window, "resize", function() {
			var center = map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center); 
		});
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	countTtlPrice();
	countItemsNumber();
	countDiscount();
	countTtlPrice2();
	countTtlWeight();

	$('.cart-wrap_left-block_line').on('click', '.remove-icon-wrap', function () {
		$(this).closest('.cart-wrap_left-block_line').remove();
		countTtlPrice();
		countItemsNumber();
		countDiscount();
		countTtlPrice2();
		countTtlWeight();
	})
	$('.cart-wrap_left-block_line .count-btn-wrap input').on('change', function () {
		countTtlPrice();
		countItemsNumber();
		countDiscount();
		countTtlPrice2();
		countTtlWeight();
	})
	$('.cart-wrap_left-block_line .count-btn-wrap span').on('click', '.remove-icon-wrap', function () {
		countTtlPrice();
		countItemsNumber();
		countDiscount();
		countTtlPrice2();
		countTtlWeight();
	})

	$('.to-cart-btn-wrap button').on('click', function () {
		$('#add-to-cart').modal('show');
	})

	$('.go-to-top').on('click', function () {
		$("html, body").animate({ scrollTop: 0 }, 300);
		return false;
	})
})

$(window).on('resize', function () {
	// прижать футер к низу
	footerOnBottom();
	showGoTopButton();
})
$(window).on('scroll', function () {
	showGoTopButton();
})