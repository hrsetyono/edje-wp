<?php namespace h;
/**
 * Modify Jetpack modules
 */
class Modify_Jetpack {
  function __construct() {
    add_action( 'init', [$this, 'init'] );

    add_action( 'wp_head', [$this, 'wp_head'], 2 );
    add_action( 'wp_footer', [$this, 'wp_footer'] );

    // disable jetpack css
    add_filter( 'jetpack_implode_frontend_css', '__return_false' );
    add_filter( 'jetpack_lazy_images_blacklisted_classes', [$this, 'blacklisted_lazyload_classes'] );
  }


  function init() {
    add_filter( 'wp', [$this, 'remove_related_posts'], 20 );

    // add woocommerce to sitemap
    if( \_H::is_plugin_active('woocommerce') ) {
      add_filter( 'jetpack_sitemap_post_types', [$this, 'add_woocommerce_to_sitemap'] );
    }
  }

  /*
    Remove Jetpack Related Post from default position
    @filter wp
  */
  function remove_related_posts() {
    if( class_exists('Jetpack_RelatedPosts') ) {
      $jprp = \Jetpack_RelatedPosts::init();
      $callback = [$jprp, 'filter_add_target_to_dom'];
      remove_filter( 'the_content', $callback, 40 );
    }
  }

  /*
    Add WooCommerce's product to Sitemap

    @filter jetpack_sitemap_post_types
    @param array $post_types
    @return array
  */
  function add_woocommerce_to_sitemap( $post_types ) {
    $post_types[] = 'product';
    return $post_types;
  }

  /*
    Remove redundant JS and CSS
    @action wp_head 2
  */
  function wp_head() {
    wp_dequeue_script( 'devicepx' );
    wp_dequeue_style( 'sharedaddy' );

    if( function_exists('sharing_maybe_enqueue_scripts') && sharing_maybe_enqueue_scripts() ) {
      wp_enqueue_style( 'social-logos' ); 
    }
  }

  /*
    Remove redundant CSS and JS
    @action wp_footer
  */
  function wp_footer() {
    // wp_deregister_script( 'sharing-js' );

    // disable spinner when infinite loading is enabled
    wp_deregister_script( 'jquery.spin' );
    wp_deregister_script( 'spin' );
  }

  /*
    Prevent lazyloading some classes
    @filter jetpack_lazy_images_blacklisted_classes
  */
  function blacklisted_lazyload_classes( $classes ) {
    $classes[] = 'custom-logo';
    return $classes;
  }
}
