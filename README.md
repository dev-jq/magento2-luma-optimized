# luma_vital - customized and optizmed Magento 2.3.x theme

:heavy_check_mark: Magento 2.3.x - COMPATIBLE

:x: Magento 2.4.x - INCOMPATIBLE, but I'm working on releasing a PREMIUM template, optimized for Core Web Vitals and SEO, and much more than basic Magento Luma! :rocket: _Stay tuned!_


![Luma vital category page](https://github.com/jq91/magento2-luma-optimized/blob/main/README-assets/luma-vital-category.png)

![Luma vital product page](https://github.com/jq91/magento2-luma-optimized/blob/main/README-assets/luma-vital-product.png)

## Theme features
- small colors customizations
- "lazy scripts"
- sticky header
- scroll to top button
- up-scroll pined bottom bar
- plus/minus quantity buttons
- "M2-Luma-Feather" icons pack
- close "X" icon in mobile menu
- category products count number (after category title)
- right-slide minicart
- auto-open minicart after added product
- show / hide eye-icon for password input
- possibility to close all product tabs on Mobile
- auto-scroll to system messages
- product video: iframe autoplay on thumbnail click
- ...
- still in progress...

## Keep in mind
Speed-up your Magento 2 frontend performance! Google PageSpeed / Chrome Lighthouse over 95/100 points (on Desktop) and over 80/100 points on mobile devices. It's possible!

1. Optimize images :point_right: https://tinypng.com

2. Lazyload off-screen images :point_right: https://github.com/aFarkas/lazysizes

3. Custom Google fonts load only localy :point_right: https://google-webfonts-helper.herokuapp.com/fonts, not from Google server!

3b. For font-family declatarion in style use: 
font-display: swap;

4. Use rel="preconntect" for external resources on your store (add it in custom HEAD scripts in configuration):
<link rel="preconnect" href="https://www.googleadservices.com">
<link rel="preconnect" href="https://www.gstatic.com">
<link rel="preconnect" href="https://www.google.pl">
<link rel="preconnect" href="https://googleads.g.doubleclick.net">
<link rel="preconnect" href="https://www.google.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://www.google-analytics.com">
<link rel="preconnect" href="https://connect.facebook.net">
<link rel="preconnect" href="https://www.facebook.com">

5. Separate styles for specific pages:
- general (default styles-m.css and styles-l.css fo all pages)
- for cart and checkout (styles-checkout-m.css and styles-checkout-l.css)
- for homepage (styles-home-m.css and styles-home-l.css)
- for catalog/search result (styles-catalog-m.css and styles-catalog-l.css)
- for product (styles-product-m.css and styles-product-l.css)
- for static pages (styles-cms-m.css and styles-cms-l.css)
- for customer pages [login, register, forgott password, customer panel] (styles-customer-m.css and styles-customer-l.css)
- and custom as needed (blog, etc.) 

6. Always use Magento breakpoint directives in all .less files!
(To avoid dupliacation styles in mobile i desktop file! Remember Magento 2 is 'mobile first' RWD :point_right: https://absolutecommerce.co.uk/blog/mobile-first-responsive-magento2-theme

:point_right: See my "starter" .less file: https://github.com/jq91/magento2-handy-snippets/blob/master/_module.less

7. Remove unnecessery scripts and optimize another to load only on used page :point_right: https://medium.com/@jahvi/how-to-improve-magento-2-page-speed-insights-score-bb37e8946192

8. Use critical styles :point_right: https://jonassebastianohlsson.com/criticalpathcssgenerator/

9. Move scripts from head to footer

10. Enable CSS/JS minification, cache and production mode.

11. Core Veb Vitals:
- pay attention for 'Above The Fold' elements
- better LCP: if 'above the fold' is an image or background image (e.g. slider) add to <head> preload tag to this image:
  
  `<link rel="preload" as="image" href="path/to/your/image.jpg">`
  
- NEVER use lazylaod for images that are in 'above the fold'!
- dalay 3rd party scripts (GTM, Analytics, FB, etc.) :point_right: https://github.com/biggerpicturestudio/delaying-3rd-parties :star:
