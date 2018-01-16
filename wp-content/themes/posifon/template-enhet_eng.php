<?php
/**
 * Template Name: Enheter_eng
 * Created by:
 *                  User:    Fredrik Beckius
 *                  Company: Posifon AB
 *                  URL:     http://fredrikbeckius.se, http://posifon.se
 *                  Date:    2015-07-31
 *
 */

get_header(); ?>
  <?php
  // Define the names of the custom fields used by the Custom Post Type.
  $the_description = 'product-description';
  $the_image = 'product-picture';
  $the_details = 'product-details';
  $the_accessories = 'product-accessories';
  $the_price = 'pris';
?>
    <main class="wrap960" role="main">
      <section class="blank">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="center">
            <?php
              // Retrieving and posting the label and description for the custom post type
              $post_type = get_post_type_object('enhet'); ?>
              <h1>Which GPS alarm would you like to know more about?</h1>
              <p>
                We offer the opportunity to try our services, please contact us for more information.
              </p>
          </div>
          <?php endwhile; endif; ?>
            <?php
            $counter = 0; // Counter used to insert rows every 3 cols
            $loop = new WP_Query( array( 'post_type' => 'enhet', 'posts_per_page' => -1 ) );
            if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
        // START OF LOOP ?>
              <?php if ((($counter) % 2) == 0) : echo '<div class="row">'; endif; ?>
                <div class="col2">
                  <div class="card" id="post-<?php the_ID(); ?>">
                    <?php if ($background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium', false, '' )) : ?>
                      <div class="card-image" style="background-image: url('<?php echo $background[0]; ?>')"></div>
                      <?php ; endif; ?>
                        <div class="margin center">
                          <h2 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h2>
                          <p>
                            <?php $description = get_field($the_description); if( !empty($description) ): echo $description; endif; ?>
                          </p>
                          <p><a class="button" href="#<?php the_title(); ?>">I would like to know more!</a></p>
                        </div>
                  </div>
                </div>
                <?php $counter++; if (($counter % 2) == 0) : echo '</div>'; endif; ?>
                  <?php endwhile; endif; wp_reset_query();
        // END OF LOOP ?>
      </section>
      <?php
        //Custom loop for custom post type "enhet", used to retrieve product information.
        $loop = new WP_Query( array( 'post_type' => 'enhet', 'posts_per_page' => -1 ) ); ?>
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
                  <li><a class="button active" href="#">Description</a></li>
                  <li><a class="button" href="#">Details</a></li>
                  <li><a class="button" href="#">Accessories</a></li>
                  <li><a class="button" href="#">Subscription</a></li>
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
            <p style="text-align: right"><a href="<?php echo get_permalink(2082); ?>">Contact us for more information >></a></p>
          </section>
          <?php endwhile; endif; wp_reset_query();
      // END OF LOOP ?>
    </main>
    <?php get_footer(); ?>
