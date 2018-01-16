<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage posifon
 * @since Posifon 2.0
 */

get_header(); ?>
  <main class="wrap960" role="main">
    <section class="blank">
      <h1 class="center"><?php single_post_title() ?></h1>
      <div id="content">
        <?php if ( is_front_page() && is_home() ) {
          // Default homepage ?>

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post card" id="post-<?php the_ID(); ?>">
              <h4 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h4>
              <?php the_excerpt(); ?>
            </div>
            <?php endwhile; endif; ?>
              <?php get_template_part( 'nav' ); ?>
      </div>
      <?php get_sidebar(); ?>
        <?php

} elseif ( is_front_page() ) {
  // static homepage
} elseif ( is_home() ) {
  // blog page ?>
          <?php if (have_posts()) : while (have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );
      endwhile; endif; ?>
            <?php get_template_part( 'nav' ); ?>
              </div>
              <?php get_sidebar('nyheter'); ?>

                <?php
} else {
  //everything else
}
?>
    </section>
  </main>
  <?php get_footer(); ?>
