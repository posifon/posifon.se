<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage posifon
 * @since posifon 2.0
 */

get_header(); ?>

	<section id="primary" class="wrap960">
		<main id="content" role="main">

		<?php if ( have_posts() ) : ?>
				<?php
					the_archive_title( '<h1 class="page-title center">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
            get_template_part( 'nav' );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
      <?php get_sidebar('nyheter'); ?>
	</section><!-- .content-area -->

<?php get_footer(); ?>
