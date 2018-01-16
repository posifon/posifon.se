<?php
/**
 * Template Name: Vilka är vi?
 * Created by:
 *                  User:    Christian Wickerström
 *                  Company: Posifon AB
 *                  URL:     http://posifon.se
 *                  Date:    2017-05-02
 *
 */


get_header(); ?>
  <?php
  // Define the names of the custom fields used by the Custom Post Type.
  $the_name = 'name';
  $the_jobtitle = 'jobtitle';
  $the_image = 'image';
  $the_email = 'email';
?>
    <main class="wrap960" role="main">
      <section class="blank">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="center">
            <?php
              // Retrieving and posting the label and description for the custom post type
              $post_type = get_post_type_object('personal'); ?>
              <h1>Vilka är vi?</h1>
              <p>
                <?php echo "Posifon AB är ett IT/telekom-företag som, baserat på app- och mobiltelefoniteknologi, erbjuder avancerade tjänster för ökad trygghet och livskvalitet. Vi är ett innovativt och kundnära företag med huvudkontor i Göteborg!" ?>
              </p>
              <h5>Våra Medarbetare</h5>
          </div>
          <?php endwhile; endif; ?>

            <?php
            $counter = 0; // Counter used to insert rows every 3 cols
            $loop = new WP_Query( array( 'post_type' => 'personal', 'posts_per_page' => -1 ) );
            if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();

        // START OF LOOP ?>
              <?php if ((($counter) % 3) == 0) : echo '<div class="row">'; endif; ?>
                <div class="col3">
                  <div class="card-about" id="post-<?php the_ID(); ?>">
                          <h2><?php echo get_field($the_name); ?></h2>
                          <h5><?php echo get_field($the_jobtitle);  ?></h5>
                          <p><?php echo get_field($the_email); ?></p>
                  </div>
                </div>
                <?php $counter++; if (($counter % 3) == 0) : echo '</div>'; endif; ?>
            <?php endwhile; endif; wp_reset_query();
        // END OF LOOP ?>
        </section>
    </main>
    <?php get_footer(); ?>
