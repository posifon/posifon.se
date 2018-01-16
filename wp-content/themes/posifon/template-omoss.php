<?php get_header();

/**
 * Template Name: Om
 * Created by:
 *                  User:    Fredrik Beckius
 *                  Company: Posifon AB
 *                  URL:     http://fredrikbeckius.se, http://posifon.se
 *                  Date:    2015-07-31
 *
 */
?>
  <main class="wrap960">
    <section class="blank">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="center" id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h1>
    <div id="content">
      <div class="post card" id="post-<?php the_ID(); ?>">
        <?php the_content(); ?>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar("omoss"); ?>
    </section>
  </main>
  <?php get_footer(); ?>
