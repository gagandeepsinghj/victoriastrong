jQuery(function($){
	
'use strict';

	$(window).load(function(){
			
				
		// Loader Theme

		TweenMax.to($('#un-spin'), 0.5, { opacity: '0', marginBottom: '-40px',  ease: Power2.easeOut, delay: 3 });
		TweenMax.to($('#un-mask'), 0.5, { opacity: '0',  ease: Power2.easeOut, delay: 3.5 });
		TweenMax.set($('#un-mask'), { display: 'none', delay: 4 });


		// Open Menu Side

		$('.un-menu-o').on('click', function(){
						
			if( $(window).width() >= 800 ){

				TweenMax.to($('.un-hr-bar-l'), 0.5, {right: '50%', ease: Power2.easeOut});
                $('.un-hr-bar-l').css('margin-right', 0);

			} else {

				TweenMax.to($('.un-hr-bar-l'), 0.5, {right: '0', ease: Power2.easeOut});
                $('.un-hr-bar-l').css('margin-right', 0);

			}
			
		});

        // Close Menu Side
				
		$('.un-menu-x').on('click', function(){

            if( $(window).width() >= 1200 ) {

                TweenMax.to($('.un-hr-bar-l'), 0.5, {right: '100%', ease: Power2.easeOut});
                $('.un-hr-bar-l').css('margin-right', '-60px');

            } else {

                TweenMax.to($('.un-hr-bar-l'), 0.5, {right: '100%', ease: Power2.easeOut});
                $('.un-hr-bar-l').css('margin-right', '-30px');

            }
			
		});


        // Switch Menu Top Desktop / Mobile

        $('.un-menu-s').on( 'click', function(e){

            e.preventDefault();

            TweenMax.set( $('body'), { overflow: "hidden" } );
            TweenMax.to( $('#un-menu-m'), 0.5, { display: "block", opacity: 1,  ease:Power2.easeOut } );


            $('.un-menu-m-x').on( 'click', function(e){

                TweenMax.to( $('#un-menu-m'), 0.5, { display: "none", opacity: 0,  ease:Power2.easeOut } );

                setTimeout(function(){

                    TweenMax.set( $('body'), { overflow: "" } );
					
                }, 1500);


            });


        });
	

        // Scroll Menu Hide Side
		
		if( $(window).width() <= 1200 ){
		
			if( !$('#un-menu-vrt').hasClass('un-scroll') ){
				$('#un-menu-vrt').addClass('un-scroll');
			}
			
		}
		
        $('#un-menu-vrt.un-scroll').mCustomScrollbar({

            alwaysShowScrollbar: 0,
            autoHideScrollbar: true

        });	
		


        // Scroll Menu Mobile Top
        $('#un-menu-mob').mCustomScrollbar({

            alwaysShowScrollbar: 0,
            autoHideScrollbar: true

        });

		
		// Standrd Search

		$('.un-src-btn, .un-src-btn-top').on( 'click', function(e){
			
			e.preventDefault();
			
			TweenMax.set( $('body'), { overflow: "hidden" } );
			TweenMax.to( $('#un-src-mdl'), 0.5, { display: "block", opacity: 1,  ease:Power2.easeOut } );

			$('#un-src-field').focus();
			
			
			$('.un-src-x').on( 'click', function(){

				TweenMax.to( $('#un-src-mdl'), 0.5, { display: "none", opacity: 0,  ease:Power2.easeOut } );
				
				setTimeout(function(){

					TweenMax.set( $('body'), { overflow: "" } );

				}, 1500);
					
			});
			 
		});


        // Isotope Init

		$('.un-iso').each(function() {			

			var $container = $(this);

			$container.isotope({		 

				itemSelector: '.un-item',
				layoutMode: 'masonry',	
				masonry: {
				  columnWidth: '.un-size'
				}	

			});			

        });  // END Isotope Init 


        // Filter Isotope

        $('.un-flt a').on('click', function() {
            var selector = $(this).attr('data-filter');

            $('.un-iso').isotope({
                filter: selector
            });

            return false;
        });
		
		
		// ******* //
  		// EFFECTS //
		// ******* //
		
		// Open/Close Submenus Slide

		$('#un-menu-mob .un-menu li.menu-item-has-children').on({ 
		
			mouseenter: function(){
				
				var $sub = $(this).children('ul');
			
				$sub.stop(true, true).slideDown(300);
			
			},
			
			mouseleave: function(){
		
				var $sub = $(this).children('ul');
			
				$sub.slideUp(300);
			
			} 
			
		});
		
		// Vertical Menu - Submenus OPEN
		$('#un-menu-vrt .un-menu li.menu-item-has-children i.un-open').on('click', function(e){
			
			e.preventDefault();
						
			if( $(this).parent().parent().parent().hasClass('un-menu') ){
									
				$('#un-menu-vrt .un-menu > li .sub-menu').each(function(index, element) {
					$(this).stop(true, true).slideUp(200); 					
				});
				$('#un-menu-vrt .un-menu > li.menu-item-has-children i.un-close').each(function() {
					$(this).addClass('un-hide');
				});
				$('#un-menu-vrt .un-menu > li.menu-item-has-children i.un-open').each(function() {
					$(this).removeClass('un-hide');
				});
				
				// Start Action
				$(this).toggleClass('un-hide');
				$('.un-close', $(this).parent()).toggleClass('un-hide');	
							
				var $sub = $(this).parent().parent().children('ul'); 
				$sub.stop(true, true).slideDown(300);
				
			}else{
				
				// Start Action
				$(this).toggleClass('un-hide');
				$('.un-close', $(this).parent()).toggleClass('un-hide');	
							
				var $sub = $(this).parent().parent().children('ul'); 
				$sub.stop(true, true).slideDown(300);
				
			}
			
		});
		
		
		// Vertical Menu - Submenus CLOSE
		$('#un-menu-vrt .un-menu li.menu-item-has-children i.un-close').on('click', function(e){

			e.preventDefault();
			$(this).toggleClass('un-hide');
			$('.un-open', $(this).parent()).toggleClass('un-hide');	
			
			var $sub = $(this).parent().parent().children('ul'); 
			$sub.stop(true, true).slideUp(300);
			
		});
		
		
		// Top Menu - Submenu
		$('#un-menu-hor li').on({ 
		
			mouseenter: function(){
							
				var $sub = $(this).children('ul');
			
				TweenMax.killTweensOf($sub);
				TweenMax.to( $sub, 0.4, { display: "block", opacity: 1, marginTop:0,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $sub = $(this).children('ul');
				
				TweenMax.killTweensOf($sub);
				TweenMax.to( $sub, 0.4, { display: "none", opacity: 0, marginTop:'20px',  ease:Power2.easeOut } );
			
			} 
			
		});
		
		
		// On Scroll Events
		$(window).scroll(function(){
									
			var quote = $(window).scrollTop();
			
			// Sticky Menu
			var maxMarg = '40px';
			var maxPadd = '154px';
			
			if( $(window).width() <= 1200 ){
				maxMarg = '30px';
				maxPadd = '134px';
			}

			if(quote == 0){	
				TweenMax.to( $('.un-hr-pos'), 0.3, {margin: maxMarg+' 0', ease:Power2.easeOut});
				TweenMax.to( $('.un-head-bg-1'), 0.3, {paddingTop: maxPadd, ease:Power2.easeOut});
				$('.un-head-bg-0 .un-hr-top').removeClass('un-sticky');
			}else{
				TweenMax.to( $('.un-hr-pos'), 0.3, {margin:'10px 0', ease:Power2.easeOut});
				TweenMax.to( $('.un-head-bg-1'), 0.3, {paddingTop:'94px', ease:Power2.easeOut});
				$('.un-head-bg-0 .un-hr-top').addClass('un-sticky');
			}
			
			// Top Button
			if(quote > 100){	
				TweenMax.to($('.un-btn-top'), 0.5, {display:'block', opacity:1, ease:Power2.easeOut});
			}else{
				TweenMax.to($('.un-btn-top'), 0.5, {display:'none', opacity:0, ease:Power2.easeOut});
			}
			
			
		});
		
		
		// Portfolio Captions
		$('.un-work-p').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-work-h', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.3, { display: "block", opacity: 1,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-work-h', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.3, { display: "none", opacity: 0,  ease:Power2.easeOut } );
			
			} 
			
		});
		
		
		// Team Caption
		$('.un-tm-w').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-tm-d', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { marginTop: "-160px",  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-tm-d', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { marginTop: "-90px",  ease:Power2.easeOut } );
			
			} 
			
		});
	
		
		// Pricing Shadow
		$('.un-prc-w').on({ 
		
			mouseenter: function(){
				
				var $target = $(this);
				var $txt = $('.un-prc-l', this); 
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.4, {boxShadow: '0 30px 50px 0 rgba(0,0,0,0.08)', ease:Power2.easeOut });
				TweenMax.to($txt, 0.4, {marginLeft: '10px', ease:Power2.easeOut });
			
			},
			
			mouseleave: function(){
		
				var $target = $(this);
				var $txt = $('.un-prc-l', this); 
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.4, {boxShadow: '0 30px 50px 0 rgba(0,0,0,0)', ease:Power2.easeOut });
				TweenMax.to($txt, 0.4, {marginLeft: '0', ease:Power2.easeOut });
			
			} 
			
		});
		
		
		// Blog Cations
		$('.un-grid-m').on({ 
		
			mouseenter: function(){
				
				var $target = $('.un-grid-p',this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {display:'block', opacity:1, ease:Power2.easeOut });
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-grid-p',this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {display:'none', opacity:0, ease:Power2.easeOut });
			
			} 
			
		});
		
		
		// Top Button event
		$('.un-btn-top').on('click', function(){
			
			TweenMax.killTweensOf(window);
			TweenMax.to(window, 2, {scrollTo:{y:0}, ease:Power2.easeOut});
		
		});
		
		
		// Slider Arrows
		$('.owl-next').on({ 
		
			mouseenter: function(){
				
				var $target = $('.un-arr-w i',this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {marginLeft:'0px', ease:Power2.easeOut });
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-arr-w i',this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {marginLeft:'-30px', ease:Power2.easeOut });
			
			} 
			
		});
		
		$('.owl-prev').on({ 
		
			mouseenter: function(){
				
				var $target = $('.un-arr-w i',this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {marginLeft:'0px', ease:Power2.easeOut });
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-arr-w i',this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to($target, 0.3, {marginLeft:'30px', ease:Power2.easeOut });
			
			} 
			
		});
		
		
		// Portfolio Caption
		$('.un-work-p').on({ 
		
			mouseenter: function(){
				
				var $target = $('.un-work-rm',this);
				TweenMax.set($target, {transition:'none'});
				
				$target.stop(true, true).slideDown(300);
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-work-rm',this);
				TweenMax.set($target, {transition:'none'});
				
				$target.stop(true, true).slideUp(300);
			
			} 
			
		});
		
		
		// Case Studies Caption
		$('.un-case-p').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-case-h', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'block', opacity:1,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-case-h', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'none', opacity:0,  ease:Power2.easeOut } );
			
			} 
			
		});
		
		
		// Galleries Caption
		$('.un-pic-p').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-pic-h', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'block', opacity:1,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-pic-h', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'none', opacity:0,  ease:Power2.easeOut } );
			
			} 
			
		});
		
		$('.un-crs-p').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-crs-h', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'block', opacity:1,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-crs-h', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});

				TweenMax.to( $target, 0.4, { display: 'none', opacity:0,  ease:Power2.easeOut } );
			
			} 
			
		});
		
		
		// Blog Caption
		$('.un-blog-m').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-blog-i', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'block', opacity:1,  ease:Power2.easeOut } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-blog-i', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});
				
				TweenMax.to( $target, 0.4, { display: 'none', opacity:0,  ease:Power2.easeOut } );
			
			} 
			
		});
		
		
		// Blog Caption
		$('.un-prod-k').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-prod-h', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});				
				TweenMax.to( $target, 0.4, { display: 'block', opacity:1,  ease:Power2.easeOut } );
				
				
				var $target2 = $('.un-btn-cart', this);
			
				TweenMax.killTweensOf($target2);
				TweenMax.set($target2, {transition:'none'});
				TweenMax.to( $target2, 0.4, { opacity:1, marginRight:'10px', ease:Power2.easeOut, delay:0.2 } );
				
				var $target3 = $('.un-btn-view', this);
			
				TweenMax.killTweensOf($target3);
				TweenMax.set($target3, {transition:'none'});
				TweenMax.to( $target3, 0.4, { opacity:1, marginLeft:'10px', ease:Power2.easeOut, delay:0.2 } );
			
			},
			
			mouseleave: function(){
		
				var $target = $('.un-prod-h', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});				
				TweenMax.to( $target, 0.4, { display: 'none', opacity:0,  ease:Power2.easeOut } );
				
				var $target2 = $('.un-btn-cart', this);
				
				TweenMax.killTweensOf($target2);
				TweenMax.set($target2, {transition:'none'});				
				TweenMax.to( $target2, 0.4, { opacity:0, marginRight:'30px', ease:Power2.easeOut } );
			
				var $target3 = $('.un-btn-view', this);
				
				TweenMax.killTweensOf($target3);
				TweenMax.set($target3, {transition:'none'});				
				TweenMax.to( $target3, 0.4, { opacity:0, marginLeft:'30px', ease:Power2.easeOut } );
				
			} 
			
		});
		
		

        // Trigger Resize

        $(window).trigger('resize');
		
	});


    $(document).ready(function(){
			
		
		// Menu icon append
		$('#un-menu-vrt li.menu-item-has-children > a').each(function() {
            
			$(this).append('<i class="un-l-icon-uniE048 un-open"></i>');
			$(this).append('<i class="un-l-icon-uniE041 un-close un-hide"></i>');
			
        });

		
		// Loading Square Loop

		setTimeout(function(){
			
			var tl =  new TimelineMax({repeat:1000, repeatDelay:0});
			
			tl.to("#un-sqr-vrt", 1, { marginTop:'-70px', borderWidth:'35px', ease:Elastic. easeOut.config( 1, 0.75) });
			tl.to("#un-sqr-hor", 1, { marginLeft:'-70px', borderWidth:'35px', ease:Elastic. easeOut.config( 1, 0.75) });
			
			tl.to("#un-sqr-vrt", 1, { marginTop: 0, borderWidth:'10px',  ease:Elastic. easeOut.config( 1, 0.75) });			
			tl.to("#un-sqr-hor", 1, { marginLeft: 0, borderWidth:'10px', ease:Elastic. easeOut.config( 1, 0.75) });
			
			
		}, 1000);

		
        // Quotes

        $('.un-qt-s').owlCarousel({

            items: 1,
            itemsCustom: [[0,1],[2000,1]],
            navigation: true,
            pagination: false,
            autoPlay: true,
            stopOnHover: true,
            slideSpeed: 300,
            navigationText: ['<i class="un-fa-icon-chevron-up"></i>','<i class="un-fa-icon-chevron-down"></i>'],
            transitionStyle : "goDown"

        });


        // Related

        $('.un-crs-r').owlCarousel({

            items: 1,
            navigation: true,
            pagination: true,
            stopOnHover: true,
            autoPlay: true,
            slideSpeed: 300,
            navigationText: ['<div class="un-arr-w"><i class="un-l-icon-uniE066"></i></div>','<div class="un-arr-w"><i class="un-l-icon-uniE068"></i></div>'],

        });


        // Carousel

        $('.un-crs-multi').owlCarousel({

            items: $('this').data('items'),
            navigation: true,
            pagination: false,
            stopOnHover: true,
            autoPlay: false,
            itemsCustom: [[0, 1], [800, 2], [1200, 3], [1600, 4], [2000,5]],
            slideSpeed: 300,
            navigationText: ['<div class="un-arr-w"><i class="un-l-icon-uniE066"></i></div>','<div class="un-arr-w"><i class="un-l-icon-uniE068"></i></div>'],

        });


        // Slider

        $('.un-crs-one').owlCarousel({

            items: $('this').data('items'),
            navigation: true,
            pagination: false,
            stopOnHover: true,
            autoPlay: false,
            itemsCustom: [[0, 1], [2000,1]],
            slideSpeed: 300,
            navigationText: ['<div class="un-arr-w"><i class="un-l-icon-uniE066"></i></div>','<div class="un-arr-w"><i class="un-l-icon-uniE068"></i></div>'],

        });

        $('.un-sld-s').owlCarousel({

            items: 1,
            navigation: true,
            pagination: false,
            stopOnHover: true,
            autoPlay: false,
            itemsCustom: [[0, 1], [2000,1]],
            slideSpeed: 300,
            navigationText: ['<div class="un-arr-w"><i class="un-l-icon-uniE066"></i></div>','<div class="un-arr-w"><i class="un-l-icon-uniE068"></i></div>'],

        });


        // Lighbox Gallery

        $('.un-lb').magnificPopup({

            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'

        });
		
		
		/* WOOCOMMERCE */
		
		// Price Filter fix
		if ( $('.price_label').length ) {
			var oldHTML = $('.price_label').html();
			var newHTML = oldHTML.replace("Price:", "");
			var newHTML = newHTML.replace(" — ", "");
			$('.price_label').html(newHTML);
		}
		
		// Cart Tooltip
		$('.un-cart-icon').on({ 
		
			mouseenter: function(){
							
				var $target = $('.un-cart-info', this);
			
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});				
				TweenMax.to( $target, 0.3, { display: 'block', opacity:1, marginLeft: '10px',  ease:Power2.easeOut } );
				
			},
			
			mouseleave: function(){
		
				var $target = $('.un-cart-info', this);
				
				TweenMax.killTweensOf($target);
				TweenMax.set($target, {transition:'none'});				
				TweenMax.to( $target, 0.3, { display: 'none', opacity:0, marginLeft: '40px',  ease:Power2.easeOut } );
			
			} 
			
		});



        // Trigger Resize

        $(window).trigger('resize');

    });


    $(window).resize(function(){

		
		// Fix Vertical Alignment

        var fullH = $(window).height();


        if( $(window).width() >= 1200 ) {

            if( $('body').hasClass('un-head-brd') ) {

                fullH = fullH - 120;
            }

            else {

                if ( $('body').hasClass('un-head-bg-1') ) {

                    fullH = fullH - 154;

                }

            }

        }

        else {

            if( $('body').hasClass('un-head-brd') ) {

                fullH = fullH - 60;
            }

            else {

                if ( $('body').hasClass('un-head-bg-1') ) {

                    fullH = fullH - 94;

                }

            }

        }

        $('.un-full').css('height', fullH + 'px');

    });
	
		
	
	// ************ //
	// ONEPAGE NAVY //
	// ************ //
	
	$(window).ready(function(){		
		
		// Append Dots
		if($('.un-hr-nav').length > 0){
			
			var $opMenu = $('.un-hr-nav > ul.un-dot-nav');
			
			$opMenu.append('<li><span class="un-dot un-dot-a un-fa-icon-angle-up" data-scroll="body"></span></li>');
			
			$('.un-onepage').each(function() {
				
				var id = $(this).attr('id');
				var label = $(this).data('onepage-label'); 
				
				$opMenu.append('<li><span class="un-dot" data-scroll="#' + id + '" title="' + label + '">&bull;</span></li>');
				 
			});
			
			$opMenu.append('<li><span class="un-dot un-dot-a un-fa-icon-angle-down" data-scroll=".un-foot"></span></li>');
						
		}
		
		
		// Scroll To
		$('ul.un-dot-nav span.un-dot').on("click", function() {
            
			// Reset
			TweenMax.killTweensOf(window);
			$('ul.un-dot-nav span.un-dot').each(function() {
                $(this).removeClass('un-active');
            });
			
			var id = $(this).data('scroll');
			var topPos = $(id).offset();
			topPos = topPos.top - 120; 
			
			$(this).addClass('un-active');
			
			TweenMax.to(window, 2, {scrollTo:{y:topPos}, ease:Power2.easeOut});
			
        });
		
		
	});
	
	

});