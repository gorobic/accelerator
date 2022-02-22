<article <?php post_class('mb-5'); ?> id="post-<?php the_ID(); ?>">

    <?php if(get_the_post_thumbnail_url()){ ?>
        <div class="lazy ratio ratio-16x9 bg-cover" data-src="<?php echo get_the_post_thumbnail_url(); ?>">

        </div>
    <?php } ?>

    <header class="entry-header mt-5">
        <h1 class="title text-center">
            <?php the_title(); ?>
        </h1>
    </header>

    <!-- Afișăm data (November 16th, 2009 format) -->
    <!-- și link spre alte postări ale autorului. -->

    <div class="text-capitalize text-center mb-5 mt-4">
        <?php 
        if (ICL_LANGUAGE_CODE == "en") {
            the_time('F d, Y');
        } else {
            the_time('d F Y');
        }
        ?>
    </div>



    <div class="entry">
        <?php the_content(); ?>
    </div>

</article>