<?php $columns = intval($atts['acep_persons_number']); ?>
<div class="overflow-hidden">
    <div class="row gy-4 row-cols-2 row-cols-lg-<?php echo ($columns > 0 && $columns <= 12) ? $columns : 6; ?> <?php echo $atts['el_class']; ?>">
        <?php echo do_shortcode($content); ?>
    </div>
</div>