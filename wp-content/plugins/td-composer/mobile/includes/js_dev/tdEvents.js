/* tdEvents.js - handles the events that require throttling
 * v 2.0 - wp_010
 *
 * moved in theme from wp_booster
 */

/* global jQuery:{} */
/* global tdCustomEvents:{} */
/* global tdSite:{} */
/* global tdAffix:{} */

// This should be moved to the booster mobile

var tdEvents = {};

(function(){
    'use strict';

    tdEvents = {

        //the events - we have timers that look at the variables and fire the event if the flag is true
        scroll_event_slow_run: false,
        scroll_event_medium_run: false,

        resize_event_slow_run: false, //when true, fire up the resize event
        resize_event_medium_run: false,


        scroll_window_scrollTop: 0, //used to store the scrollTop

        window_pageYOffset: window.pageYOffset, // @todo see if it can replace scroll_window_scrollTop [used by others]
        window_innerHeight: window.innerHeight, // used to store the window height
        window_innerWidth: window.innerWidth, // used to store the window width

        init: function() {

            tdSite.setMenuMinHeight();

            jQuery( window ).scroll(function() {
                tdEvents.scroll_event_slow_run = true;
                tdEvents.scroll_event_medium_run = true;

                //read the scroll top
                tdEvents.scroll_window_scrollTop = jQuery( window ).scrollTop();
                tdEvents.window_pageYOffset = window.pageYOffset;

                tdAffix.scroll();

                // call real tdCustomEvents scroll
                tdCustomEvents._callback_scroll();
            });


            jQuery( window ).resize(function() {
                tdEvents.resize_event_slow_run = true;
                tdEvents.resize_event_medium_run = true;

                tdEvents.window_innerHeight = window.innerHeight;
                tdEvents.window_innerWidth = window.innerWidth;

                // call real tdCustomEvents resize
                tdCustomEvents._callback_resize();
            });



            //medium resolution timer for rest?
            setInterval(function() {

                //scroll event
                if ( tdEvents.scroll_event_medium_run ) {
                    tdEvents.scroll_event_medium_run = false;

                    // call lazy tdCustomEvents scroll
                    tdCustomEvents._lazy_callback_scroll_100();
                }

                if ( tdEvents.resize_event_medium_run ) {
                    tdEvents.resize_event_medium_run = false;

                    // call lazy tdCustomEvents resize
                    tdCustomEvents._lazy_callback_resize_100();
                }
            }, 100);



            //low resolution timer for rest?
            setInterval(function() {
                //scroll event
                if ( tdEvents.scroll_event_slow_run ) {
                    tdEvents.scroll_event_slow_run = false;

                    //back to top
                    tdSite.tdEventsScrollToTop( tdEvents.scroll_window_scrollTop );

                    // call lazy tdCustomEvents scroll
                    tdCustomEvents._lazy_callback_scroll_500();
                }

                //resize event
                if ( tdEvents.resize_event_slow_run ) {
                    tdEvents.resize_event_slow_run = false;

                    // call lazy tdCustomEvents resize
                    tdCustomEvents._lazy_callback_resize_500();
                }

            }, 500);
        }
    };

    tdEvents.init();
})();
