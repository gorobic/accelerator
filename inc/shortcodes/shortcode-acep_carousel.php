<div class="acep-carousel-wrap p-4 p-md-5 p-lg-6">

    <?php  //echo (!empty($heading))? '<h2>'.$heading.'<h2>': ''; ?>

    <?php if($items) { ?>
        <div class="acep-carousel">
            <?php  foreach ($items as $item) {
                $href = vc_build_link( $item['acep_carousel_items_link'] ); ?>
                
                <a class="acep-carousel__item text-center lazy text-light text-decoration-none d-flex justify-content-center align-items-center"
                    <?php if($href['url']){ ?>href="<?php echo $href['url']; ?>"<?php } ?> 
                    <?php if($href['target']){ ?>target="_blank"<?php } ?>
                    <?php if($href['rel']){ ?>rel="nofollow noindex"<?php } ?>
                    <?php if($href['title']){ ?>title="<?php echo $href['title']; ?>"<?php } ?>
                    <?php if($item['acep_carousel_items_img']){ ?> data-src="<?php echo wp_get_attachment_image_src($item['acep_carousel_items_img'], 'full')['0']; ?>"<?php } ?>
                >
                    <div class="px-3 px-md-6 px-lg-7 py-6 py-lg-7">
                        <div class="h1">
                            <?php echo $item['acep_carousel_items_title']; ?>
                        </div>
                        <div class="acep-carousel__item-content">
                            <?php echo $item['acep_carousel_items_description']; ?>
                        </div>
                        <?php if($href['url']){ ?>
                            <div class="mt-3">
                                <span class="btn btn-outline-light rounded-0 px-md-4">
                                <?php echo ($href['title']) ? $href['title'] : __('Read more' ,'acep') ?>
                                </span>
                            </div>    
                        <?php } ?> 
                    </div>
                </a>
                
            <?php } ?>
        </div>
    <?php } ?>

</div>