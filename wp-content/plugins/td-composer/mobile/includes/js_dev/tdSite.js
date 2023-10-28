/*
    tagDiv - 2014
    Our portfolio:  http://themeforest.net/user/tagDiv/portfolio
    Thanks for using our theme! :)
*/


/* global jQuery:{} */
/* global tdUtil:{} */
/* global tdDetect:{} */
/* global tdEvents:{} */
/* global tdModalImageLastEl:{} */

var tdSite = {},
    tdScrollToTopIsVisible = false,
    tdResizeVideoTimer;

// @todo This will be moved to a central jquery ready location
/*  ----------------------------------------------------------------------------
    On load
 */
jQuery(window).ready(function() {

    'use strict';

    jQuery( '.td-scroll-up' ).click(function(){

        //hide the button
        tdScrollToTopIsVisible = false;
        jQuery( this ).removeClass('td-scroll-up-visible');

        //scroll to top
        window.scrollTo(0, 0);

        return false;
    });


    tdSite.setMenuMinHeight();

    //retina images
    tdSite.retina();

    // the mobile pull left menu (off canvas)
    // handles the toogle efect on mobile menu
    tdSite.mobileMenu();

    //handles the toogle efect on search box
    tdSite.openCloseSearchBox();

    //resize all the videos if we have them
    tdSite.resizeVideos();

    // prevents comments form submission without filing the required form fields
    tdSite.validateCommentsForm();

    // @todo do we really need it?
    //fake placeholder for ie
    jQuery( 'input, textarea' ).placeholder();

}); //end on load



