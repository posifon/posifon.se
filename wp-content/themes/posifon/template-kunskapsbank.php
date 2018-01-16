<?php
/**
 * Template Name: Kunskapsbank
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
  $the_link = 'link'; // Länk till artikelkällan

?>
<main id="main" class="wrap960" role="main">
<section id="first" class="blank">
  <!-- Title and text retrieved from the wordpress page -->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post center" id="post-<?php the_ID(); ?>">
    <h1 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h1>
    <?php the_content(); ?>
  </div>
  <?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
<?php 
  // Retrieving and posting the label and description for the custom post type
  $post_type = get_post_type_object('kunskap'); ?>
  <div class="center">
    <h2><?php echo $post_type->labels->name; ?></h2>
    <p><?php echo $post_type->description; ?></p>
  </div>
  <!-- Custom loop for custom post type "kunskap", used to retrieve articles. -->
  <?php $loop = new WP_Query( array( 'post_type' => 'kunskap', 'posts_per_page' => -1 ) );
  if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); 
// START OF LOOP ?>
  <div class="post kunskap-container card card-hover" id="post-<?php the_ID(); ?>">
    <div class="kunskap-title"><h3 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h3></div>
    <!-- arrow and cross symbols -->
    <div class="kunskap-link minimized"><a class="arrow" href="#"></a></div>
    <div class="kunskap-link expanded"><a class="x" href="#"></a></div>
    <!-- the article content, toggled by javascript -->
    <div class="kunskap-content">
      <?php if ( has_post_thumbnail() ) {
          $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
          echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
          echo get_the_post_thumbnail();
          echo '</a>';
        }
      ?>
      <div class="kunskap-text">
        <?php
          the_content(); 
          if ($the_link_text = get_field($the_link)) { ?>
            <p>Källa: <a href="<?php echo $the_link_text; ?>"><?php echo $the_link_text; ?></a></p>
          <?php }
        ?>
      </div>
    </div>
  </div>
  <?php endwhile; endif; wp_reset_query(); 
// END OF LOOP ?> 
</section>
  
<section id="second" class="blank">

<?php 
  // Retrieving and posting the label and description for the custom post type
  $post_type = get_post_type_object('faq'); ?>
  <div class="center">
    <h2><?php echo $post_type->labels->name; ?></h2>
    <p><?php echo $post_type->description; ?></p>
  </div>
  <?php $counter = 0; // Counter for adding column when half of the posts have been counted.
  $post_count = wp_count_posts('faq')->publish; ?>
  <!-- Custom loop for custom post type "kunskap", used to retrieve articles. -->
  <?php $loop = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1 ) ); ?>
  <?php if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); 
// START OF LOOP ?>  
  <?php if ($counter % ceil($post_count / 2) == 0) : echo '<div class="col">'; endif; ?>
  <div class="post kunskap-container card card-hover" id="post-<?php the_ID(); ?>">
    <div class="kunskap-title"><h3 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo $the_title; ?></h3></div>
    <!-- arrow and cross symbols -->
    <div class="kunskap-link minimized"><a class="arrow" href="#"></a></div>
    <div class="kunskap-link expanded"><a class="x" href="#"></a></div>
    <!-- the article content, toggled by javascript -->
    <div class="kunskap-content">
      <?php the_content(); ?>
    </div>
  </div>
  <?php $counter++; if ($counter == $post_count || $counter % ceil($post_count / 2) == 0) : echo '</div>'; endif; ?>
  <?php endwhile; endif; wp_reset_query(); 
// END OF LOOP ?> 
</section>  
</main>
<?php get_footer(); ?>