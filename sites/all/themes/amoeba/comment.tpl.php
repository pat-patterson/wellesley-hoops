<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status ?> <?php print $zebra ?> clearfix">
  
  <?php print $picture; ?>

  <div class="comment-body">

  <?php if ($new): ?>
    <div class="new"><?php print $new; ?></div>
  <?php endif; ?>


  <div class="comment-content">

  <div class="submitted">
    <?php print $created; ?> by <?php print $author ?>
  </div>

  <div <?php print $content_attributes; ?>>
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['links']);
      print render($content);
      ?><?php print $permalink; ?>
      <?php if ($signature): ?>
        <div class="user-signature">
          <?php print $signature ?>
        </div>
      <?php endif; ?>
  </div>

  <?php print render($content['links']) ?>
  
  </div>
  
  </div>

</div> 

