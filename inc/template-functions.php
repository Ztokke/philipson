<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package philipson
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function philipson_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  // Adds a class of no-sidebar when there is no sidebar present.
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'no-sidebar';
  }

  return $classes;
}
add_filter( 'body_class', 'philipson_body_classes' );

add_filter( 'render_block', 'wrap_paragraph_block', 10, 2 );
function wrap_paragraph_block( $block_content, $block ) {
  if ( 'core/paragraph' === $block['blockName'] ) {
    $block_content = '<div class="example">' . $block_content . '</div>';
  }
  return $block_content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function philipson_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'wp_head', 'philipson_pingback_header' );
