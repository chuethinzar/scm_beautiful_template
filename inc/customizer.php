<?php
/**
 * scm_beautiful Theme Customizer.
 *
 * @package scm_beautiful
 */

if (!function_exists('scm_beautiful_style')) :
  /**
   * Styles the header image and text displayed on the blog
   *
   * @see scm_beautiful_custom_header_setup().
   */
  function scm_beautiful_style()
  {
    // Theme color
    $header_text_color    = get_header_textcolor();
    // $body_bg_color        = get_background_color();
    $header_bg_color      = get_theme_mod('themename_header_bgcolor');
    $menu_bgcolor         = get_theme_mod('themename_menu_bgcolor');
    $txt_color            = get_theme_mod('themename_txtcolor');
    $menu_hover_bgcolor   = get_theme_mod('themename_menu_hover_bgcolor');
    $theme_bgcolor1       = get_theme_mod('themename_theme_bgcolor1');
    
    $widget_title_fontawesome = get_theme_mod('themename_widget_title_fontawesome');
    $widget_list_fontawesome  = get_theme_mod('themename_widget_list_fontawesome');
    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
      <?php
      // Has the text been hidden?
      if ('blank' === $header_text_color) :
      ?>
        .site-title,
        .site-description {
          position: absolute;
          clip: rect(1px, 1px, 1px, 1px);
        }
      <?php
      // If the user has set a custom color for the text use that.
      else :
      ?>
        .site-title a,
        .site-description {
          color: #<?php echo esc_attr($header_text_color); ?>;
        }
      <?php endif;?>
      .site .site-branding,
      .site-content,
      .widget_posts h2,
      .flex-control-nav.flex-control-paging {
        background-color: <?php echo esc_attr($header_bg_color); ?>;
      }
      .header-menu,
      .header-menu .main-navigation ul .sub-menu a{
        background-color: <?php echo esc_attr($menu_bgcolor); ?>;
      }
      .header-menu .main-navigation a,
      .header-menu .main-navigation ul .sub-menu a,
      .widget_posts h2,
      .widget_posts ul li p,
      .site .site-content .content-area .site-main .top-page .post .entry-blocktext a,
      .site .site-content .content-area .site-main .top-page .post .entry-blocktext .entry-summary,
      .widget-area .widget .widget-title,
      .widget-area .widget ul li a,
      .pagetop .fa,
      .site-footer .site-info h2{
        color: <?php echo esc_attr($txt_color); ?>;
      }

      .header-menu .main-navigation ul .sub-menu a:hover,
      .header-menu .main-navigation li:hover{
        background-color: <?php echo esc_attr($menu_hover_bgcolor); ?>;
      }
      .site-branding .site-title a:hover,
      .widget_posts ul li p:hover,
      .site .site-content .content-area .site-main .top-page .post .entry-blocktext a:hover,
      .widget-area .widget ul li a:hover,
      .pagetop .fa:hover,
      .site-main-archive .post .entry-blocktext a:hover{
        color: <?php echo esc_attr($menu_hover_bgcolor); ?>;
      }
      .site .site-content .content-area .site-main .top-page .post .entry-blocktext,
      .widget-area .widget,
      .site .site-footer,
      .pagetop,
      .site-main-archive .post .entry-blocktext{
        background-color: <?php echo esc_attr($theme_bgcolor1); ?>;
      }

    </style>
    <?php
  }
endif; // scm_beautiful_style

if (!function_exists('scm_beautiful_admin_header_style')) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see scm_beautiful_custom_header_setup().
 */
  function scm_beautiful_admin_header_style()
  { ?>
    <style type="text/css">
      .appearance_page_custom-header #headimg {
        border: none;
      }
      #headimg h1,
      #desc {
      }
      #headimg h1 {
      }
      #headimg h1 a {
      }
      #desc {
      }
      #headimg img {
      }
    </style>
  <?php
  }
endif; // scm_beautiful_admin_header_style

if (!function_exists('scm_beautiful_admin_header_image')) :
  /**
   * Custom header image markup displayed on the Appearance > Header admin panel.
   *
   * @see scm_beautiful_custom_header_setup().
   */
  function scm_beautiful_admin_header_image()
  { ?>
    <div id="headimg">
      <h1 class="displaying-header-text">
        <a id="name" style="<?php echo esc_attr('color: #' . get_header_textcolor()); ?>" onclick="return false;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?>
        </a>
      </h1>
      <div class="displaying-header-text" id="desc" style="<?php echo esc_attr('color: #' . get_header_textcolor()); ?>"><?php bloginfo('description');?>
      </div>
      <?php if (get_header_image()) : ?>
        <img src="<?php header_image();?>" alt="">
      <?php endif;?>
    </div>
  <?php
  }
endif; // scm_beautiful_admin_header_image

if (!function_exists('themename_get_option')) :
  function themename_get_option($themename_name, $themename_default = false)
  {
    $themename_config = get_option('themename');

    if (!isset($themename_config)) :
      return $sthemename_default;
    else :
      $themename_options = $themename_config;
    endif;
    if (isset($themename_options[$themename_name])) :
      return $themename_options[$themename_name];
    else :
      return $themename_default;
    endif;
  }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themename_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport        = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}
add_action('customize_register', 'themename_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scm_beautiful_customize_preview_js()
{
  wp_enqueue_script('scm_beautiful_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'scm_beautiful_customize_preview_js');
?>
