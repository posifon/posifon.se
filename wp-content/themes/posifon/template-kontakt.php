<?php 

/***********
* Template Name: Kontakt
* Created by:
*                  User:    Fredrik Beckius
*                  Company: Posifon AB
*                  URL:     http://fredrikbeckius.se, http://posifon.se
*                  Date:    2015-07-31
******/

 get_header(); ?>
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
