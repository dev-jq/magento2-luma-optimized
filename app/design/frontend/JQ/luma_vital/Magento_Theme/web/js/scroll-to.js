define([
    'jquery',
    'domReady!'
], function ($) {
    'use strict';

    $.widget('jq.scrollTo', {
        options: {
            enabled: true,
            attr: 'data-target', // href || data-target
            offset: 20,
            showClass: 'show'
        },

        _create: function() {
            this._bind();
        },

        _bind: function() {
            if (this.options.enabled) {
                const btn = this.element;

                this._onScroll(btn);
                this._onButtonClick(btn);
            }
        },

        _onScroll: function(el) {
            const showClass = this.options.showClass;
            let windowScroll_t;

            $(window).scroll(function () {
                clearTimeout(windowScroll_t);
                windowScroll_t = setTimeout(function () {
                    if ($(document).scrollTop() > 100) {
                        el.addClass(showClass);
                    }
                    else {
                        el.removeClass(showClass);
                    }
                }, 300);
            });
        },

        _onButtonClick: function(el) {
            const self = this;

            el.click(function (e) {
                const target = el.attr(self.options.attr);
                const offset = self.options.offset;

                if ($(target).length) {
                    let pos = $(target).offset().top;

                    $("html, body").animate({ scrollTop: pos - offset }, 400, "easeOutCubic");
                }
                return false;
            });
        }
    });

    return $.jq.scrollTo;
});
