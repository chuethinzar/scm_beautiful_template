<?php
/**
 * scm_beautiful Theme Color Customizer.
 *
 * @package scm_beautiful
 */
/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since scm beautiful 1.0
 *
 * @see scm_beautiful_style()
 *
 * @uses scm_beautiful_style()
 * @uses scm_beautiful_admin_header_style()
 * @uses scm_beautiful_admin_header_image()
 */
// $bg_image_path = get_template_directory_uri() . '/src/images/background.gif';
function themename_custom_header_and_background()
{
  $default_text_color            = "000000";

  /**
   * Filter the arguments used when adding 'custom-background' support in scm beautiful.
   *
   * @since scm beautiful 1.0
   *
   * @param array $args {
   *     An array of custom-background support arguments.
   *
   *     @type string $default-color Default color of the background.
   * }
   */
  // add_theme_support('custom-background', apply_filters('themename_custom_background_args', array(
  //   'default-color'          => $default_body_background_color,
  //   'default-image'          => $GLOBALS['bg_image_path'],
  //   'wp-head-callback'       => 'scm_beautiful_style',
  //   'admin-preview-callback' => 'scm_beautiful_admin_background_image',
  // )));

  /**
   * Filter the arguments used when adding 'custom-header' support in scm beautiful.
   *
   * @since scm beautiful 1.0
   *
   * @param array $args {
   *     An array of custom-header support arguments.
   *
   *     @type string $default-text-color Default color of the header text.
   *     @type int      $width            Width in pixels of the custom header image. Default 1200.
   *     @type int      $height           Height in pixels of the custom header image. Default 280.
   *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
   *     @type callable $wp-head-callback Callback function used to style the header image and text
   *                                      displayed on the blog.
   * }
   */
  add_theme_support('custom-header', apply_filters('themename_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => $default_text_color,
    'flex-height'            => true,
    'flex-width'             => true,
    'uploads'                => true,
    'wp-head-callback'       => 'scm_beautiful_style',
    'admin-head-callback'    => 'scm_beautiful_admin_header_style',
    'admin-preview-callback' => 'scm_beautiful_admin_header_image',
  )));
}
add_action('after_setup_theme', 'themename_custom_header_and_background');

function theme_customize_register($wp_customize)
{
  $wp_customize->remove_section('header_image');
}
add_action('customize_register', 'theme_customize_register', 50);

/**
 * Adds color supports for the Customizer.
 *
 * @since scm beautiful 1.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function header_footer_color_customizer($wp_customize)
{
  $default_header_bgcolor       = "#ffffff";
  $default_menu_bgcolor         = "#ec766a";
  $default_txtcolor             = "#000000";
  $default_menu_hover_bgcolor   = "#ab6e68";
  $default_bgcolor1             = "#e6e6e6";

  // Header background color customizer
  $wp_customize->add_setting('themename_header_bgcolor', array(
    'default'          => $default_header_bgcolor,
    'wp-head-callback' => 'scm_beautiful_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_header_bgcolor', array(
    'label'    => 'Background Color',
    'section'  => 'colors',
    'settings' => 'themename_header_bgcolor',
  )));
  // Menu background color customizer
  $wp_customize->add_setting('themename_menu_bgcolor', array(
    'default'          => $default_menu_bgcolor,
    'wp-head-callback' => 'scm_beautiful_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_bgcolor', array(
    'label'    => 'Menu Background Color',
    'section'  => 'colors',
    'settings' => 'themename_menu_bgcolor',
  )));
  // Text color customizer
  $wp_customize->add_setting('themename_txtcolor', array(
    'default'          => $default_txtcolor,
    'wp-head-callback' => 'scm_beautiful_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_txtcolor', array(
    'label'    => 'Text Color',
    'section'  => 'colors',
    'settings' => 'themename_txtcolor',
  )));
  //Menu background hover color customizer
  $wp_customize->add_setting('themename_menu_hover_bgcolor', array(
    'default'          => $default_menu_hover_bgcolor,
    'wp-head-callback' => 'scm_beautiful_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_hover_bgcolor', array(
    'label'    => 'Hover Color',
    'section'  => 'colors',
    'settings' => 'themename_menu_hover_bgcolor',
  )));
  //Background color1
  $wp_customize->add_setting('themename_theme_bgcolor1', array(
    'default'          => $default_bgcolor1,
    'wp-head-callback' => 'scm_beautiful_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_theme_bgcolor1', array(
    'label'    => 'Background Color1',
    'section'  => 'colors',
    'settings' => 'themename_theme_bgcolor1',
  )));

}
add_action('customize_register', 'header_footer_color_customizer');

/**
 * Add postMessage support for site title and description for the Theme color Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme color Customizer object.
 */
function themename_customize_color_register($wp_customize)
{
  $wp_customize->get_setting('themename_header_bgcolor')->transport       = 'postMessage';
  $wp_customize->get_setting('themename_menu_bgcolor')->transport         = 'postMessage';
  $wp_customize->get_setting('themename_txtcolor')->transport             = 'postMessage';
  $wp_customize->get_setting('themename_menu_hover_bgcolor')->transport   = 'postMessage';
  $wp_customize->get_setting('themename_theme_bgcolor1')->transport       = 'postMessage';

}
add_action('customize_register', 'themename_customize_color_register');
