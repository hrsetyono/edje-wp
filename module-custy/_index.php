<?php
define( 'BLOCKSY_ROOT', H_DIR . '/module-custy' );
define( 'BLOCKSY_DIR', H_DIR . '/module-custy/blocksy' );
define( 'BLOCKSY_URL', H_URL . 'module-custy' );
define( 'BLOCKSY_CSS_DIR', plugin_dir_url(__FILE__) . 'blocksy/css' );
define( 'BLOCKSY_JS_DIR', plugin_dir_url(__FILE__) . 'blocksy/js' );


require_once __DIR__ . '/custy-helper.php';


add_action( 'plugins_loaded', '_custy_loaded' );
add_action( 'after_setup_theme' , '_custy_after_theme', 9999 );

add_action( 'init', function() {
  CustyBuilder::set_items(); // initiate builder cache
}, 9999 );


/**
 * Load Blocksy and default values
 * 
 * @action plugins_loaded
 */
function _custy_loaded() {
  require_once BLOCKSY_DIR . '/_index.php';
  
  // DEFAULT VALUES
  require_once __DIR__ . '/core-sections/_core-defaults.php';
  require_once __DIR__ . '/header-items/_header-defaults.php';
  require_once __DIR__ . '/footer-items/_footer-defaults.php';
  
  add_filter( 'custy_default_values', '_custy_core_default_values' );
  add_filter( 'custy_default_values', '_custy_header_default_values' );
  add_filter( 'custy_default_values', '_custy_footer_default_values' );
}


/**
 * Load all custom functions
 * 
 * @action after_setup_theme 9999
 */
function _custy_after_theme() {
  require_once __DIR__ . '/enqueue.php';
  require_once __DIR__ . '/shortcode.php';

  require_once __DIR__ . '/format-options.php';
  require_once __DIR__ . '/format-values.php';

  require_once __DIR__ . '/sync-preview.php';

  // Populate options
  require_once __DIR__ . '/core-sections/_index.php';
  require_once __DIR__ . '/header-items/_index.php';
  require_once __DIR__ . '/footer-items/_index.php';

  // Output <style> tags
  require_once __DIR__ . '/stylesheet.php';
  require_once __DIR__ . '/stylesheet-compile.php';
  require_once __DIR__ . '/stylesheet-output.php';
  
  // BUILDER
  require_once __DIR__ . '/builder.php';
  require_once __DIR__ . '/builder-values.php';
}


/////


class Custy {
  /**
   * Get color palette for Gutenberg
   */
  static function get_editor_color_palette() {
    $palette = [
      'Main'         => 'var(--main)',
      'Main Dark'    => 'var(--mainDark)',
      'Main Light'   => 'var(--mainLight)',
      'Sub'          => 'var(--sub)',
      'Sub Light'    => 'var(--subLight)',
      'Text'         => 'var(--text)',
      'Text Dim'     => 'var(--textDim)',
      'Text Invert'  => 'var(--textInvert)',
    ];

    // check for extra colors
    $extra_colors = self::get_mod( 'extraColor' );

    $index = 1;
    foreach( $extra_colors as $c ) {
      if( $c['color'] !== 'CT_CSS_SKIP_RULE' ) {
        $palette[ "Extra {$index}" ] = "var(--extra{$index})";
      }
      
      $index++;
    }

    return H::color_palette( $palette );
  }


  /**
   * Get all theme mods and assign default values if doesn't exists
   * 
   * @return array - All the theme mods
   */
  static function get_mods() {
    global $custy_mods;

    if( empty( $custy_mods ) ) {
      $defaults = self::get_default_values();
      $custy_mods = wp_parse_args( get_theme_mods(), $defaults );
    }
    return $custy_mods;
  }

  /**
   * Get theme mod that is generated with Blocksy
   * 
   * @param $id (string) - The option ID
   * @return mixed - The mod value or "false" if not found
   */
  static function get_mod( $id ) {
    $mods = self::get_mods();
    return $mods[ $id ] ?? null;
  }


  /**
   * Get the default value of theme mods
   * 
   * @param $type (string) - Either 'footer', 'header', or 'all'
   */
  static function get_default_values( $type = 'all' ) {
    global $custy_default_values;
    $custy_default_values = $custy_default_values ?? apply_filters( 'custy_default_values', [] );

    if( $type == 'all' ) {
      return $custy_default_values;
    } else {
      return $custy_default_values[ $type ] ?? null;
    }
  }

  /**
   * Get a single default value
   */
  static function get_default_value( $option_id ) {
    $defaults = self::get_default_values();
    return $defaults[ $option_id ] ?? null;
  }


  /**
   * Get the list of sections for theme mods
   */
  static function get_sections() {
    global $custy_sections;

    if( empty( $custy_sections ) ) {
      $custy_sections = apply_filters( 'custy_sections', [] );
    }

    return $custy_sections;
  }
}