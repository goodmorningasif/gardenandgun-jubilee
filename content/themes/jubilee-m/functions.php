<?php
/** 
 * Functions
 *
 * Smart functions
 *
 * @link [INIT]
 *
 * @package [INIT]
 * @subpackage Wordpress
 * @since 1.0
 * @version 1.0
 */

  include 'config.php';

  /* Define Variables  */
  $GLOBALS['url'] = get_template_directory_uri();
  $GLOBALS['root'] = 'http://10.1.10.96/gardenandgun-jubilee';
  $GLOBALS['docpath'] = $_SERVER['DOCUMENT_ROOT'].'/gardenandgun-jubilee';

  /* Add Styles, Fonts, and Javascript */
  function my_enqueue_style() {
    wp_enqueue_style('wowcss', $GLOBALS['url'].'/prod/animate.css');
    wp_enqueue_style('typography', 'https://cloud.typography.com/778678/7958572/css/fonts.css');
    wp_enqueue_style('webfonts', $GLOBALS['url'].'/assets/webfonts/MyFontsWebfontsKit.css');
    wp_enqueue_style('styles', $GLOBALS['url'].'/prod/styles.css');
    wp_enqueue_style('swipercss', $GLOBALS['url'].'/prod/swiper.min.css');
    wp_enqueue_script('wowjs', $GLOBALS['url'].'/prod/wow.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('underscore', $GLOBALS['url'].'/prod/underscore.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts', $GLOBALS['url'].'/prod/scripts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('swiperjs', $GLOBALS['url'].'/prod/swiper.min.js', array('jquery'), '1.0.0', true);
  }
  add_action( 'wp_enqueue_scripts', 'my_enqueue_style' );
  // add_theme_support( 'post-thumbnails' );


  /* Remove Admin Login */
  function remove_admin_login_header() {
    // remove_action('wp_head', '_admin_bar_bump_cb');
  }
  add_action('get_header', 'remove_admin_login_header');


  /* remove auto paragraph tag from the-content */
  remove_filter('the_content', 'wpautop');

  
  /**
  * isMobile
  *
  * returns true/false if there is a match for browser. 
  */
  function isMobile() {
    return preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackbe‌​rry|iemobile|bolt|bo‌​ost|cricket|docomo|f‌​one|hiptop|mini|oper‌​a mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|‌​webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }

  
  /**
  *
  * test
  *
  * shortcut to test function
  */
  function test($var, $mes){
    echo "<script>console.log('".$var.", outputs ".$mes."');</script>";
  }


  /**
  *
  * Adds option tab
  *
  */
  if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
  }
  /**
  *
  * Disables Emoji script
  *
  */
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );

  /**
  *
  * Disables Theme Editor
  *
  */
  function remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
  }
  add_action('_admin_menu', 'remove_editor_menu', 1);


  /**
  *
  * Output Buffer Contents
  *
  * Basically says remember this content but 
  * don't do anything with it just yet
  *
  */
  function output_buffer_contents($function, $args = array()) {
    ob_start();
    $function($args);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }


  /**
  *
  * Show Template
  *
  */
  function show_template() {
    if ($_SERVER["SERVER_ADDR"] == '10.1.10.96') {
      global $template;
    }
  }


?>