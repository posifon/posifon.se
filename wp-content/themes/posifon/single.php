<?php get_header(); ?>
  <section id="primary" class="blank wrap960">
    <main id="content" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="card" id="post-<?php the_ID(); ?>">
          <?php 
            if ( has_post_thumbnail() ) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
                $background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', false, '' ) ?>
                <div class="card-image cover" style="background-image: url('<?php echo $background[0]; ?>')"></div></a>
              <?php }
            ?>
            <span class="date"><?php the_date() ?></span>
            <h2 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h2>
            <?php the_content();
		      the_tags( 'Tags: ', ', ', '');
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
                comment_form();
			endif; ?>
        </div>
        <?php endwhile; endif; 
      get_template_part('nav', 'single'); ?>
    </main>
    <?php get_sidebar('nyheter') ?>
  </section>

  <?php get_footer(); ?>