(function() {

    'use strict';

    tdSite = {

        /*  ----------------------------------------------------------------------------
         Set the mobile menu min-height property

         This is usually used to force vertical scroll bar appearance from the beginning.
         Without it, on some mobile devices (ex Android), at scroll bar appearance there are some
         visual issues.

         */
        setMenuMinHeight: function() {
            var tdMobileMenu = jQuery( '#td-mobile-nav' );

            if ( tdMobileMenu.length ) {
                tdMobileMenu.css( 'min-height' , (tdEvents.window_innerHeight+1) + 'px' );
            }
        },


        /*  ----------------------------------------------------------------------------
         Toggle visibility of the scroll to top element
         */
        tdEventsScrollToTop: function( scrollTop ) {
            if ( scrollTop > 400 ) {
                if ( false === tdScrollToTopIsVisible ) { //only add class if needed
                    tdScrollToTopIsVisible = true;
                    jQuery( '.td-scroll-up' ).addClass( 'td-scroll-up-visible' );
                }
            } else {
                if ( true === tdScrollToTopIsVisible ) { //only add class if needed
                    tdScrollToTopIsVisible = false;
                    jQuery( '.td-scroll-up' ).removeClass( 'td-scroll-up-visible' );
                }
            }
        },

        /*  ----------------------------------------------------------------------------
         Resize the videos
         */
        resizeVideos: function() {

            //youtube in content
            jQuery( document ).find( 'iframe[src*="youtube.com"]' ).each(function() {
                if ( ! jQuery( this ).parent().hasClass( 'td_wrapper_playlist_player_youtube' ) ) {
                    var tdVideo = jQuery( this );
                    tdVideo.attr( 'width', '100%' );

                    var tdVideoWidth = tdVideo.width();
                    tdVideo.css( 'height', tdVideoWidth * 0.5625, 'important' );
                }
            });


            //vimeo in content
            jQuery( document ).find( 'iframe[src*="vimeo.com"]' ).each(function() {
                if ( ! jQuery(this).parent().hasClass( 'td_wrapper_playlist_player_vimeo' ) ) {
                    var tdVideo = jQuery( this );
                    tdVideo.attr( 'width', '100%' );

                    var tdVideoWidth = tdVideo.width();
                    tdVideo.css( 'height', tdVideoWidth * 0.5625, 'important' );
                }
            });


            //daily motion in content
            jQuery( document ).find( 'iframe[src*="dailymotion.com"]' ).each(function() {
                var tdVideo = jQuery( this );
                tdVideo.css( 'width', '100%' );

                var tdVideoWidth = tdVideo.width();
                tdVideo.css( 'height', tdVideoWidth * 0.6, 'important' );
            });

            //facebook in content
            jQuery(document).find('iframe[src*="facebook.com/plugins/video.php"]').each(function() {
                var td_video = jQuery(this);
                    td_video.attr('width', '100%');
                    var td_video_width = td_video.width();
                    td_video.css('height', td_video_width * 0.5625, 'important');
            });

            //wordpress embedded
            //jQuery( document ).find( '.wp-video-shortcode' ).each(function() {
            //    var tdVideo = jQuery(this),
            //        tdVideoWidth = tdVideo.width() + 3;
            //    jQuery(this).parent().css('height', tdVideoWidth * 0.56, 'important');
            //    //td_video.css('height', td_video_width * 0.6, 'important')
            //    tdVideo.css({
            //        'width': '100% !important',
            //        'height': '100% !important'
            //    });
            //});
        },


        /*  ----------------------------------------------------------------------------
         Add retina support
         */
        retina: function() {

            if ( window.devicePixelRatio > 1 ) {
                jQuery( '.td-retina' ).each(function(i) {
                    var lowres = jQuery(this).attr( 'src'),
                        highres = lowres.replace( '.png', '@2x.png' );

                    highres = highres.replace('.jpg', '@2x.jpg' );
                    jQuery( this ).attr( 'src', highres );

                });

                //custom logo support
                jQuery( '.td-retina-data' ).each(function( i ) {
                    jQuery( this ).attr( 'src', jQuery( this ).data( 'retina' ) );
                    //fix logo aligment on retina devices
                    jQuery( this ).addClass( 'td-retina-version' );
                });
            }
        },


        /*  ----------------------------------------------------------------------------
         Handles mobile menu
         */
        mobileMenu: function() {

            jQuery( '#td-top-mobile-toggle a, .td-mobile-close a' ).click(function(){
                if ( jQuery( 'body' ).hasClass( 'td-menu-mob-open-menu' ) ) {
                    jQuery( 'body' ).removeClass( 'td-menu-mob-open-menu' );
                } else {
                    jQuery( 'body' ).addClass( 'td-menu-mob-open-menu' );
                }
            });


            //handles open/close mobile menu

            //move thru all the menu and find the item with sub-menues to atach a custom class to them
            jQuery( document ).find( '#td-mobile-nav .menu-item-has-children' ).each(function( i ) {

                var class_name = 'td_mobile_elem_with_submenu_' + i;
                jQuery(this).addClass( class_name );

                //click on link elements with #
                jQuery(this).children('a').addClass( 'td-link-element-after' );

                jQuery(this).click(function( event ) {

                    /**
                     * currentTarget - the li element
                     * target - the element clicked inside of the currentTarget
                     */

                    var jQueryTarget = jQuery( event.target );

                    // html i element
                    if ( jQueryTarget.length &&
                        ( ( jQueryTarget.hasClass( 'td-element-after') || jQueryTarget.hasClass( 'td-link-element-after') ) &&
                            ( '#' === jQueryTarget.attr( 'href' ) || undefined === jQueryTarget.attr( 'href' ) ) ) ) {

                        event.preventDefault();
                        event.stopPropagation();

                        jQuery( this ).toggleClass( 'td-sub-menu-open' );
                    }
                });
            });
        },


        /*  ----------------------------------------------------------------------------
         Handles the toogle efect on search box
         */
        openCloseSearchBox: function() {

            // open the menu
            jQuery( '#td-header-search-button' ).click(function(){
                jQuery( 'body' ).addClass( 'td-search-opened' );
                window.scrollTo(0,0); // search to top when you are at the bottom of the page

                var search_input = jQuery('#td-header-search');

                /**
                 * Note: the autofocus does not work for iOS and windows phone devices as it's considered bad user experience
                 */
                    //autofocus
                setTimeout(function(){
                    search_input.focus();
                }, 1300);

            });

            //close the menu
            jQuery( '.td-search-close a' ).click(function(){
                jQuery( 'body' ).removeClass( 'td-search-opened' );
            });
        },

        /*  ----------------------------------------------------------------------------
         Add comments form support to prevent comments form submission without filing the required fields
         */
        validateCommentsForm: function() {

            //on form submit
            jQuery('.comment-form').submit( function(event) {

                jQuery('form#commentform :input').each( function() {

                    var current_input_field = jQuery(this);
                    var form = jQuery(this).parent().parent();

                    if (current_input_field.attr('aria-required')){
                        if (current_input_field.val() == '') {
                            event.preventDefault();
                            form.addClass('td-comment-form-warnings');

                            if (current_input_field.attr('id') == 'comment') {
                                form.find('.td-warning-comment').show(200);
                                current_input_field.css('border', '1px solid #ff7a7a');
                            } else if (current_input_field.attr('id') == 'author') {
                                form.find('.td-warning-author').show(200);
                                current_input_field.css('border', '1px solid #ff7a7a');
                            } else if (current_input_field.attr('id') == 'email') {
                                form.find('.td-warning-email').show(200);
                                current_input_field.css('border', '1px solid #ff7a7a');
                            }
                        } else if ( current_input_field.attr('id') == 'email' && tdUtil.isEmail( current_input_field.val() ) === false ) {
                            event.preventDefault();
                            form.addClass('td-comment-form-warnings');
                            form.find('.td-warning-email-error').show(200);
                        }
                    }

                });

            });

            //on form input fields focus
            jQuery('form#commentform :input').each( function() {

                var form = jQuery(this).parent().parent();
                var current_input_field = jQuery(this);

                current_input_field.focus( function(){

                    if (current_input_field.attr('id') == 'comment') {
                        form.find('.td-warning-comment').hide(200);
                        current_input_field.css('border', '1px solid #e1e1e1');

                    } else if (current_input_field.attr('id') == 'author') {
                        form.find('.td-warning-author').hide(200);
                        current_input_field.css('border', '1px solid #e1e1e1');


                    } else if (current_input_field.attr('id') == 'email') {
                        form.find('.td-warning-email').hide(200);
                        form.find('.td-warning-email-error').hide(200);
                        current_input_field.css('border', '1px solid #e1e1e1');
                    }
                });
            })
        }
    };

})();
