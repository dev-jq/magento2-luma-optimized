var config = {
    map: {
        '*': {

        }
    },
    paths: {
        'jquery/patches/jquery': 'js/empty',
/*        'knockoutjs/knockout-fast-foreach': 'js/empty',
        'knockoutjs/knockout-es5': 'js/empty',
        'mage/calendar': 'js/empty',
        'Magento_Ui/js/grid/filters/range': 'js/empty',
        'mage/polyfill': 'js/empty',
        'mage/translate-inline': 'js/empty',
        'Magento_Captcha/js/model/captcha': 'js/empty',
        'Magento_Ui/js/lib/logger/logger': 'js/empty',
        'Magento_Ui/js/lib/logger/formatter': 'js/empty',
        'Magento_Ui/js/lib/logger/console-logger': 'js/empty',
        'Magento_Ui/js/lib/logger/console-output-handler': 'js/empty',
        'Magento_Ui/js/lib/logger/entry-factory': 'js/empty',*/
    },
    config: {
        mixins: {
            jquery: {
                'jquery/patches/jquery': false
            }
        }
    }
};

require(['jquery'], function($) {
    $.migrateMute = true;
});
