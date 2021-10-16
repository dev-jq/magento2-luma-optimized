define([
    'jquery',
    'domReady!'
], function ($) {
    'use strict';

    $.widget('jq.stickyHeader', {
        options: {
            enableOnMobile: true,
            stickyClass: 'sticky-header',
            wrapper: '.page-wrapper'
        },

        _create: function () {
            if (!this.options.disabled) {
                this._initializeSticky();
            }
        },

        _initializeSticky: function() {
            const self = this;
            const header = this.element;
            const initHeightElement = $(header[0].firstChild).height();
            const wrapper = $(this.options.wrapper);

            let stickyDummyHeight = header.height();
            let scrollPosition;

            if (window.innerWidth > (this.options.enableOnMobile ? 0 : 768)) {
                $(window).scroll(function () {
                    scrollPosition = $(window).scrollTop();

                    if (scrollPosition > initHeightElement) {
                        self._enableSticky(wrapper, stickyDummyHeight - initHeightElement + 25); // 25px = margin bottom ot header
                    } else {
                        self._disableSticky(wrapper);
                    }
                });
            }
        },

        _enableSticky: function(el, height) {
            if (!el.hasClass(this.options.stickyClass)) {
                el.addClass(this.options.stickyClass);
                $('body').css({ "padding-top": height + 'px' });
            }
        },

        _disableSticky: function(el) {
            if (el.hasClass(this.options.stickyClass)) {
                el.removeClass(this.options.stickyClass);
                $('body').css({ "padding-top": "0" });
            }
        }
    });

    return $.jq.stickyHeader;
});
