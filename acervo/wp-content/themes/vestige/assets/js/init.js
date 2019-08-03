jQuery(function($){
	"use strict";

var VESTIGE = window.VESTIGE || {};
VESTIGE.megaMenu = function() {
        jQuery('.megamenu-sub-title').closest('ul.sub-menu').wrapInner('<div class="row" />').wrapInner('<div class ="megamenu-container container" />').wrapInner('<li />');
        jQuery('.megamenu-container').closest('li.menu-item-has-children').addClass('megamenu');
        var $class = '';
		jQuery(".megamenu-container").each(function(index, elem) {
    var numImages = $(this).find('.row').children().length;
	switch (numImages)
        {
            case 1:
                $class = 12;
                break;
            case 2:
                $class = 6;
                break;
            case 3:
                $class = 4;
                break;
            case 4:
                $class = 3;
                break;
            default:
                $class = 2;
        }
		$(this).find('.row').find('.col-md-3').each(function() {
            jQuery(this).removeClass('col-md-3').addClass('col-md-' + $class);
        })
		//$('.megamenu-container .row .div:has(.col-md-3)').addClass('col-md-' + $class).removeClass('col-md-3');
		//jQuery(this).find('.row').children().addClass('col-md-' + $class).removeClass('col-md-3');
    // do whatever processing you wanted to with numImages here
});
}
/* ==================================================
	Contact Form Validations
================================================== */
	VESTIGE.ContactForm = function(){
		$('.contact-form').each(function(){
			var formInstance = $(this);
			formInstance.submit(function(){
		
			var action = $(this).attr('action');
		
			$("#message").slideUp(750,function() {
			$('#message').hide();
		
			$('#submit')
				.after('<img src="' + $('#image_path').val() + '/assets/images/assets/ajax-loader.gif" class="loader" />')
				.attr('disabled','disabled');
		
			$.post(action, {
				fname: $('#fname').val(),
				lname: $('#lname').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				comments: $('#comments').val()
			},
				function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('.contact-form img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit').removeAttr('disabled');
					if(data.match('success') != null) $('.contact-form').slideUp('slow');
		
				}
			);
			});
			return false;
		});
		});
	}
/* ==================================================
	Scroll to Top
================================================== */
	VESTIGE.scrollToTop = function(){
		var windowWidth = $(window).width(),
			didScroll = false;
	
		var $arrow = $('#back-to-top');
	
		$arrow.on("click", function(e) {
			$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
			e.preventDefault();
		})
	
		$(window).scroll(function() {
			didScroll = true;
		});
	
		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
	
				if( $(window).scrollTop() > 200 ) {
					$arrow.fadeIn();
				} else {
					$arrow.fadeOut();
				}
			}
		}, 250);
	}
/* ==================================================
   Accordion
================================================== */
	VESTIGE.accordion = function(){
		var accordion_trigger = $('.accordion-heading.accordionize');
		
		accordion_trigger.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				accordion_trigger.find('.active').addClass('inactive');          
				accordion_trigger.find('.active').removeClass('active');   
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Toggle
================================================== */
	VESTIGE.toggle = function(){
		var accordion_trigger_toggle = $('.accordion-heading.togglize');
		
		accordion_trigger_toggle.delegate('.accordion-toggle','click', function(event){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			event.preventDefault();
		});
	}
/* ==================================================
   Tooltip
================================================== */
	VESTIGE.toolTip = function(){ 
		$('a[data-toggle=tooltip]').tooltip(); 
		$('a[data-toggle=tooltip]').tooltip();
		$('a[data-toggle=popover]').popover({html:true}).on("click", function(e) { 
       		e.preventDefault(); 
       		$(this).focus(); 
		});
	}
/* ==================================================
   Hero Flex Slider
================================================== */
	VESTIGE.heroflex = function() {
		$('.heroflex').each(function(){
				var carouselInstance = $(this); 
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false
				
				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",               
					direction: carouselDirection,       
					slideshow: carouselAutoplay,              
					slideshowSpeed: carouselSpeed,         
					animationSpeed: 600,         
					initDelay: 0,              
					randomize: false,            
					pauseOnHover: carouselPause,       
					controlNav: carouselPagination,           
					directionNav: carouselArrows,            
					prevText: "",         
					nextText: ""
				});
		});
	}
