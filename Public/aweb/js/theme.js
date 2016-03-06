// Theme
window.theme = {};

// Scroll to Top
(function(theme, $) {

	theme = theme || {};

	$.extend(theme, {

		PluginScrollToTop: {

			defaults: {
				wrapper: $('body'),
				offset: 150,
				buttonClass: 'scroll-to-top',
				iconClass: 'fa fa-arrow-up',
				delay: 500,
				visibleMobile: false,
				label: false
			},

			initialize: function(opts) {
				initialized = true;

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts);

				return this;
			},

			build: function() {
				var self = this,
					$el;

				// Base HTML Markup
				$el = $('<a />')
					.addClass(self.options.buttonClass)
					.attr({
						'href': '#',
					})
					.append(
						$('<i />')
						.addClass(self.options.iconClass)
					);

				// Visible Mobile
				if (!self.options.visibleMobile) {
					$el.addClass('hidden-mobile');
				}

				// Label
				if (self.options.label) {
					$el.append(
						$('<span />').html(self.options.label)
					);
				}

				this.options.wrapper.append($el);

				this.$el = $el;

				return this;
			},

			events: function() {
				var self = this,
					_isScrolling = false;

				// Click Element Action
				self.$el.on('click', function(e) {
					e.preventDefault();
					$('body, html').animate({
						scrollTop: 0
					}, self.options.delay);
					return false;
				});

				// Show/Hide Button on Window Scroll event.
				$(window).scroll(function() {

					if (!_isScrolling) {

						_isScrolling = true;

						if ($(window).scrollTop() > self.options.offset) {

							self.$el.stop(true, true).addClass('visible');
							_isScrolling = false;

						} else {

							self.$el.stop(true, true).removeClass('visible');
							_isScrolling = false;

						}

					}

				});

				return this;
			}

		}

	});

}).apply(this, [window.theme, jQuery]);

// Carousel
(function(theme, $) {

	theme = theme || {};

	var instanceName = '__carousel';

	var PluginCarousel = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginCarousel.defaults = {
		loop: true,
		navText: ["<i class=\"fa fa-chevron-left\"></i>","<i class=\"fa fa-chevron-right\"></i>"],
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			},
			1199: {
				items: 4
			},
			1440: {
				items: 4
			},
			1920: {
				items: 5
			}
		}
	};

	PluginCarousel.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginCarousel.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			if (!($.isFunction($.fn.owlCarousel))) {
				return this;
			}

			var self = this,
				$el = this.options.wrapper,
				activeItemHeight = 0;

			// Force RTL according to HTML dir attribute
			if ($('html').attr('dir') == 'rtl') {
				this.options = $.extend(true, {}, this.options, {
					rtl: true
				});
			}

			if (this.options.items == 1) {
				this.options.responsive = {}
			}

			if (this.options.items > 4) {
				this.options = $.extend(true, {}, this.options, {
					responsive: {
						1199: {
							items: this.options.items
						}
					}
				});
			}

			// Auto Height
			$(window).afterResize(function() {
				activeItemHeight = $el.find('.owl-item.active').height();
				$el.find('.owl-stage-outer').height(activeItemHeight);
			});

			this.options.wrapper.owlCarousel(this.options).addClass("owl-carousel-init");

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginCarousel: PluginCarousel
	});

	// jquery plugin
	$.fn.themePluginCarousel = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginCarousel($this, opts);
			}

		});
	}

}).apply(this, [window.theme, jQuery]);

