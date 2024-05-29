<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">

  <a href="/" title="Kenilworth Heartsafe">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Kenilworth Heartsafe" width="100" height="100" class="site-header__logo" />
  </a>

  <span class="burger js-open-nav"><span></span></span>
  <nav class="nav">
    <span class="nav__close js-close-nav"><span></span></span>
    <?php wp_nav_menu( array( 'menu' => 'main-menu', 'menu_class' => 'nav-list', 'container' => 'ul', )); ?>
    <a href="<?php echo get_option('donate_link'); ?>" title="Donate" target="_blank" class="btn btn--primary site-header__donate">Donate</a>
  </nav>
  <div class="nav-mask"></div>
</header>