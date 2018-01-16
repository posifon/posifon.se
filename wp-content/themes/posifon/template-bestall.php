<?php get_header();

/**
 * Template Name: Beställ
 * Created by:
 *                  User:    Fredrik Beckius
 *                  Company: Posifon AB
 *                  URL:     http://fredrikbeckius.se, http://posifon.se
 *                  Date:    2015-07-31
 *
 */
?>
<div id="popup" class="card"> <!-- popup for choosing form and price list. Using bPopup jqeury script -->
  <p>Är du privat- eller omsorgskund?</p>
  <button id="privat" class="b-close" type="button">Privat</button>
  <button id="omsorg" class="b-close" type="button">Omsorg</button>
</div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <div class="wrap960">
        <section class="blank">
          <h1 class="center"><?php the_title(); ?></h1>
          <div class="card">
            <?php the_content(); ?>
          </div>
        </section>
      </div>
    </div>
    <?php endwhile; endif; ?>
  <?php get_footer(); ?>