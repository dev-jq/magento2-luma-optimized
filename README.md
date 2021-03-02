# fasterM2
Speed-up your Magento 2 frontend performance! Google PageSpeed / Chrome Lighthouse over 95/100 points (on Desktop) and over 80/100 points on mobile devices. It's possible!

1. Optimize images (=> https://tinypng.com)

2. Lazyload off-screen images (=> https://github.com/aFarkas/lazysizes)

3. Custom Google fonts load only localy (=> https://google-webfonts-helper.herokuapp.com/fonts), not from Google server!
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
- for homepage (styles-home-m.css and styles-home-l.css)
- for catalog/search result (styles-catalog-m.css and styles-catalog-l.css)
- for product (styles-product-m.css and styles-product-l.css)
- for static pages (styles-cms-m.css and styles-cms-l.css)
- for customer pages [login, register, forgott password, customer panel] (styles-customer-m.css and styles-customer-l.css)
- and custom as needed (blog, etc.) 

6. Always use Magento breakpoint directives in all .less files!
(To avoid dupliacation styles in mobile i desktop file! Remember Magento 2 is 'mobile first' RWD => https://absolutecommerce.co.uk/blog/mobile-first-responsive-magento2-theme)

7. Remove unnecessery scripts and optimize another to load only on used page (=> https://medium.com/@jahvi/how-to-improve-magento-2-page-speed-insights-score-bb37e8946192)

8. Use critical style (=> https://jonassebastianohlsson.com/criticalpathcssgenerator/)

9. Move scripts from head to footer

10. Enable css/js minification, cache and production mode

11. Veb Vitals:
- pay attention for 'above the fold' elements
- better LCP: if 'above the fold' is an image or background image (e.g. slider) add to <head> preload tag to this image:
  <link rel="preload" as="image" href="path/to/your/image.jpg">
- NEVER use lazylaod for images that are in 'above the fold'!
- dalay 3rd party scripts (GTM, Analytics, FB, etc.) => https://github.com/biggerpicturestudio/delaying-3rd-parties
-
