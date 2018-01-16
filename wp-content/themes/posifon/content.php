<div class="post card" id="post-<?php the_ID(); ?>">
  <span class="date"><?php the_date() ?></span>
  <h4 id="<?php echo sanitize_title_with_dashes($the_title = get_the_title()); ?>"><?php echo '<a href="'. get_permalink($post->ID) . '">'. $the_title; ?></a></h4>
  <?php the_excerpt(); ?>
</div>