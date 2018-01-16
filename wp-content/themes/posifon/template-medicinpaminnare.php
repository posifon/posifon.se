<?php
/***************************
 * Template Name: Medicinpåminnare
 * Created by:
 *                  User:    Christian Wickerström
 *                  Company: Posifon AB
 *                  URL:     http://posifon.se
 *                  Date:    2018-01-15
 *
 ***************************/
get_header(); ?>
  <main>
    <div class="wrap960">
      <section id="intro-posifon" class="blank">
        <div class="center">
          <?php 
            // Retrieving and displaying the name and description for the static content taxonomy  
            $term = get_term_by( 'slug', 'careousel-medicindoserare', 'content_taxonomy' );
          ?>
            <h1><?php echo $term->name; ?></h1>
            <p>
              <?php echo $term->description; ?>
            </p>
        </div>
        <?php
          // initiaing a counter to keep the posts ordered in columns, the counter will let us insert a new row for every two posts.
          $counter = 1; 
          $loop = new WP_Query( array( 'content_taxonomy' => 'careousel-medicindoserare' ) );
          $post_count = $loop->post_count;
          if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
          // Start of loop 
          if (($counter % 2) != 0) : echo '<div class="row">'; endif; ?>
          <div class="col">
            <div class="card" id="post-<?php the_ID(); ?>">
              <?php if ($background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' )) : ?>
                <div class="card-image" style="background-image: url('<?php echo $background[0]; ?>')"></div>
                <?php ; endif; ?>
                  <c><h3 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h3></c>
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
            $term = get_term_by( 'slug', 'careousel-for-dig-och-for-oss-tillsammans', 'content_taxonomy' );
          ?>
            <h1><?php echo $term->name; ?></h1>
            <p>
              <?php echo $term->description; ?>
            </p>
        </div>
        <?php
          // initiaing a counter to keep the posts ordered in columns, the counter will let us insert a new row for every two posts.
          $counter = 1; 
          $loop = new WP_Query( array( 'content_taxonomy' => 'careousel-for-dig-och-for-oss-tillsammans' ) ); 
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


  <?php
  // Define the names of the custom fields used by the Custom Post Type.
  $the_description = 'product-description';
  $the_image = 'product-picture';
  $the_details = 'product-details';
  $the_accessories = 'product-accessories';
  $the_price = 'pris';
  ?>
    <main class="wrap960" role="main">
      <?php
        //Custom loop for custom post type "enhet", used to retrieve product information.
        $loop = new WP_Query( array( 'post_type' => 'medicin', 'posts_per_page' => -1 ) ); ?>
        <?php if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
      // START OF LOOP ?>
          <section id="<?php echo $title = get_the_title(); ?>" class="blank">
            <div class="post product-details-line card" id="post-<?php the_ID(); ?>">
              <h2><?php echo $title; ?></h2>
              <div class="tab-box">
                <div class="product-details-img">
                  <?php if( function_exists( 'easy_image_gallery' ) ) {
                     echo easy_image_gallery();
                  } ?>
                </div>
                <ul class="tab-nav">
                  <!-- Javascript used to hide and show tabs -->
                  <li><a class="button active" href="#">Beskrivning</a></li>
                  <li><a class="button" href="#">Detaljer</a></li>
                  <li><a class="button" href="#">Tillbehör</a></li>
                  <li><a class="button" href="#">Pris</a></li>
                </ul>
                <div class="tab-content beskrivning">
                  <!-- first tab -->
                  <?php
                    the_content();
                  ?>
                </div>
                <div class="tab-content detaljer">
                  <!-- Second tab -->
                  <div class="textcol">
                    <?php echo get_field_strip_images($the_details); ?>
                  </div>
                  <div class="imagecol">
                    <?php images(get_field($the_details),'all', '100%', 'auto', '', false); ?>
                  </div>
                </div>
                <div class="tab-content tillbehor">
                  <!-- Third tab -->
                  <div class="textcol">
                    <?php echo get_field_strip_images($the_accessories); ?>
                  </div>
                  <div class="imagecol">
                    <?php images(get_field($the_accessories),'all', '100%', 'auto', '', false); ?>
                  </div>
                </div>
                <div class="tab-content abonnemang">
                  <!-- Fourth tab -->
                  <div class="textcol">
                    <?php echo get_field_strip_images($the_price); ?>
                  </div>
                  <div class="imagecol">
                    <?php images(get_field($the_price),'all', '100%', 'auto', '', false); ?>
                  </div>
                </div>
              </div>
            </div>
            <p style="text-align: right"><a href="<?php echo get_permalink(13); ?>">Kontakta oss för mer information! >></a></p>
          </section>
          <?php endwhile; endif; wp_reset_query();
      // END OF LOOP ?>

  </main>
  <?php get_footer(); ?>
