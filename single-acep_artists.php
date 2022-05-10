<?php get_header(); ?>

<!-- Început de Loop. -->
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
    <?php 
        $post_classes = "mb-5"; 
        if(get_the_post_thumbnail_url()){
            $post_classes .= " with-profile-picture";
        }
    ?>
    <article <?php post_class('mb-5'); ?> id="post-<?php the_ID(); ?>">

        <div>
            <div class="lazy ratio ratio-21x9 bg-cover bg-dark position-relative acep-artist-cover" data-src="<?php the_field('acep_artist_poster'); ?>">
                <?php if(get_field('acep_artist_poster')){ ?>
                    <div class="acep-artist-cover_overlay">
                        <?php 
                        $caption = "";
                        if(get_field('acep_artist_photo_credits_poster') || get_field('acep_artist_poster_title') || get_field('acep_artist_poster_desc')){
                            if(get_field('acep_artist_photo_credits_poster')){
                                $caption .= '<div>'. __('Photo credits','acep') . ' '. get_field('acep_artist_photo_credits_poster') . '</div>';
                            }
                            if(get_field('acep_artist_poster_title')){
                                $caption .= '<div>'. __('Title of art work','acep') . ': <strong>'. get_field('acep_artist_poster_title') . '</strong></div>';
                            }
                            if(get_field('acep_artist_poster_desc')){
                                $caption .= '<div>'. get_field('acep_artist_poster_desc') . '</div>';
                            }
                        ?>
                            <div class="acep-artist-tooltip p-2">
                                <span 
                                    data-bs-toggle="tooltip" 
                                    data-bs-html="true"
                                    title="
                                        <?php echo $caption; ?>
                                    ">
                                    <span class="acepicon-info"></span>
                                </span>
                            </div>
                        <?php } ?>
                        <a 
                        href="<?php the_field('acep_artist_poster'); ?>" 
                        class="stretched-link" 
                        data-fancybox="poster" 
                        data-caption="<?php echo $caption; unset($caption); ?>"
                        aria-label="<?php _e('View full poster','acep'); ?>
                        "></a>
                    </div>
                <?php } ?>
            </div>
            <?php if(get_the_post_thumbnail_url()){ ?>
                <div class="lazy ratio ratio-1x1 shadow bg-cover acep-artist-profile-picture" data-src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <div>
                        <?php 
                        $caption = "";
                        if(get_field('acep_artist_photo_credits_photo')){
                            $caption = __('Photo credits','acep') . ' '. get_field('acep_artist_photo_credits_photo');
                        ?>
                            <div class="acep-artist-tooltip p-2">
                                <span 
                                    data-bs-toggle="tooltip" 
                                    title="
                                        <?php echo $caption; ?>
                                    ">
                                    <span class="acepicon-info"></span>
                                </span>
                            </div>
                        <?php } ?>
                        <a 
                        href="<?php echo get_the_post_thumbnail_url(); ?>" 
                        data-fancybox="profile-picture" 
                        class="stretched-link"
                        data-caption="<?php echo $caption; unset($caption); ?>"
                        aria-label="<?php _e('View full profile picture','acep'); ?>"
                        ></a>
                    </div>
                </div>
            <?php } ?>
            <header class="entry-header my-4">
                <h1 class="title text-center">
                    <?php the_title(); ?>
                </h1>
            </header>
        </div>

        <div class="entry">
            <?php the_content(); ?>
        </div>

    </article>

<?php } }else{ 
?>

    <p>
        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
    </p>

<?php } ?>

<?php get_footer(); ?>