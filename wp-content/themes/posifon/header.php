<?php 
    if (is_singular('enhet')) {
      wp_redirect('http://posifon.se/gps-larm/', 301);
      exit;
    }
    if (is_singular(array('kunskap', 'faq'))) {
      wp_redirect('http://posifon.se/kunskapsbank/', 301);
      exit;
    }
    if (is_singular(array('intro', 'exempel'))) {
      wp_redirect('http://posifon.se/', 301);
      exit;
    }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <?php if (is_search()) { ?>
  <meta name="robots" content="noindex, nofollow" />
  <?php } ?>
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="alternate" hreflang="en" href="http://www.posifon.se/" />
	<!-- Adding google analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-38662438-1', 'auto');
    ga('send', 'pageview');

  </script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="site">
    <header>
      <div class="wrap960">
        <a id="logo" href="<?php echo esc_url( home_url() ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="Posifon logotyp"></a>
        <nav id="nav" role="navigation">
            <?php wp_nav_menu(array( 'menu' => 'Main Nav Menu')); ?>
        </nav>
        <nav id="nav-button" role="navigation"><a href="#"></a></nav>
      </div>
    </header>
    <!-- Page content is loaded by WP -->