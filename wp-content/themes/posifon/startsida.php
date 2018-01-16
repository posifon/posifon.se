<?php
/***************************
 * Template Name: Startsida
 * Created by:
 *                  User:    Fredrik Beckius
 *                  Company: Posifon AB
 *                  URL:     http://fredrikbeckius.se, http://posifon.se
 *                  Date:    2016-04-03
 *
 ***************************/
get_header(); ?>
  <main>
    <section class="background-image" style="background-image: url(<?php header_image(); ?>);">
        <!--[if lt IE 9]>
        </section>
        <section class="ie">
          <img src="<?php header_image(); ?>" alt="Front page image" />
        <![endif]-->
        <div id="arrow">
          <a href="#intro-posifon"></a>
        </div>
        <div class="text-overlay">
          <div class="first-page-col">
            <h1 class="special"><?php echo get_field('tagline'); ?></h1>
          </div>
          <div class="divider"></div>
          <div class="first-page-col">
            <h3 class="posifon-blue"><?php echo get_field('news'); ?></h3>
            <?php query_posts("post_per_page=1"); the_post(); ?>
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
            <?php wp_reset_query(); ?>
          </div>
        </div>
    </section>
    <div class="wrap960">
      <section id="intro-posifon" class="blank">
        <div class="center">
          <?php 
            // Retrieving and displaying the name and description for the static content taxonomy  
            $term = get_term_by( 'slug', 'intro', 'content_taxonomy' );
          ?>
            <h1><?php echo $term->name; ?></h1>
            <p>
              <?php echo $term->description; ?>
            </p>
        </div>
        <?php
          // initiaing a counter to keep the posts ordered in columns, the counter will let us insert a new row for every two posts.
          $counter = 1; 
          $loop = new WP_Query( array( 'content_taxonomy' => 'intro' ) );
          $post_count = $loop->post_count;
          if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
          // Start of loop 
          if (($counter % 2) != 0) : echo '<div class="row">'; endif; ?>
          <div class="col">
            <div class="card" id="post-<?php the_ID(); ?>">
              <?php if ($background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' )) : ?>
                <div class="card-image" style="background-image: url('<?php echo $background[0]; ?>')"></div>
                <?php ; endif; ?>
                  <h3 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h3>
                  <?php the_content(); ?>
            </div>
          </div>
          <?php 
            if (($counter % 2) == 0) : echo '</div>'; endif;
            $counter++; endwhile; endif; 
          wp_reset_query(); 
          // end of loop
        ?>
      </section>
      <!-- End "intro-posifon" -->

      <section id="nytta-alla" class="blank">
        <div class="center">
          <?php 
            // Retrieving and displaying the name and description for the static content taxonomy  
            $term = get_term_by( 'slug', 'uses', 'content_taxonomy' );
          ?>
            <h1><?php echo $term->name; ?></h1>
            <p>
              <?php echo $term->description; ?>
            </p>
        </div>
        <?php
          // initiaing a counter to keep the posts ordered in columns, the counter will let us insert a new row for every two posts.
          $counter = 1; 
          $loop = new WP_Query( array( 'content_taxonomy' => 'uses' ) ); 
          $post_count = $loop->post_count;
          if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
          // Start of loop 
          if ($counter == 1 || (($counter - 1) % ceil($post_count / 2)) == 0) : echo '<div class="col">'; endif; ?>
          <div class="expander-container card card-hover" id="post-<?php the_ID(); ?>">
            <?php if ($background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' )) : ?>
            <div class="card-image cover" style="background-image: url('<?php echo $background[0]; ?>')"></div>
            <?php ; endif; ?>
            <div class="expander-title">
              <h3 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h3>
            </div>
            <div class="expander-content">
              <?php the_content(); ?>
            </div>
          </div>
          <?php if ($counter == $post_count || (($counter % ceil($post_count / 2)) == 0)) : echo '</div>'; endif;
          $counter++; endwhile; endif; 
          wp_reset_query(); 
          // end of loop 
        ?>
      </section>
      <!-- End "nytta-alla" -->
  </main>
  <?php get_footer(); ?>