(function () {
	"use strict"; // use strict to start
	
	/* ---------------------------------------------
	// Scroll to Top Button.
    --------------------------------------------- */
	if ($.isFunction(theme.PluginScrollToTop.initialize)) {
		theme.PluginScrollToTop.initialize();
	}
	
	/* ---------------------------------------------
	// Carousel
    --------------------------------------------- */
	if ($.isFunction($.fn['themePluginCarousel'])) {

		$(function() {
			$('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginCarousel(opts);
			});
		});

	}
	/* ---------------------------------------------
    // Sticky Menu
    --------------------------------------------- */
	
	//Calculate the height of <header>
	//Use outerHeight() instead of height() if have padding
    var aboveHeight = $('header').outerHeight();
	
	// when scroll
    $(window).scroll(function(){
		
		//if scrolled down more than the header's height
        if ($(window).scrollTop() > aboveHeight){
			
			// if yes, add "fixed" class to the <nav>
			// add padding top to the #content (value is same as the height of the nav)
            $('header .navmain').addClass('fixed').css('top','0').parent().css('margin-top',80);
        } else {
			
			// when scroll up or less than aboveHeight, remove the "fixed" class, and the padding-top
            $('header .navmain').removeClass('fixed').parent().css('margin-top','0');
        }
    });
	
	/* ---------------------------------------------
    // Nav
    --------------------------------------------- */
	$('.navbar-main .navbar-nav li.dropdown').hover(function () {
        $(this).addClass('open');
    }, function () {
        $(this).removeClass('open');
    });
	
	/* ---------------------------------------------
	// Tooltips
    --------------------------------------------- */
	if ($.isFunction($.fn['tooltip'])) {
		$('[data-toggle="tooltip"]').tooltip();
	}
	
	/* ---------------------------------------------
	// animation
    --------------------------------------------- */
	var wow = new WOW(
	  {
		boxClass:     'wow',      // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset:       0,          // distance to the element when triggering the animation (default is 0)
		mobile:       true,       // trigger animations on mobile devices (default is true)
		live:         true,       // act on asynchronously loaded content (default is true)
		callback:     function(box) {
		  // the callback is fired every time an animation is started
		  // the argument that is passed in is the DOM node being animated
		}
	  }
	);
	wow.init();
	
	/* ---------------------------------------------
	// Masonry for desktop
    --------------------------------------------- */
	$(window).load( function() {
		if($(window).width() < 568) return;
			
		var $container = $('.masonry-posts .masonry-desk');
		// initialize
		
		$container.imagesLoaded( function() {
			$container.masonry();
		});
		var $items = document.querySelectorAll('.post-masonry-item');
		imagesLoaded( $items, function() {
			$container.masonry({
				itemSelector: '.post-masonry-item'
			});
		});
	});
	
	/* ---------------------------------------------
	// Flickr gallery
    --------------------------------------------- */
	$('#flickr-gallery').jflickrfeed({
		limit: 8,
		qstrings: {
			id: '37304598@N02'
		},
		itemTemplate:
		'<li>' +
			'<a href="{{image}}" title="{{title}}">' +
				'<img src="{{image_s}}" alt="{{title}}" class="img-responsive">' +
			'</a>' +
		'</li>'
	}, function(data) {
		$('#flickr-gallery').magnificPopup({
			delegate: 'a',
			type:'image',
			gallery: {
				enabled:true
			}
		});
	});
	
	/* ---------------------------------------------
	// Instagram
    --------------------------------------------- */
	var pgl = {
		init: function () {
			this.initInstagram();
		},
		
		initInstagram: function () {
			var feeds = $('#instagram-feed');
			feeds.each(function (i, val) {
				pgl.instagramFeed(feeds.eq(i), {
					access_token: '',
					client_id: 'a112e49897514c17bf05596fdca4b5c2',
					count: feeds.eq(i).attr('data-instagram-items')
		        });
			});
		},

		instagramFeed: function (container, data) {
			var pattern, renderTemplate, storageObj, storageTime, url, _template;
			
			url = 'https://api.instagram.com/v1';

			pattern = function(obj) {
				var item, k, len, template;
				if (obj.length) {
					template = '';
					for (k = 0, len = obj.length; k < len; k++) {
						item = obj[k];
						template += "<a href='" + item.link + "' target='_blank'><img src='" + item.image + "' alt='" + "'></a>";
					}
					container.append(template);

				}
			};

			_template = function(obj) {
				var item, k, len, ref, results;
				if (obj.data) {
					ref = obj.data;
					results = [];
					for (k = 0, len = ref.length; k < len; k++) {
						item = ref[k];
						results.push({
							title: item.user.username,
							link: item.link,
							image: item.images.standard_resolution.url
						});
					}
					return results;
				}
			}

			if (container.data('instagram-tag')) {
				url += "/tags/" + (container.data('instagram-tag')) + "/media/recent";
				renderTemplate = _template;
				storageTime = new Date().getTime();
				
				$.ajax({
					dataType: "jsonp",
					url: url,
					data: data,
					success: function(response) {
						var instagramFeed;
						instagramFeed = {};
						instagramFeed.data = renderTemplate(response);
						instagramFeed.timestamp = new Date().getTime();
						pattern(instagramFeed.data);
						var $container = $('#instagram-feed');
						
						$container.imagesLoaded( function() {
							$container.masonry();
						});
						var $items = document.querySelectorAll('a');
						imagesLoaded( $items, function() {
							$container.masonry({
								itemSelector: 'a'
							});
						});
					}
				});
			}
			
		}
	};
	
	pgl.init();
	
})(jQuery);

