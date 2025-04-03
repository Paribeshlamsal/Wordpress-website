<?php
/**
 * The default template for displaying content
 * @package Omega Online Store
 * @since 1.0.0
 */

$omega_online_store_default = omega_online_store_get_default_theme_options();
$omega_online_store_image_size = 'large';
global $omega_online_store_archive_first_class; 
$omega_online_store_archive_classes = [
    'theme-article-post',
    'theme-article-animate',
    $omega_online_store_archive_first_class
];?>

<article id="post-<?php the_ID(); ?>" <?php post_class($omega_online_store_archive_classes); ?>>
    <div class="theme-article-image">
        <?php if ( get_theme_mod('omega_online_store_display_archive_post_image', true) == true ) : ?>
            <div class="entry-thumbnail">
                <?php
                if ( is_search() || is_archive() || is_front_page() ) {
                    // Check if the post has a featured image
                    if ( has_post_thumbnail() ) {
                        $omega_online_store_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $omega_online_store_featured_image = isset($omega_online_store_featured_image[0]) ? $omega_online_store_featured_image[0] : '';
                        ?>
                        <div class="post-thumbnail data-bg data-bg-big"
                             data-background="<?php echo esc_url($omega_online_store_featured_image); ?>">
                            <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                        </div>
                        <?php
                    } else {
                        // No featured image, show the default image
                        echo '<div class="post-thumbnail data-bg data-bg-big" data-background="' . esc_url(get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/Crashas-Shopify-Product-Title-1.png') . '">';
                        echo '<a href="' . esc_url(get_permalink()) . '" class="theme-image-responsive" tabindex="0"></a>';
                        echo '</div>';
                    }
                } else {
                    omega_online_store_post_thumbnail($omega_online_store_image_size);
                }
                if ( get_theme_mod('omega_online_store_display_archive_post_format_icon', true) == true ) :
                    omega_online_store_post_format_icon();
                endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="theme-article-details">
        <?php if ( get_theme_mod('omega_online_store_display_archive_post_category', true) == true ) : ?>  
            <div class="entry-meta-top">
                <div class="entry-meta">
                    <?php omega_online_store_entry_footer($cats = true, $tags = false, $edits = false); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('omega_online_store_display_archive_post_title', true) == true ) : ?>
            <header class="entry-header">
                <h2 class="entry-title entry-title-medium">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <span><?php the_title(); ?></span>
                    </a>
                </h2>
            </header>
        <?php endif; ?>
        <?php if ( get_theme_mod('omega_online_store_display_archive_post_content', true) == true ) : ?>
            <div class="entry-content">

                <?php
                if (has_excerpt()) {

                    the_excerpt();

                } else {

                    echo '<p>';
                    echo esc_html(wp_trim_words(get_the_content(), get_theme_mod('omega_online_store_excerpt_limit', 10), '...'));
                    echo '</p>';
                }

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'omega-online-store'),
                    'after' => '</div>',
                )); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('omega_online_store_display_archive_post_button', true) == true ) : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" class="theme-btn-link">
            <span> <?php esc_html_e('Read More', 'omega-online-store'); ?> </span>
            <span class="topbar-info-icon"><?php omega_online_store_the_theme_svg('arrow-right-1'); ?></span>
            </a>
        <?php endif; ?>
    </div>
</article>