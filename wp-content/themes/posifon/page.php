<?php get_header(); ?>
  <div class="wrap960">
    <section class="blank">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="center" id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h1>
          <div class="post card" id="post-<?php the_ID(); ?>">
            <?php the_content(); ?>
          </div>
          <?php endwhile; endif; ?>
    </section>
  </div>

  <?php get_footer(); ?>
