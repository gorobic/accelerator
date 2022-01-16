<?php $person_id = sanitize_title($atts['acc_person_name']); ?>
<div class="col acc-person">
    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#<?php echo $person_id; ?>">
        <div class="lazy ratio ratio-1x1 bg-cover bg-dark bg-opacity-10 featured-image" data-src="<?php echo wp_get_attachment_image_src($atts['acc_person_img'], 'full')['0']; ?>">
            <div>
                <div class="arrow">
                    <span class="accicon-arrow-right"></span>
                </div>
            </div>
        </div>
        <header class="entry-header mt-3">
            <h2 class="title fs-5 fw-normal">
                <?php echo $atts['acc_person_name']; ?>
            </h2>
            <h5 class="title fs-6 fw-normal">
                <?php echo $atts['acc_person_title']; ?>
            </h5>
        </header>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="<?php echo $person_id; ?>" tabindex="-1" aria-labelledby="<?php echo $person_id; ?>-label" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <div class="modal-title h5 fw-normal" id="<?php echo $person_id; ?>-label"><?php echo $atts['acc_person_name']; ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="lazy ratio ratio-1x1 bg-cover bg-dark bg-opacity-10" data-src="<?php echo wp_get_attachment_image_src($atts['acc_person_img'], 'full')['0']; ?>"></div>
                    <div class="p-3">
                        <header class="entry-header">
                            <div class="title fs-5 mb-2 fw-normal">
                                <?php echo $atts['acc_person_title']; ?>
                            </div>
                        </header>
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>