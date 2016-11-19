<?php
global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) { return; }
?>

<div class="kopa-pagination clearfix">
  <?php 
  the_posts_pagination( array(
      'prev_text' => '',
      'next_text' => ''
  ) ); 
  ?>
</div>
