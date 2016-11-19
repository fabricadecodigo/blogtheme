
jQuery(document).ready(function() {
    "use strict";

    /* =========================================================
     1. Main Menu
     ============================================================ */
    Modernizr.load([
        {
            load: kopa_variable.url.template_directory_uri + 'js/superfish.js',
            complete: function() {
                //Main menu
                jQuery('.main-menu').superfish({
                    cssArrows: true
                });
            }
        }
    ]);
    Modernizr.load([
        {
            load: kopa_variable.url.template_directory_uri + 'js/superfish.js',
            complete: function() {
                //Main menu
                jQuery('.secondary-menu').superfish({
                    cssArrows: false
                });
            }
        }
    ]);
    /* ============================================
     2. Mobile-menu
     =============================================== */
    Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/jquery.navgoco.js'],
            complete: function() {                
                
                jQuery(".main-menu-mobile").navgoco({
                    accordion: true
                });

                jQuery(".main-nav-mobile > .pull").click(function() {
                    jQuery(".main-menu-mobile").slideToggle("slow");
                });

                jQuery(".caret").removeClass("caret");
                
            }
        }]);
    /* =========================================================
     3. Video wrapper
     ============================================================ */
    if (jQuery(".video-wrapper").length > 0) {
        Modernizr.load([{
                load: kopa_variable.url.template_directory_uri + '/js/fitvids.js',
                complete: function() {
                    jQuery(".video-wrapper").fitVids();
                }
            }]);
    }
    /* =========================================================
     5. Owl Carousel
     ============================================================ */
    Modernizr.load([{
            load: [kopa_variable.url.template_directory_uri + 'js/owl.carousel.js'],
            complete: function() {
                jQuery('.kopa-testimonial-carousel').owlCarousel({
                    items: 1,
                    itemsDesktop: [1120, 1],
                    itemsDesktopSmall: [979, 1],
                    itemsTablet: [799, 1],
                    lazyLoad: true,
                    navigation: true,
                    pagination: false,
                    navigationText: false,
                    autoPlay: true
                });
                var owl1 = jQuery(".owl-carousel-1");
                owl1.owlCarousel({
                    singleItem: true,
                    pagination: false,
                    slideSpeed: 600,
                    transitionStyle: "fade",
                    navigationText: false,
                    navigation: true
                });
                var owl2 = jQuery(".owl-carousel-2");
                owl2.owlCarousel({
                    singleItem: true,
                    pagination: true,
                    autoPlay: 5000,
                    slideSpeed: 1000,
                    transitionStyle: "fade",
                    navigation: false
                });
                var owl3 = jQuery(".owl-carousel-3");
                owl3.owlCarousel({
                    singleItem: true,
                    pagination: true,
                    autoPlay: 5000,
                    slideSpeed: 1000,
                    transitionStyle: "fade",
                    navigation: false
                });
                var owl4 = jQuery(".owl-carousel-4");
                owl4.owlCarousel({
                    items: 4,
                    pagination: false,
                    slideSpeed: 600,
                    navigationText: false,
                    navigation: true
                });
                
                var owl5 = jQuery(".owl-carousel-5");
                owl5.owlCarousel({
                    singleItem: true,
                    pagination: true,
                    slideSpeed: 1000,
                    transitionStyle: "backSlide",
                    navigation: false
                });

                var owl6 = jQuery(".owl-carousel-6");
                owl6.owlCarousel({
                    singleItem: true,
                    pagination: false,
                    slideSpeed: 600,
                    navigationText: false,
                    navigation: true
                });
                var owl7 = jQuery(".owl-carousel-7");
                owl7.owlCarousel({
                    items: 4,
                    pagination: false,
                    slideSpeed: 600,
                    navigationText: false,
                    navigation: true
                });
                var owl8 = jQuery(".owl-carousel-8");
                owl8.owlCarousel({
                    items: 3,
                    itemsDesktop: [1024, 3],
                    pagination: false,
                    slideSpeed: 600,
                    navigationText: false,
                    navigation: true
                });


                var owl9 = jQuery(".owl-carousel-9");
                owl9.owlCarousel({
                    singleItem: true,
                    pagination: false,
                    slideSpeed: 600,
                    navigationText: false,
                    navigation: true
                });
                jQuery('.owl-prev').addClass('fa fa-angle-left');
                jQuery('.owl-next').addClass('fa fa-angle-right');
                jQuery('.owl-carousel-1 .owl-prev').removeClass('fa-angle-left').addClass('fa-caret-left');
                jQuery('.owl-carousel-1 .owl-next').removeClass('fa-angle-right').addClass('fa-caret-right');
            }
        }])
    /* =========================================================
     6. Light box
     ============================================================ */
    Modernizr.load([
        {
            load: kopa_variable.url.template_directory_uri + 'js/jquery.magnific-popup.js',
            complete: function() {               
                          
               jQuery('.portfolio-list').each(function() {
                    jQuery(this).magnificPopup({
                        delegate: 'a.group1, a.group2',
                        type: 'image',
                        gallery: {
                          enabled:true
                        }
                    });
                }); 

            }
        }
    ]);

    /* =========================================================
     7. Scroll to top
     ============================================================ */
    // hide #back-top first
    jQuery("#back-top").hide();
    // fade in #back-top
    jQuery(function() {
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 200) {
                jQuery('#back-top').fadeIn();
            } else {
                jQuery('#back-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        jQuery('#back-top a').click(function() {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    /* =========================================================
     8. BOOTSTRAP COLLAPSE
     ============================================================ */
    var panel_titles = jQuery('.panel-title a');
    panel_titles.addClass("collapsed");
    jQuery('.panel-heading.active').find(panel_titles).removeClass("collapsed");
    if (panel_titles.length > 0) {
        panel_titles.click(function() {
            parent = jQuery(this).attr('data-parent');
            //ACCORDION
            if (undefined !== parent) {
                var obj_actived = jQuery(parent).find('.panel-heading.active');
                obj_actived.removeClass('active');
                obj_actived.find('span.b-collapse').html('+');
                if (jQuery(this).hasClass('collapsed')) {
                    jQuery(this).parents('.panel-heading').addClass('active');
                    jQuery(this).find('span.b-collapse').html('-');
                } else {
                    jQuery(this).parents('.panel-heading').removeClass('active');
                    jQuery(this).find('span.b-collapse').html('+');
                }
            } else {
                //TOGGLE
                parent = jQuery(this).parents('.panel-heading');
                if (parent.hasClass('active')) {
                    parent.removeClass('active');
                    jQuery(this).find('span.b-collapse').html('+');
                } else {
                    parent.addClass('active');
                    jQuery(this).find('span.b-collapse').html('-');
                }
            }
        });
    }
    /* =========================================================
     Toggle
     ============================================================ */
    jQuery('#toggle .collapse').collapse({
        toggle: false
    });
    /* =========================================================
     10. masonry
    ============================================================ */
    
    /* ============================================
     14. Single-author-Filter
     =============================================== */
    jQuery('.social-filter > div span').click(function() {
        if (jQuery(".social-filter ul").is(":hidden")) {
            jQuery(".social-filter ul").slideDown("slow");
        } else {
            jQuery(".social-filter ul").slideUp();
        }
    });
    /* =========================================================
     16. Fix css ie8
     ============================================================ */
    jQuery(".e-heading p:last-child").css("margin-bottom", "0");
    jQuery(".kopa-area-1 .widget:last-child.parallax, .kopa-area-2 .widget:last-child.parallax, .kopa-area-2 .widget:last-child.kopa-portfolio-2-widget, .article-list-3 > ul > li:last-child").css("margin-bottom", "0 !important");
    jQuery(".kopa-parallax-2-widget .ms-item1:nth-child(2)").css("background", "url(images/background/6.png);");
    /* =========================================================
     17. Wow
     ============================================================ */
    function mobilecheck() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return false;
        }
        return true;
    }

    Modernizr.load([
        {
            load: kopa_variable.url.template_directory_uri + 'js/jquery.wow.js',
            complete: function() {
                if (mobilecheck()) {
                    new WOW().init();
                    jQuery("wow").addClass("animated");
                }
            }
        }
    ]); 


    if(1 === parseInt(kopa_variable.option.is_enable_sticky_menu) && jQuery('#main-nav').length > 0){
        
        Modernizr.load([
            {
                load: [kopa_variable.url.template_directory_uri + 'js/waypoints.js', kopa_variable.url.template_directory_uri + 'js/waypoints-sticky.js'],
                complete: function() {
                    jQuery('.kopa-header-bottom').waypoint('sticky',{
                        offset: -1 // how far from top
                    });        
                }
            }
        ]);    
    }
});