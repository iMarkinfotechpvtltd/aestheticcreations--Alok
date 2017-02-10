 jQuery(function (jQuery) {

     //Preloader
     var preloader = jQuery('.preloader');
     jQuery(window).load(function () {
         preloader.remove();
     });
 });

 jQuery('.carousel').carousel({
     pause: 'none'
 });



 // grab the initial top offset of the navigation 
 var stickyNavTop = jQuery('body').offset().top;
 // our function that decides weather the navigation bar should have "fixed" css position or not.
 var stickyNav = function () {
     var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top

     // if we've scrolled more than the navigation, change its position to fixed to stick to top,
     // otherwise change it back to relative
     if (scrollTop > 10) {
         jQuery('header').addClass('sticky') & jQuery('.responsive-menu-button').addClass('move_scroll');
     } else {
         jQuery('header').removeClass('sticky') & jQuery('.responsive-menu-button').removeClass('move_scroll');
     }

 };

 stickyNav();
 // and run it again every time you scroll
 jQuery(window).scroll(function () {
     stickyNav();
 });

 ///////////////////////////////////////////////
 jQuery("a.video").click(function () {
     jQuery.fancybox({
         'padding': 0,
         'autoScale': false,
         'transitionIn': 'none',
         'transitionOut': 'none',
         'title': this.title,
         'width': 680,
         'height': 495,
         'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
         'type': 'swf',
         'swf': {
             'wmode': 'transparent',
             'allowfullscreen': 'true'
         }
     });

     return false;
 });
 ///////////////////////////////////////////////
 jQuery(document).ready(function () {

     jQuery("#team").owlCarousel({

         autoPlay: 5000, //Set AutoPlay to 3 seconds
         navigation: false,
         items: 2,
         itemsDesktop: [1199, 2],
         itemsDesktopSmall: [979, 2],
         itemsTablet: [768, 2],
         itemsMobile: [479, 1]

     });

 });
 ///////////////////////////////////////////////
 jQuery(document).ready(function () {

     jQuery("#blogs").owlCarousel({

         autoPlay: 5000, //Set AutoPlay to 3 seconds
         navigation: true,
         items: 3,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3],
         itemsTablet: [768, 2],
         itemsMobile: [479, 1]

     });

 });
 jQuery(document).ready(function () {

     jQuery("#testimonial").owlCarousel({

         autoPlay: 5000, //Set AutoPlay to 3 seconds
         navigation: true,
         navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
         items: 1,
         itemsDesktop: [1199, 1],
         itemsDesktopSmall: [979, 1],
         itemsTablet: [768, 1],
         itemsMobile: [479, 1]

     });

 });

 ///////////////////////////////////////////////
 jQuery(document).ready(function () {

     jQuery("#pictures").owlCarousel({

         autoPlay: 5000, //Set AutoPlay to 3 seconds
         navigation: true,
         items: 5,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3],
         itemsTablet: [768, 3],
         itemsMobile: [479, 1]

     });

 });
 ///////////////////////////////////////////////


 jQuery(document).ready(function () {
     jQuery(".fancybox").fancybox({
         openEffect: 'none',
         scrolling: 'no',
         closeEffect: 'none'
     });
 });
 ////////////////////////////////////////////////////////
 jQuery(window).on(' load resize', function () {
     var common_height = jQuery(".one-fourth-section figure").height();
     jQuery(".gallery_view .display-table-cell").css('height', common_height);
 });
 //////////////////////////////////////////////////////////////


 jQuery('.cs-btn').append("<span class='lines top'></span><span class='lines right'></span><span class='lines bottom'></span><span class='lines left'></span>");
 jQuery('.cs-btn').attr('pk', '');


 //////////////////////////////////////////////////////////////////////////////////////////////

 jQuery(function () {
     jQuery('a.scroll-down').click(function () {
         if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
             var target = jQuery(this.hash);
             target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
             if (target.length) {
                 jQuery('html, body').animate({
                     scrollTop: target.offset().top
                 }, 1000);
                 return false;
             }
         }
     });
 });

 jQuery("a.scroll-down").hover(
     function () {
         jQuery(this).removeClass("animated");
     },
     function () {
         jQuery(this).addClass("animated");
     }
 );
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////


 jQuery(document).ready(function ($) {
     jQuery('header a[href*="#"]:not([href="#"])').click(function () {
         if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
             var target = jQuery(this.hash);
             target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
             if (target.length) {
                 jQuery(".custom_nav li a").removeClass("active");
                 jQuery(this).addClass('active');
                 jQuery('html, body').animate({
                     scrollTop: target.offset().top
                 }, 1000);
                 return false;
             }
         }
     });

 });

 jQuery(".search-btn").click(function () {
     jQuery(".search-btn").removeClass("active");
     jQuery(".search-field").addClass("active");
     jQuery(".search-close-btn").addClass("active");
 });
 jQuery(".search-close-btn").click(function () {
     jQuery(".search-btn").addClass("active");
     jQuery(".search-close-btn").removeClass("active");
     jQuery(".search-field").removeClass("active");
 });

 jQuery(document).ready(function () {
     jQuery(".menu-item-has-children").addClass("sb-menu");
     jQuery("#menu-item-193 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-190 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-191 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-189 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-195 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-192 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-196 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-194 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-3900 ul").removeClass("dropdown-menu1");
     jQuery("#menu-item-3903 ul").removeClass("dropdown-menu1");
 });

 jQuery(function () {
     jQuery("input[name='name']").keydown(function (e) {
         if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
             // let it happen, don't do anything
             return;
         }
         if (e.ctrlKey || e.altKey) {
             e.preventDefault();
         } else {
             var key = e.keyCode;
             if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                 e.preventDefault();
             }
         }
     });
 });

 //comment form validation
 jQuery(document).ready(function () {
     jQuery(".submit").click(function (e) {

         var name = jQuery("#author").val();
         var email = jQuery("#email").val();
         var comment = jQuery("#comment").val();
         if (name == "") {
             jQuery("#author").addClass("error");
             e.preventDefault();
         }
         if (email == "") {
             jQuery("#email").addClass("error");
             e.preventDefault();
         }
         if (comment == "") {
             jQuery("#comment").addClass("error");
             e.preventDefault();
         }
     });
 });
 jQuery(function () {
     jQuery("input[name='author']").keydown(function (e) {
         if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
             // let it happen, don't do anything
             return;
         }
         if (e.ctrlKey || e.altKey) {
             e.preventDefault();
         } else {
             var key = e.keyCode;
             if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                 e.preventDefault();
             }
         }
     });
 });
 //show hide content
 jQuery("#toggle").click(function () {
     var jQuerytarget = jQuery('.target'),
         jQuerytoggle = jQuery(this);

     jQuerytarget.slideToggle(500, function () {
         jQuerytoggle.text((jQuerytarget.is(':visible') ? 'Hide' : '') + ' IMPORTANT SAFETY INFORMATION');
     });
 });
 // remove clss contact userAgent
 jQuery(document).ready(function () {
     jQuery('#cntus').click(function () {
         jQuery(this).removeClass('active');

     });
 });