/* ==================================================
   Flex Slider
================================================== */
	VESTIGE.galleryflex = function() {
		$('.galleryflex').each(function(){
				var carouselInstance = $(this); 
				var carouselAutoplay = carouselInstance.attr("data-autoplay") == 'yes' ? true : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselDirection = carouselInstance.attr("data-direction") ? carouselInstance.attr("data-direction") : "horizontal"
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselSpeed = carouselInstance.attr("data-speed") ? carouselInstance.attr("data-speed") : "5000"
				var carouselPause = carouselInstance.attr("data-pause") == 'yes' ? true : false
				
				carouselInstance.flexslider({
					animation: carouselStyle,
					easing: "swing",               
					direction: carouselDirection,       
					slideshow: carouselAutoplay,              
					slideshowSpeed: carouselSpeed,         
					animationSpeed: 600,         
					initDelay: 0,              
					randomize: false,            
					pauseOnHover: carouselPause,       
					controlNav: carouselPagination,           
					directionNav: carouselArrows,            
					prevText: "",          
					nextText: ""
				});
		});
	}
/* ==================================================
   Owl Carousel
================================================== */
	VESTIGE.OwlCarousel = function() {
		$('.owl-carousel').each(function(){
				var carouselInstance = $(this); 
				var carouselColumns = carouselInstance.attr("data-columns") ? carouselInstance.attr("data-columns") : "1"
				var carouselitemsDesktop = carouselInstance.attr("data-items-desktop") ? carouselInstance.attr("data-items-desktop") : "4"
				var carouselitemsDesktopSmall = carouselInstance.attr("data-items-desktop-small") ? carouselInstance.attr("data-items-desktop-small") : "3"
				var carouselitemsTablet = carouselInstance.attr("data-items-tablet") ? carouselInstance.attr("data-items-tablet") : "2"
				var carouselitemsMobile = carouselInstance.attr("data-items-mobile") ? carouselInstance.attr("data-items-mobile") : "1"
				var carouselAutoplay = carouselInstance.attr("data-autoplay") ? carouselInstance.attr("data-autoplay") : false
				var carouselPagination = carouselInstance.attr("data-pagination") == 'yes' ? true : false
				var carouselArrows = carouselInstance.attr("data-arrows") == 'yes' ? true : false
				var carouselSingle = carouselInstance.attr("data-single-item") == 'yes' ? true : false
				var carouselStyle = carouselInstance.attr("data-style") ? carouselInstance.attr("data-style") : "fade"
				var carouselRTL = carouselInstance.attr("data-rtl") ? carouselInstance.attr("data-rtl") : "rtl"
				
				carouselInstance.owlCarousel({
					items: carouselColumns,
					autoPlay : carouselAutoplay,
					navigation : carouselArrows,
					pagination : carouselPagination,
					itemsDesktop:[1199,carouselitemsDesktop],
					itemsDesktopSmall:[979,carouselitemsDesktopSmall],
					itemsTablet:[768,carouselitemsTablet],
					itemsMobile:[479,carouselitemsMobile],
					singleItem:carouselSingle,
					navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
					stopOnHover: true,
					lazyLoad: true,
					direction: carouselRTL,
					transitionStyle: 'carouselStyle'
				});
		});
	}
