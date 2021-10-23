define([
    'jquery',
    'domReady!'
], function ($) {
    'use strict';

    $.widget('jq.pinnedOnScroll', {
        options: {
            enabled: true,
            pinnedClass: 'is-pinned',
            unpinnedClass: 'is-unpinned'
        },

        _create: function() {
            this._bind();
        },

        _bind: function() {
            if (this.options.enabled) {
                const bar = this.element;

                this._onScroll(bar);
            }
        },

        _onScroll: function(el) {
            el = el[0];
            const pinnedClass = this.options.pinnedClass;
            const unpinnedClass = this.options.unpinnedClass;
            let lastScrollPosition = 0;

            window.addEventListener('scroll', () => {
                const newScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                const scrollTop = $(window).scrollTop();
                const footerTop = $('footer').offset().top;
                const windowHeight = $(window).height();
                if (newScrollPosition < lastScrollPosition && !(scrollTop > (footerTop - windowHeight))) {
                    if (!el.classList.contains(pinnedClass)) {
                        el.classList.add(pinnedClass);
                        el.classList.remove(unpinnedClass);
                    }
                } else if (!el.classList.contains(unpinnedClass)) {
                    el.classList.add(unpinnedClass);
                    el.classList.remove(pinnedClass);
                }
                lastScrollPosition = newScrollPosition;
            });
        }
    });

    return $.jq.pinnedOnScroll;
});
