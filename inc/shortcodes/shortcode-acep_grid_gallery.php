<div class="acep-grid-gallery-wrap wpb_content_element">

    <?php  //echo (!empty($heading))? '<h2>'.$heading.'<h2>': ''; ?>

    <?php if($image_ids) { 
        $unique_id = rand(); 
        $img_min_width = 2 >= count($image_ids) ? 1 : $atts['acep_grid_gallery_img_min_width']; ?>
        <div class="acep-grid-gallery">
            <?php  foreach ($image_ids as $image_id) { 
                $full_img_data = wp_get_attachment_image_src($image_id, 'full'); 
                $img_aspect_ratio = $full_img_data['1'] / $full_img_data['2']; ?>
                
                <a class="acep-grid-gallery__item text-light text-decoration-none"
                    data-fancybox="acep-grid-gallery-<?php echo $unique_id; ?>"
                    href="<?php echo $full_img_data['0']; ?>"
                    data-caption="<?php echo $img_caption = wp_get_attachment_caption($image_id); ?>"
                    style="
                        flex-grow: <?php echo $img_aspect_ratio; ?>;
                        min-width: <?php echo $img_min_width * $img_aspect_ratio . 'px'; ?>
                        ";
                    >
                    <img class="lazy" data-src="<?php echo wp_get_attachment_image_src($image_id, 'large')['0']; ?>" alt="<?php echo $img_caption; ?>">
                </a>
                
            <?php } ?>
        </div>
    <?php } ?>

</div>