/* ==================================================
   Nivo Slider
================================================== */
	VESTIGE.NivoSlider = function() {
		$('.nivoSlider').each(function(){
				var nivoInstance = $(this); 
				var nivoAutoplay = nivoInstance.attr("data-autoplay") == 'no' ? true : false
				var nivoPagination = nivoInstance.attr("data-pagination") == 'yes' ? true : false
				var nivoArrows = nivoInstance.attr("data-arrows") == 'yes' ? true : false
				var nivoThumbs = nivoInstance.attr("data-thumbs") == 'yes' ? true : false
				var nivoEffect = nivoInstance.attr("data-effect") ? nivoInstance.attr("data-effect") : "random"
				var nivoSlices = nivoInstance.attr("data-slices") ? nivoInstance.attr("data-slices") : "15"
				var nivoanimSpeed = nivoInstance.attr("data-animSpeed") ? nivoInstance.attr("data-animSpeed") : "500"
				var nivopauseTime = nivoInstance.attr("data-pauseTime") ? nivoInstance.attr("data-pauseTime") : "3000"
				var nivoPause = nivoInstance.attr("data-pauseonhover") == 'yes' ? true : false
				
				nivoInstance.nivoSlider({
					effect: nivoEffect,
					slices: nivoSlices,
					animSpeed: nivoanimSpeed,
					pauseTime: nivopauseTime,
					directionNav: nivoArrows,
					controlNav: nivoPagination,
					controlNavThumbs: nivoThumbs,
					pauseOnHover: nivoPause,
					manualAdvance: nivoAutoplay
				});
		});
	}
/* ==================================================
   PrettyPhoto
================================================== */
	VESTIGE.PrettyPhoto = function() {
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			  opacity: 0.5,
			  social_tools: "",
			  deeplinking: false
		});
	}
/* ==================================================
   Animated Counters
================================================== */
	VESTIGE.Counters = function() {
		$('.counters').each(function () {
			$(".timer .count").appear(function() {
			var counter = $(this).html();
			$(this).countTo({
				from: 0,
				to: counter,
				speed: 2000,
				refreshInterval: 60
				});
			});
		});
		
		$(".countdown .timer .count").appear(function() {
		var counter = $(this).html();
		$(this).countTo({
			from: 0,
			to: counter,
			speed: 2000,
			refreshInterval: 60,
			});
		});
	}
/* ==================================================
   SuperFish menu
================================================== */
	VESTIGE.SuperFish = function() {
		$('.sf-menu').superfish({
			  delay: 200,
			  animation: {opacity:'show', height:'show'},
			  speed: 'fast',
			  cssArrows: false,
			  disableHI: true
		});
		var aa = $(".dd-menu li");
        aa.each(function() {
            var aa = $(window).width() - 16, t = $(this).offset().left, o = $(this).find("ul.sub-menu").width(), n = 0;
            n = $("body").hasClass("boxed") ? urlajax_gaea.siteWidth - (t - (aa - urlajax_gaea.siteWidth) / 2) :aa - t;
            var d;
            $(this).find("ul.sub-menu").length > 0 && (d = n - o), (o > n || o > d) && ($(this).find("ul.sub-menu").addClass("right"),$(this).addClass("right-align-menu"), 
            $(this).find("ul.sub-menu").addClass("right"));
        });
	}
/* ==================================================
   Header Functions
================================================== */
	VESTIGE.StickyHeader = function() {
		$('.header-style1 .site-header, .header-style2 .site-header').sticky();
		$('.header-style3 .main-navbar').sticky();
		if($(window).width() < 992){$('.header-style3 .site-header').sticky();}
	}
/* ==================================================
	Responsive Nav Menu
================================================== */
	VESTIGE.MobileMenu = function() {
		// Responsive Menu Events
		$('#menu-toggle').on("click", function(){
			$(this).toggleClass("opened");
			$(".toggle-menu").slideToggle();
			return false;
		});
		$(window).resize(function(){
			if($("#menu-toggle").hasClass("opened")){
				$(".toggle-menu").css("display","block");
			} else {
				$("#menu-toggle").css("display","none");
			}
		});
	}
