<?php get_header(); ?>

<!-- Început de Loop. -->
<?php if ( have_posts() ) { 
    while ( have_posts() ) { the_post(); ?>
        <article <?php post_class(); ?> id="page-<?php the_ID(); ?>">
            <div class="entry">
                <?php the_content(); ?>
            </div>
        </article>
<? } 
}else{ 
?>

<p>
    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
</p>

<?php } ?>

<?php get_footer(); ?>