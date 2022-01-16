<?php $columns = intval($atts['acc_persons_number']); ?>
<div class="row gy-4 row-cols-2 row-cols-md-3 row-cols-lg-<?php echo ($columns > 0 && $columns <= 12) ? $columns : 6; ?> <?php echo $atts['el_class']; ?>">
    <?php echo do_shortcode($content); ?>
</div>