/* ==================================================
   IsoTope Portfolio
================================================== */
		VESTIGE.IsoTope = function() {	
		$("ul.sort-source").each(function() {
			var source = $(this);
			var destination = $("ul.sort-destination[data-sort-id=" + $(this).attr("data-sort-id") + "]");
			if(destination.get(0)) {
				$(window).load(function() {
					destination.isotope({
						itemSelector: ".grid-item",
						layoutMode: 'sloppyMasonry'
					});
					source.find("a").on("click", function(e) {
						e.preventDefault();
						var $this = $(this),
							filter = $this.parent().attr("data-option-value");
						source.find("li.active").removeClass("active");
						$this.parent().addClass("active");
						destination.isotope({
							filter: filter
						});
						if(window.location.hash != "" || filter.replace(".","") != "*") {
							self.location = "#" + filter.replace(".","");
						}
						return false;
					});
					$(window).on("hashchange", function(e) {
						var hashFilter = "." + location.hash.replace("#",""),
							hash = (hashFilter == "." || hashFilter == ".*" ? "*" : hashFilter);
						source.find("li.active").removeClass("active");
						source.find("li[data-option-value='" + hash + "']").addClass("active");
						destination.isotope({
							filter: hash
						});
					});
					var hashFilter = "." + (location.hash.replace("#","") || "*");
					var initFilterEl = source.find("li[data-option-value='" + hashFilter + "'] a");
					if(initFilterEl.get(0)) {
						source.find("li[data-option-value='" + hashFilter + "'] a").click();
					} else {
						source.find("li:first-child a").click();
					}
				});
			}
		});
		$(window).load(function() {
			var IsoTopeCont = $(".isotope-grid");
			IsoTopeCont.isotope({
				itemSelector: ".grid-item",
				layoutMode: 'sloppyMasonry'
			});
			var EventGrid = $(".events-iso-grid");
			EventGrid.isotope({
				itemSelector: ".grid-item",
				layoutMode: 'fitRows'
			});
			var ExhiGrid = $(".exhibitions-iso-grid");
			ExhiGrid.isotope({
				itemSelector: ".grid-item",
				layoutMode: 'fitRows'
			});
			if ($(".grid-holder").length > 0){	
				var $container_blog = $('.grid-holder');
				$container_blog.isotope({
					itemSelector : '.grid-item'
				});
				$(window).resize(function() {
					var $container_blog = $('.grid-holder');
					$container_blog.isotope({
						itemSelector : '.grid-item'
					});
				});
			}
		});
	}
/* ==================================================
   Init Functions
================================================== */
$(document).ready(function(){
	VESTIGE.megaMenu();
	VESTIGE.ContactForm();
	VESTIGE.scrollToTop();
	VESTIGE.accordion();
	VESTIGE.toggle();
	VESTIGE.toolTip();
	VESTIGE.OwlCarousel();
	//VESTIGE.PrettyPhoto();
	VESTIGE.SuperFish();
	VESTIGE.Counters();
	VESTIGE.IsoTope();
	if(urlajax_gaea.sticky==1) {VESTIGE.StickyHeader(); }
	VESTIGE.heroflex();
	VESTIGE.galleryflex();
	VESTIGE.NivoSlider();
	VESTIGE.MobileMenu();
	$('.selectpicker').selectpicker({container:'body'});
	$('.datepicker').datepicker();
	ExFunc();
	WWHGetter();
	$('.widget_spacer-widget, .widget_hr-widget').parents('.panel-grid').css("margin-bottom",0);
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  var target = $(e.target).attr("href") // activated tab
	  if(target=="#venuetab")
		{
			$("#venuetab").css({"display":"block"});
		}
		else
		{
			$("#venuetab").css({"display":"none"});
		}
	});
	$('.ee-details-tab-nav .nav-tabs li').first().addClass('active');
	$('.ee-details-tab-nav .tab-content .tab-pane').first().addClass('active');
});

// DESIGN ELEMENTS //


