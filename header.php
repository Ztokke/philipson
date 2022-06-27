<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package philipson
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <link rel='stylesheet' href='/wp-content/themes/philipson/styles/main.css' media='all' />
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e( 'Skip to content', 'philipson' ); ?>
  </a>

  <header id="masthead" class="site-header">
    <div class="content-wrapper">
      <div class="site-branding">
        <img src="/img/blue.svg" alt="fisken" />
        <?php
        the_custom_logo($blog_id);
        if ( is_front_page() && is_home() ) :
          ?>
          <img src="/wp-content/themes/Philipson/img/blue.svg" alt="fisken" />
          <h1 class="site-title --one">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php bloginfo( 'name' ); ?>
            </a>
          </h1>
          <?php else :?>
          <div class="site-title --two">
            <?php the_custom_logo($blog_id); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php bloginfo( 'name' ); ?>
            </a>
          </div>
          <?php
            endif; $philipson_description = get_bloginfo( 'description', 'display' );
            if ( $philipson_description || is_customize_preview() ) : ?>
          <p class="site-description">
            <?php echo $philipson_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </p>
        <?php endif; ?>
      </div>
      <!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <?php esc_html_e( 'Primary Menu', 'philipson' ); ?>
        </button>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
          )
        );
        ?>
      </nav>
      <!-- #site-navigation -->
    </div>
  </header>
  <!-- #masthead -->
