/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
  // Site title and description.
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function(value) {
    value.bind(function(to) {
      $('.site-description').text(to);
    });
  });
  // Header text color.
  wp.customize('header_textcolor', function(value) {
    value.bind(function(to) {
      if ('blank' === to) {
        $('.site-title a, .site-description').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('.site-title a, .site-description').css({
          'clip': 'auto',
          'color': to,
          'position': 'relative'
        });
      }
    });
  });
  // Header background color.
  wp.customize('themename_header_bgcolor', function(value) {
    value.bind(function(newval) {
      $('.site-content').css({'background-color': newval});
      $('.site .site-branding').css({'background-color': newval});
      $('.site .site-content .content-area').css({'background-color': newval});
      $('.site .site-content .content-area .site-main').css({'background-color': newval});
      $('.flex-control-nav.flex-control-paging').css({'background-color': newval});
      $('.widget_posts h2').css({'background-color': newval});
    });
  });
  // Menu background color
  wp.customize('themename_menu_bgcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu').css({'background-color': newval});
      $('.header-menu .main-navigation ul .sub-menu a').css({'background-color': newval});
      $('.site .site-content .content-area .site-main .top-page .post .entry-blocktext .read-more .submit').css({'background-color': newval});
      $('.widget-area .widget .search-form .search-submit').css({'background-color': newval});
      $('.content-area .site-main-archive .top-page .post .entry-blocktext .read-more .submit').css({'background-color': newval});
      $('.content-area .site-main-archive .post .entry-blocktext .read-more .submit').css({'background-color': newval});
      $('.content-area .site-main-archive .no-results .page-content .search-form .search-submit').css({'background-color': newval});
    });
  });
  // Text color.
  wp.customize('themename_txtcolor', function(value) {
    value.bind(function(newval) {
      $('.header-menu .main-navigation a').css({'color': newval});
      $('.header-menu .main-navigation ul .sub-menu a').css({'color': newval});
      $('.widget_posts h2').css({'color': newval});
      $('.widget_posts ul li p').css({'color': newval});
      $('.site .site-content .content-area .site-main .top-page .post .entry-blocktext a').css({'color': newval});
      $('.site .site-content .content-area .site-main .top-page .post .entry-blocktext .entry-summary').css({'color': newval});
      $('.site-content .pagination .nav-links .page-numbers').css({'color':newval});
      $('.site-content .pagination .nav-links .page-numbers.current').css({'color': newval});
      $('.widget-area .widget ul li a').css({'color': newval});
      $('<style>.widget-area .widget ul li::before{color: ' + newval + ' !important}</style>').appendTo('head');
      $('.widget-area .widget .widget-title').css({'color': newval});
      $('.pagetop .fa').css({'color': newval});
      $('.site-footer .site-info h2').css({'color': newval});
      $('.content-area .site-main-single .page .page-header .page-title').css({'color': newval});
      $('.content-area .site-main-single .page .page-content').css({'color': newval});
      $('.content-area .site-main-single .slides .entry-title').css({'color': newval});
      $('.content-area .site-main-single .slides .post-navigation a').css({'color': newval});
      $('.content-area .site-main-single .post .entry-header .entry-title').css({'color': newval});
      $('.content-area .site-main-single .post .entry-content').css({'color': newval});
      $('.content-area .site-main-single .post .widget.widget-related-post .widget-title').css({'color': newval});
      $('.content-area .site-main-single .post .post-navigation a').css({'color': newval});
      $('.content-area .site-main-single .post .widget.widget-related-post ul li a').css({'color': newval});
      $('.content-area .site-main-single .post .entry-header .entry-meta').css({'color': newval});
      $('.content-area .site-main-single .post .entry-header .entry-meta a').css({'color': newval});
      $('.content-area .site-main-archive .top-page .post .entry-blocktext a').css({'color': newval});
      $('.content-area .site-main-archive .top-page .post .entry-blocktext .entry-summary').css({'color': newval});
      $('.content-area .site-main-archive .no-results.not-found .page-content').css({'color': newval});
      $('.content-area .site-main-archive .page-title').css({'color': newval});
      $('.content-area .site-main-archive .post .entry-blocktext a').css({'color': newval});
      $('.content-area .site-main-archive .post .entry-blocktext .entry-summary').css({'color': newval});
      $('.site .crumbs a').css({'color': newval});
      $('.site .crumbs .current').css({'color': newval});
      $('.site .site-content .error-404 .page-header .page-title').css({'color': newval});
      $('.site .site-content .error-404 .page-content p').css({'color': newval});
    });
  });
  // Menu background hover color.
  wp.customize('themename_menu_hover_bgcolor', function(value) {
    value.bind(function(newval) {
      $('<style>.header-menu .main-navigation ul .sub-menu a:hover, .header-menu .main-navigation li:hover{background-color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.header-menu .main-navigation li:hover{background-color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site-branding .site-title a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.widget_posts ul li p:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site .site-content .content-area .site-main .top-page .post .entry-blocktext a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.widget-area .widget ul li a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.pagetop .fa:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site-main-archive .post .entry-blocktext a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site-main-single .post .post-navigation a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site-main-single .post .widget.widget-related-post ul li a:hover{color:' + newval + ' !important}</style>').appendTo('head');
      $('<style>.site-main-single .slides .post-navigation a:hover{color:' + newval + ' !important}</style>').appendTo('head');
    });
  });
  //Background color1
  wp.customize('themename_theme_bgcolor1', function(value) {
    value.bind(function(newval) {
      $('.site .site-content .content-area .site-main .top-page .post .entry-blocktext').css({'background-color': newval});
      $('.site .site-content .error-404').css({'background-color': newval});
      $('.widget-area .widget').css({'background-color': newval});
      $('.site .site-footer').css({'background-color': newval});
      $('.pagetop').css({'background-color': newval});
      $('.content-area .site-main-archive .top-page .post .entry-blocktext').css({'background-color': newval});
      $('.site-content .pagination .nav-links .page-numbers.current').css({'background-color': newval});
      $('.content-area .site-main-archive .no-results').css({'background-color': newval});
      $('.site-main-single .post .widget.widget-related-post').css({'background-color': newval});
      $('.content-area .site-main-archive .post .entry-blocktext').css({'background-color': newval});
    });
  });
  // Widget Title Font-awesome
  wp.customize('themename_widget_title_fontawesome', function(value) {
    value.bind(function(newval) {
      var val = "\\" + newval;
      $('<style>.widget-area .widget .widget-title::before{content:"' + val + '" !important}</style>').appendTo('head');
    });
  });
  // Widget List Font-awesome
  wp.customize('themename_widget_list_fontawesome', function(value) {
    value.bind(function(newval) {
      var val = "\\" + newval;
      $('<style>.widget-area .widget ul li::before{content:"' + val + '" !important}</style>').appendTo('head');
    });
  });
})( jQuery );
