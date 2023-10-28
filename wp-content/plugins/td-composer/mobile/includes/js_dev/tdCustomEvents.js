/* td_custom_events.js - handles the booster td_events that require throttling
 * v 1.0 - wp_011
 */

/* global tdSite:{} */
/* global tdAffix:{} */
/* global tdResizeVideoTimer:int */

/* jshint -W020*/

var tdCustomEvents = {};

(function(){

    'use strict';

    tdCustomEvents = {


        /**
         * - callback real scroll called from td_events
         * @private
         */
        _callback_scroll: function() {

        },


        /**
         * - callback real resize called from td_events
         * @private
         */
        _callback_resize: function() {

        },


        /**
         * - callback lazy scroll called from td_events at 100ms
         * @private
         */
        _lazy_callback_scroll_100: function() {

        },


        /**
         * - callback lazy scroll called from td_events at 500ms
         * @private
         */
        _lazy_callback_scroll_500: function() {

        },



        /**
         * - callback lazy resize called from td_events at 100ms
         * @private
         */
        _lazy_callback_resize_100: function() {
            tdAffix.setWPAdminBarPosition();
        },


        /**
         * - callback lazy resize called from td_events at 500ms
         * @private
         */
        _lazy_callback_resize_500: function() {
            tdSite.setMenuMinHeight();

            clearTimeout( tdResizeVideoTimer );
            tdResizeVideoTimer = setTimeout(function() {
                tdSite.resizeVideos();
            }, 200 );
        }
    };
})();


