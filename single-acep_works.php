<?php get_header(); ?>

<!-- Început de Loop. -->
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
    <article <?php post_class('mb-5'); ?> id="post-<?php the_ID(); ?>">
        <div class="row">
            <div class="col-lg-6 order-lg-last mt-5">
                <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="fancybox">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-100 h-auto']); ?>  
                </a>
            </div>
            <div class="col-lg-6 mt-5 d-flex align-items-center">
                <div>
                    <header class="entry-header">
                        <?php if(get_field('acep_work_author')){ ?>
                            <div class="fs-2">
                                <?php $i = 1; foreach(get_field('acep_work_author') as $author){ ?>
                                    <?php
                                    echo get_the_title($author); 
                                    echo ($i != count(get_field('acep_work_author'))) ? ', ' : '';
                                    ?>
                                <?php $i++; } ?>
                            </div>
                        <?php } ?>
                        <h1 class="title fs-4">
                            <?php the_title(); ?>
                        </h1>
                    </header>
                    <?php if(get_the_content()){ ?>
                        <div class="entry mt-4 text-muted">
                            <?php the_content(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </article>

<?php } }else{ 
?>

    <p>
        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
    </p>

<?php } ?>

<?php get_footer(); ?>