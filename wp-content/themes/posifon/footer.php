</div> <!-- end "site" -->
<footer id="page-footer">
  <div class="wrap960">
    <div class="widget-area">
      <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area-1')) : else : ?>
        <p>Fyll i widget "Footer Widget Area 1"</p>
      <?php endif; ?>
    </div>
    <div class="widget-area">
      <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area-2')) : else : ?>
        <p>Fyll i widget "Footer Widget Area 2"</p>
      <?php endif; ?>
    </div>
    <div class="widget-area">
      <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area-3')) : else : ?>
        <p>Fyll i widget "Footer Widget Area 3"</p>
      <?php endif; ?>
    </div>
    <div id="copyright">
      <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area-4')) : else : ?>
        <p>Fyll i widget "Footer Widget Area 4"</p>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
  </body>
  </html>