/* Artwork details slider */
$('#artwork-thumbs').flexslider({
	animation: "slide",
	controlNav: false,
	animationLoop: false,
	slideshow: false,
	directionNav: true,
	itemWidth: 100,
	asNavFor: '#artwork-images',            
	prevText: "",          
	nextText: ""
});
   
$('#artwork-images').flexslider({
	animation: "slide",
	controlNav: false,
	animationLoop: false,
	smoothHeight: true,
	slideshow: false,
	sync: "#artwork-thumbs",            
	prevText: "",          
	nextText: ""
});
// Events Grid Time Stamp Positioning
$(".events-grid .grid-item").has(".grid-featured-img").find(".event-time").css("position","absolute");

// Homepage Exhibitions Timeline Equal Height
function ExFunc(){
	$('.exhibitions-timeline').each(function(){
		var timeline_slot = $(this).find('.timeline-slot').height();
		var timeline_stamp = $(this).find('.timeline-stamp-table').height();
		if (timeline_slot < timeline_stamp){
			$(this).find('.timeline-slot').css("height",timeline_stamp);
		}
		$(this).find('.timeline-stamp-table').css("height",timeline_slot);
	});
}

//Donation Modal
$(".donate-paypal").on("click", function(e) {
	var CauseName = $(this).parents(".list-item").find("h3").html();
	$(".payment-to-cause").html(CauseName);
});
$('select[name="donation amount"]').change(function(){
  if ($(this).val() === "Custom")
  {
    $('.custom-donate-amount').show();
	$('input[name="Custom Donation Amount"]').focus();
  }
  else
  {
    $('.custom-donate-amount').hide();
  }
});
// apply matchHeight to each item container's items
$('.content').each(function() {
	$(this).find('.owl-carousel .grid-item').find('.grid-item-content').matchHeight({
		//property: 'min-height'
	});
	$(this).find('.spaces-item').find('.grid-item-content').matchHeight({
		//property: 'min-height'
	});
});

// WINDOW RESIZE FUNCTIONS //
$(window).resize(function(){
	ExFunc();
	WWHGetter();
});

// Centering the dropdown menus
$(".main-navigation ul li").mouseover(function() {
	 var the_width = $(this).find("a").width();
	 var child_width = $(this).find("ul").width();
	 var width = ((child_width - the_width)/2);
	 $(this).find("ul").css('left', -width);
});

// Any Button Scroll to section
$('.scrollto').on("click", function(){
	$.scrollTo( this.hash, 800, { easing:'easeOutQuint' });
	return false;
});

$(".search-module-trigger").click(function(e){
	e.stopPropagation();
	$(".search-module-opened").toggle();
 	$('.cart-module-opened').hide();
	e.preventDefault();
});
$(".search-module-opened").click(function(e){
	e.stopPropagation();
});
$("#cart-module-trigger").click(function(e){
	e.stopPropagation();
	$(".cart-module-opened").toggle();
 	$('.search-module-opened').hide();
	e.preventDefault();
});
$(".cart-module-opened").click(function(e){
	e.stopPropagation();
});
$(document).click(function(e){
 	$('.search-module-opened, .cart-module-opened').hide();
});
// FITVIDS
$(".fw-video, .post-media").fitVids();

$(window).load(function(){
	$(".format-image").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='icon-expand'></i></span></span>");
	});
	$(".format-standard").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-arrow-right'></i></span></span>");
	});
	$(".gallery-grid .format-video").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='icon-music-play'></i></span></span>");
	});
	$(".gallery-grid .format-link").each(function(){
		$(this).find(".media-box").append("<span class='zoom'><span class='icon'><i class='fa fa-link'></i></span></span>");
	});
	$(".additional-images .owl-carousel .item-video").each(function(){
		$(this).append("<span class='icon'><i class='fa fa-play'></i></span>");
	});
	$('.carousel-wrapper').css('background','none');
	
});

