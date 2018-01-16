<?php 
// Previous/next page navigation.
the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Nästa:', 'posifon' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Nästa inlägg:', 'posifon' ) . '</span> ' .
        '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Föregående:', 'posifon' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Föregående inlägg:', 'posifon' ) . '</span> ' .
        '<span class="post-title">%title</span>',
) ); ?>