;'use strict';

/* ----------------------------------------------------------------------------
 tdPostImages.js
 --------------------------------------------------------------------------- */

/* global jQuery:{} */
/* global tdUtil:{} */
/* global tdAffix:{} */
/* global tdIsScrollingAnimation:boolean */

/*  ----------------------------------------------------------------------------
 On load
 */
jQuery().ready(function() {

    // handles modal images for: Featured images, inline image, inline image with caption, galleries
    tdModalImage();
});



// handles modal images for: Featured images, inline image, inline image with caption, galleries
function tdModalImage() {

    //fix wordpress figure + figcaption (we move the figcaption in the data-caption attribute of the link)
    jQuery( 'figure.wp-caption' ).each(function() {
        var caption_text = jQuery( this ).children( 'figcaption' ).html();
        jQuery( this ).children( 'a' ).data( 'caption', caption_text );
    });

    //move td-modal-image class to the parent a from the image. We can only add this class to the image via word press media editor
    jQuery( '.td-modal-image' ).each(function() {
        var $this = jQuery( this ),
            $parent = $this.parent();

        $parent.addClass( 'td-modal-image' );
        $this.removeClass( 'td-modal-image' );
    });



    //popup on modal images in articles
    jQuery( 'article' ).magnificPopup({
        type: 'image',
        delegate: ".td-modal-image",
        gallery: {
            enabled: true,
            tPrev: tdUtil.getBackendVar( 'td_magnific_popup_translation_tPrev' ), // Alt text on left arrow
            tNext: tdUtil.getBackendVar( 'td_magnific_popup_translation_tNext' ), // Alt text on right arrow
            tCounter: tdUtil.getBackendVar( 'td_magnific_popup_translation_tCounter' ) // Markup for "1 of 7" counter
        },
        ajax: {
            tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_ajax_tError' )
        },
        image: {
            tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_image_tError' ),
            titleSrc: function( item ) {//console.log(item.el);
                //alert(jQuery(item.el).data("caption"));
                var td_current_caption = jQuery( item.el ).data( 'caption' );
                if ( 'undefined' !== typeof td_current_caption ) {
                    return td_current_caption;
                } else {
                    return '';
                }
            }
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function( element ) {
                return element.find( 'img' );
            }
        },
        callbacks: {
            change: function( item ) {
                window.tdModalImageLastEl = item.el;
                //setTimeout(function(){
                tdUtil.scrollIntoView( item.el );
                //}, 100);
            },
            beforeClose: function() {
                tdAffix.allow_scroll = false;

                tdUtil.scrollIntoView( window.tdModalImageLastEl );

                var interval_td_affix_scroll = setInterval(function() {

                    if ( ! tdIsScrollingAnimation ) {
                        clearInterval( interval_td_affix_scroll );
                        setTimeout(function() {
                            tdAffix.allow_scroll = true;
                            //tdAffix.td_events_scroll(td_events.scroll_window_scrollTop);
                        }, 100 );
                    }
                }, 100 );
            }
        }
    });

    //popup on modal images in .td-main-content-wrap
    jQuery( '.td-main-content-wrap' ).magnificPopup({
        type: 'image',
        delegate: ".td-modal-image",
        gallery: {
            enabled: true,
            tPrev: tdUtil.getBackendVar( 'td_magnific_popup_translation_tPrev' ), // Alt text on left arrow
            tNext: tdUtil.getBackendVar( 'td_magnific_popup_translation_tNext' ), // Alt text on right arrow
            tCounter: tdUtil.getBackendVar( 'td_magnific_popup_translation_tCounter' ) // Markup for "1 of 7" counter
        },
        ajax: {
            tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_ajax_tError' )
        },
        image: {
            tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_image_tError' ),
            titleSrc: function( item ) {//console.log(item.el);
                //alert(jQuery(item.el).data("caption"));
                var td_current_caption = jQuery( item.el ).data( 'caption' );
                if ( 'undefined' !== typeof td_current_caption ) {
                    return td_current_caption;
                } else {
                    return '';
                }
            }
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function( element ) {
                return element.find( 'img' );
            }
        },
        callbacks: {
            change: function( item ) {
                window.tdModalImageLastEl = item.el;
                //setTimeout(function(){
                tdUtil.scrollIntoView( item.el );
                //}, 100);
            },
            beforeClose: function() {
                tdAffix.allow_scroll = false;

                tdUtil.scrollIntoView( window.tdModalImageLastEl );

                var interval_td_affix_scroll = setInterval(function() {

                    if ( ! tdIsScrollingAnimation ) {
                        clearInterval( interval_td_affix_scroll );
                        setTimeout(function() {
                            tdAffix.allow_scroll = true;
                            //tdAffix.td_events_scroll(td_events.scroll_window_scrollTop);
                        }, 100 );
                    }
                }, 100 );
            }
        }
    });





    //gallery popup
    //detect jetpack carousel and disable the theme popup
    if ( 'undefined' === typeof jetpackCarouselStrings ) {

        // copy gallery caption from figcaption to data-caption attribute of the link to the full image, in this way the modal can read the caption
        jQuery( 'figure.gallery-item' ).each(function() {
            var caption_text = jQuery( this ).children( 'figcaption' ).html();
            jQuery( this ).find( 'a' ).data( 'caption', caption_text );
        });


        //jquery tiled gallery
        jQuery( '.tiled-gallery' ).magnificPopup({
            type: 'image',
            delegate: "a",
            gallery: {
                enabled: true,
                tPrev: tdUtil.getBackendVar( 'td_magnific_popup_translation_tPrev' ), // Alt text on left arrow
                tNext: tdUtil.getBackendVar( 'td_magnific_popup_translation_tNext' ), // Alt text on right arrow
                tCounter: tdUtil.getBackendVar( 'td_magnific_popup_translation_tCounter' ) // Markup for "1 of 7" counter
            },
            ajax: {
                tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_ajax_tError' )
            },
            image: {
                tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_image_tError' ),
                titleSrc: function( item ) {//console.log(item.el);
                    var td_current_caption = jQuery( item.el ).parent().find( '.tiled-gallery-caption' ).text();
                    if ( 'undefined' !== typeof td_current_caption ) {
                        return td_current_caption;
                    } else {
                        return '';
                    }
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function( element ) {
                    return element.find( 'img' );
                }
            },
            callbacks: {
                change: function( item ) {
                    window.tdModalImageLastEl = item.el;
                    tdUtil.scrollIntoView( item.el );
                },
                beforeClose: function() {
                    tdUtil.scrollIntoView( window.tdModalImageLastEl );
                }
            }
        });



        jQuery( '.gallery' ).magnificPopup({
            type: 'image',
            delegate: '.gallery-icon > a',
            gallery: {
                enabled: true,
                tPrev: tdUtil.getBackendVar( 'td_magnific_popup_translation_tPrev' ), // Alt text on left arrow
                tNext: tdUtil.getBackendVar( 'td_magnific_popup_translation_tNext' ), // Alt text on right arrow
                tCounter: tdUtil.getBackendVar( 'td_magnific_popup_translation_tCounter' ) // Markup for "1 of 7" counter
            },
            ajax: {
                tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_ajax_tError' )
            },
            image: {
                tError: tdUtil.getBackendVar( 'td_magnific_popup_translation_image_tError' ),
                titleSrc: function( item ) {//console.log(item.el);
                    var td_current_caption = jQuery( item.el ).data( 'caption' );
                    if ( 'undefined' !== typeof td_current_caption ) {
                        return td_current_caption;
                    } else {
                        return '';
                    }
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function( element ) {
                    return element.find( 'img' );
                }
            },
            callbacks: {
                change: function( item ) {
                    window.tdModalImageLastEl = item.el;
                    tdUtil.scrollIntoView( item.el );
                },
                beforeClose: function() {
                    tdUtil.scrollIntoView( window.tdModalImageLastEl );
                }
            }
        });
    }
} //end modal