// Icon Append
$(".cust-counter" ).wrapAll( "<section class=\"counters padding-tb45 accent-color text-align-center\"><div class=\"container\"><div class=\"row\">");
$("#comment-submit").wrapAll("<div class=\"row\"><div class=\"form-group\"><div class=\"col-md-12\">");
$("#comment-submit").addClass("btn btn-primary btn-lg");
$('.basic-link').append(' <i class="fa fa-angle-right"></i>');
$('.basic-link.backward').prepend(' <i class="fa fa-angle-left"></i> ');
$('ul.checks li, .add-features-list li').prepend('<i class="fa fa-check"></i> ');
$('ul.angles li, .widget_categories ul li a, .widget_archive ul li a, .widget_recent_entries ul li a, .widget_recent_comments ul li a, .widget_links ul li a, .widget_meta ul li a, .widget_nav_menu ul li a').prepend('<i class="fa fa-angle-right"></i> ');
$('ul.chevrons li').prepend('<i class="fa fa-chevron-right"></i> ');
$('ul.carets li, ul.inline li, .filter-options-list li').prepend('<i class="fa fa-caret-right"></i> ');
$('a.external').prepend('<i class="fa fa-external-link"></i> ');

// Animation Appear
var AppDel;
function AppDelFunction($appd) {
	$appd.addClass("appear-animation");
	if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {
		$appd.appear(function() {
			var delay = ($appd.attr("data-appear-animation-delay") ? $appd.attr("data-appear-animation-delay") : 1);
			if(delay > 1) $appd.css("animation-delay", delay + "ms");
			$appd.addClass($appd.attr("data-appear-animation"));
			setTimeout(function() {
				$appd.addClass("appear-animation-visible");
			}, delay);
			clearTimeout();
		}, {accX: 0, accY: -150});
	} else {
		$appd.addClass("appear-animation-visible");
	}
}
function AppDelStopFunction() {
	clearTimeout(AppDel);
}
$("[data-appear-animation]").each(function() {
	var $this = $(this);
	AppDelFunction($this);
	AppDelStopFunction();
});
// Animation Progress Bars

var AppAni;
function AppAniFunction($anim) {
	$anim.appear(function() {
		var delay = ($anim.attr("data-appear-animation-delay") ? $anim.attr("data-appear-animation-delay") : 1);
		if(delay > 1) $anim.css("animation-delay", delay + "ms");
		$anim.addClass($anim.attr("data-appear-animation"));
		setTimeout(function() {
			$anim.animate({
				width: $anim.attr("data-appear-progress-animation")
			}, 1500, "easeOutQuad", function() {
				$anim.find(".progress-bar-tooltip").animate({
					opacity: 1
				}, 500, "easeOutQuad");
			});
		}, delay);
		clearTimeout();
	}, {accX: 0, accY: -50});
}
function AppAniStopFunction() {
	clearTimeout(AppAni);
}
$("[data-appear-progress-animation]").each(function() {
	var $this = $(this);
	AppAniFunction($this);
	AppAniStopFunction();
});

// Parallax Jquery Callings
if(!Modernizr.touch) {
	$(window).on('load', function () {
		parallaxInit();						  
	});
}
function parallaxInit() {
	$('.parallax1').parallax("50%", 0.1);
	$('.parallax2').parallax("50%", 0.1);
	$('.parallax3').parallax("50%", 0.1);
	$('.parallax4').parallax("50%", 0.1);
	$('.parallax5').parallax("50%", 0.1);
	$('.parallax6').parallax("50%", 0.1);
	$('.parallax7').parallax("50%", 0.1);
	$('.parallax8').parallax("50%", 0.1);
	/*add as necessary*/
}

// Window height/Width Getter Classes
function WWHGetter(){
	var wheighter = $(window).height();
	var wwidth = $(window).width();
	$(".wheighter").css("height",wheighter);
	$(".wwidth").css("width",wwidth);
}
});