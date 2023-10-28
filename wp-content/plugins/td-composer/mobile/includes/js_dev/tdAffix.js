/**
 * Created by tagdiv on 05.11.2015.
 */

/* global jQuery:{} */
/* global tdEvents:{} */

var tdAffix = {};

(function() {

    'use strict';

    tdAffix = {

        _menu: undefined,

        _menuHeight: undefined,

        _nextElement: undefined,

        _currentPosition: undefined, // 0 - top, 1 - affix hidden, 2 - transition, 3 - affix sticky

        _previousScrolledPosition: 0,

        _previousScrolledDistance: 0,

        _isUp: 0,

        _marginFakeWidth: 30,

        _marginFakeColor: undefined,

        _wpadminbar: undefined,

        _wpadminbarFirstPositionCheck: false,

        _wpadminbarHeight: 0,

        init: function( classSelector ) {

            //tdAffix.debugWindow = jQuery( '<div style="display: none; background-color: white; border: 1px solid red; width: 200px; height: 400px; position: fixed; bottom: 0"></div>' );
            //tdAffix.debugWindow = jQuery( '<div style="background-color: white; border: 1px solid red; width: 200px; height: 300px; position: fixed; bottom: 0; z-index: 999999"></div>' );
            //jQuery( document.body ).append( tdAffix.debugWindow );

            var menu = jQuery( '.' + classSelector );
            if ( menu.length ) {
                tdAffix._menu = menu;
                tdAffix._menuHeight = menu.outerHeight( true );
                tdAffix._nextElement = menu.next();

                tdAffix._previousScrolledPosition = tdEvents.window_pageYOffset;

                // The menu is initialized
                if ( tdAffix._previousScrolledPosition > tdAffix._menuHeight ) {
                    // _isAffixed is initialized
                    tdAffix._currentPosition = 1;
                    tdAffix._menu.css( 'position', 'fixed' );
                    tdAffix._menu.css( 'top', -tdAffix._menuHeight);
                    tdAffix._nextElement.css( 'padding-top', tdAffix._menuHeight);

                } else {
                    // _isAffixed is initialized
                    tdAffix._currentPosition = 0;
                }

                //tdAffix._addGPUSupport();

                tdAffix._marginFakeColor = tdAffix._menu.css( 'background-color' );

                if ( jQuery( document.body).hasClass( 'admin-bar' ) ) {
                    var positionChecker = jQuery( '<div></div>' );
                    jQuery( document.body).prepend( positionChecker );
                    tdAffix._wpadminbarHeight = positionChecker.offset().top;
                    positionChecker.remove();
                }

                tdAffix.setWPAdminBarPosition();
            }

            tdAffix.log( tdAffix._currentPosition + ' : ' + tdAffix._menuHeight );
        },


        //_addGPUSupport: function() {
        //    if ( undefined === tdAffix._menu ) {
        //        return;
        //    }
        //    tdAffix._menu.css( '-webkit-transform', 'translateZ(0)' );
        //    tdAffix._menu.css( '-moz-transform', 'translateZ(0)' );
        //    tdAffix._menu.css( '-ms-transform', 'translateZ(0)' );
        //    tdAffix._menu.css( '-o-transform', 'translateZ(0)' );
        //    tdAffix._menu.css( 'transform', 'translateZ(0)' );
        //},


        //_removeGPUSupport: function() {
        //    if ( undefined === tdAffix._menu ) {
        //        return;
        //    }
        //    tdAffix._menu.css( '-webkit-transform', '' );
        //    tdAffix._menu.css( '-moz-transform', '' );
        //    tdAffix._menu.css( '-ms-transform', '' );
        //    tdAffix._menu.css( '-o-transform', '' );
        //    tdAffix._menu.css( 'transform', '' );
        //},


        _addMarginFake: function() {
            if ( undefined === tdAffix._menu ) {
                return;
            }
            tdAffix._menu.css( 'border-top-width', tdAffix._marginFakeWidth );
            tdAffix._menu.css( 'border-top-style', 'solid' );
            tdAffix._menu.css( 'border-top-color', tdAffix._marginFakeColor );
            tdAffix._menu.css( 'height', tdAffix._menuHeight + tdAffix._marginFakeWidth );
        },


        _removeMarginFake: function() {
            if ( undefined === tdAffix._menu ) {
                return;
            }
            tdAffix._menu.css( 'border-top-width', '' );
            tdAffix._menu.css( 'border-top-style', '' );
            tdAffix._menu.css( 'border-top-color', '' );
            tdAffix._menu.css( 'height', '' );
        },


        _setMenuToOriginalState: function() {
            if ( undefined === tdAffix._menu ) {
                return;
            }
            tdAffix._currentPosition = 0;
            tdAffix._menu.css( 'position', '' );
            tdAffix._menu.css( 'top', '' );
            tdAffix._nextElement.css( 'padding-top', '' );
            tdAffix._previousScrolledPosition = tdEvents.scroll_window_scrollTop;
            tdAffix._removeMarginFake();
            tdAffix._menu.hide().show(0);
        },


        scroll: function() {
            if ( undefined === tdAffix._menu ) {
                return;
            }

            // start - special case (at spooky scrolling) to set menu in its genuine top position
            if ( 0 !== tdAffix._currentPosition && tdEvents.scroll_window_scrollTop <= 0 ) {
                tdAffix.log( 'special case' );
                tdAffix._setMenuToOriginalState();
                return;
            }
            // end - special case

            var topPosition;

            //tdAffix.debugWindow.html( tdAffix._menuHeight + ' >> ' + tdEvents.scroll_window_scrollTop + ' : ' + tdAffix._previousScrolledPosition + ' : ' + (tdEvents.scroll_window_scrollTop - tdAffix._previousScrolledPosition)  + ' : ' + tdAffix._currentPosition );

            tdAffix.log(tdEvents.scroll_window_scrollTop + ' : ' + tdAffix._previousScrolledPosition);

            tdAffix._checkWPAdminBarPosition();


            // By default, we make the wpadminbar to be on 'absolute' position
            if (tdEvents.scroll_window_scrollTop > tdAffix._previousScrolledPosition) {

                // down

                switch (tdAffix._currentPosition) {
                    case 0 :
                        tdAffix.log('down 0');
                        if (tdEvents.scroll_window_scrollTop > tdAffix._menuHeight + tdAffix._wpadminbarHeight) {
                            tdAffix._currentPosition = 1;
                            tdAffix._menu.css('position', 'fixed');
                            tdAffix._menu.css('top', -tdAffix._menuHeight);
                            tdAffix._nextElement.css('padding-top', tdAffix._menuHeight);
                        }
                        break;

                    case 1 :
                        tdAffix.log('down 1');
                        // do nothing
                        break;

                    case 2 :
                        tdAffix.log('down 2');

                        topPosition = parseInt(tdAffix._menu.css('top').replace('px', ''));
                        if (tdEvents.scroll_window_scrollTop > topPosition + tdAffix._menuHeight + tdAffix._marginFakeWidth) {
                            tdAffix._fastUp = true;
                            tdAffix._currentPosition = 1;
                            tdAffix._menu.css('position', 'fixed');
                            tdAffix._menu.css('top', -tdAffix._menuHeight);

                            tdAffix._removeMarginFake();
                        }
                        break;

                    case 3 :

                        // If the previous move was 'up', this 'down' movement could be of the visibility of the mobile browser search line, so we step over this case.
                        // If we get a new down movement, it means that the direction was changed, and we consider it and all movements after it.
                        if (true === tdDetect.isIos && tdAffix._isUp > 0) {
                            //if ( tdAffix._isUp > 0 ) {
                            tdAffix._isUp = 0;
                            tdAffix.log('skip down');
                            break;
                        }

                        tdAffix.log('down 3');
                        tdAffix._currentPosition = 2;
                        tdAffix._menu.css('position', 'absolute');
                        tdAffix._menu.css('top', tdAffix._previousScrolledPosition - tdAffix._marginFakeWidth + 1);

                        tdAffix._addMarginFake();
                        break;
                }

            } else if (tdEvents.scroll_window_scrollTop < tdAffix._previousScrolledPosition) {

                // up

                // It registers that at least an up operation is done
                if (tdAffix._isUp <= 0) {
                    tdAffix._isUp++;
                }

                switch (tdAffix._currentPosition) {
                    case 0 :
                        tdAffix.log('up 0');
                        // do nothing
                        break;

                    case 1 :
                        tdAffix.log('up 1');

                        // Usually the next case would be 2, but if the gap between the previous and the current scrolled position is larger than menu height,
                        // the menu is affixed (case 3)
                        if (tdAffix._previousScrolledPosition - tdEvents.scroll_window_scrollTop >= tdAffix._menuHeight) {
                            tdAffix._currentPosition = 3;
                            tdAffix._menu.css('position', 'fixed');
                            tdAffix._menu.css('top', 0);

                            tdAffix._removeMarginFake();
                        } else {
                            tdAffix._currentPosition = 2;
                            tdAffix._menu.css('position', 'absolute');
                            tdAffix._menu.css('top', tdEvents.scroll_window_scrollTop - tdAffix._menuHeight - tdAffix._marginFakeWidth);

                            tdAffix._addMarginFake();
                        }
                        break;

                    case 2 :
                        tdAffix.log('up 2');

                        topPosition = parseInt(tdAffix._menu.css('top').replace('px', ''));
                        //if ( topPosition >= tdEvents.scroll_window_scrollTop - tdAffix._marginFakeWidth ) {
                        if (topPosition >= tdEvents.scroll_window_scrollTop + tdAffix._previousScrolledDistance - tdAffix._marginFakeWidth) {
                            tdAffix._currentPosition = 3;
                            tdAffix._menu.css('position', 'fixed');
                            tdAffix._menu.css('top', 0);

                            tdAffix._removeMarginFake();
                        }
                        break;

                    case 3 :
                        tdAffix.log('up 3');
                        // do nothing

                        if (tdEvents.scroll_window_scrollTop <= tdAffix._wpadminbarHeight) {
                            tdAffix._currentPosition = 0;
                            tdAffix._setMenuToOriginalState();
                        }

                        break;
                }
            }

            //tdAffix._previousScrolledDistance = tdEvents.scroll_window_scrollTop - tdAffix._previousScrolledPosition;

            tdAffix._previousScrolledPosition = tdEvents.scroll_window_scrollTop;
        },


        /**
         * This check should be done only once, when we are sure that wpadminbar was added in DOM.
         * We'll do it at the first scroll.
         * @private
         */
        _checkWPAdminBarPosition: function() {
            if ( false === tdAffix._wpadminbarFirstPositionCheck ) {
                tdAffix.setWPAdminBarPosition();
                tdAffix._wpadminbarFirstPositionCheck = true;
            }
        },


        /**
         * It should be called usually at viewport changing (on resize).
         * On landscape viewport the wpadminbar is fixed, and we'll position it absolute, like on portrait viewport.
         * The height of the wpadminbar also changes on different viewports (landscape or portrait).
         */
        setWPAdminBarPosition: function() {

            // Try to get the wpadminbar element (it's dynamically inserted by wp)
            if ( undefined === tdAffix._wpadminbar ) {
                var wpadminbar = jQuery( '#wpadminbar' );
                if ( wpadminbar.length ) {
                    tdAffix._wpadminbar = wpadminbar;
                }
            }

            if ( undefined !== tdAffix._wpadminbar ) {
                tdAffix._wpadminbar.css( 'position', 'absolute' );
                tdAffix._wpadminbar.css( 'top', 0 );
                tdAffix._wpadminbarHeight = tdAffix._wpadminbar.outerHeight();
            }
        },

        log: function( msg ) {
            //console.log( msg );
        }
    };

    tdAffix.init( 'td-header-wrap' );

})();