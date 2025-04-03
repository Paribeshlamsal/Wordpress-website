<?php
/**
 * Custom Functions.
 *
 * @package Omega Online Store
 */

if( !function_exists( 'omega_online_store_fonts_url' ) ) :

    //Google Fonts URL
    function omega_online_store_fonts_url(){

        $omega_online_store_font_families = array(
            'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        );

        $omega_online_store_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $omega_online_store_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($omega_online_store_fonts_url);

    }

endif;

if ( ! function_exists( 'omega_online_store_sub_menu_toggle_button' ) ) :

    function omega_online_store_sub_menu_toggle_button( $omega_online_store_args, $omega_online_store_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $omega_online_store_args->theme_location == 'omega-online-store-primary-menu' && isset( $omega_online_store_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $omega_online_store_args->before = '<div class="submenu-wrapper">';
            $omega_online_store_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $omega_online_store_item->classes ) ) {

                $omega_online_store_toggle_target_string = '.menu-item.menu-item-' . $omega_online_store_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $omega_online_store_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $omega_online_store_toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'omega-online-store' ) . '</span>' . omega_online_store_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $omega_online_store_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $omega_online_store_args->theme_location == 'omega-online-store-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $omega_online_store_item->classes ) ) {

                $omega_online_store_args->before = '<div class="link-icon-wrapper">';
                $omega_online_store_args->after  = omega_online_store_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $omega_online_store_args->before = '';
                $omega_online_store_args->after  = '';

            }

        }

        return $omega_online_store_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'omega_online_store_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'omega_online_store_the_theme_svg' ) ):
    
    function omega_online_store_the_theme_svg( $omega_online_store_svg_name, $omega_online_store_return = false ) {

        if( $omega_online_store_return ){

            return omega_online_store_get_theme_svg( $omega_online_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_online_store_get_theme_svg();.

        }else{

            echo omega_online_store_get_theme_svg( $omega_online_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_online_store_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'omega_online_store_get_theme_svg' ) ):

    function omega_online_store_get_theme_svg( $omega_online_store_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_online_store_svg = wp_kses(
            Omega_Online_Store_SVG_Icons::get_svg( $omega_online_store_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $omega_online_store_svg ) {
            return false;
        }
        return $omega_online_store_svg;

    }

endif;

if( !function_exists( 'omega_online_store_post_category_list' ) ) :

    // Post Category List.
    function omega_online_store_post_category_list( $omega_online_store_select_cat = true ){

        $omega_online_store_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $omega_online_store_post_cat_cat_array = array();
        if( $omega_online_store_select_cat ){

            $omega_online_store_post_cat_cat_array[''] = esc_html__( '-- Select Category --','omega-online-store' );

        }

        foreach ( $omega_online_store_post_cat_lists as $omega_online_store_post_cat_list ) {

            $omega_online_store_post_cat_cat_array[$omega_online_store_post_cat_list->slug] = $omega_online_store_post_cat_list->name;

        }

        return $omega_online_store_post_cat_cat_array;
    }

endif;

if( !function_exists('omega_online_store_single_post_navigation') ):

    function omega_online_store_single_post_navigation(){

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $omega_online_store_current_id = '';
        $omega_online_store_article_wrap_class = '';
        global $post;
        $omega_online_store_current_id = $post->ID;
        if( $omega_online_store_twp_navigation_type == '' || $omega_online_store_twp_navigation_type == 'global-layout' ){
            $omega_online_store_twp_navigation_type = get_theme_mod('omega_online_store_twp_navigation_type', $omega_online_store_default['omega_online_store_twp_navigation_type']);
        }

        if( $omega_online_store_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $omega_online_store_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . omega_online_store_the_theme_svg('arrow-left',$omega_online_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'omega-online-store') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . omega_online_store_the_theme_svg('arrow-right',$omega_online_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'omega-online-store') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $omega_online_store_next_post = get_next_post();
                if( isset( $omega_online_store_next_post->ID ) ){

                    $omega_online_store_next_post_id = $omega_online_store_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $omega_online_store_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'omega_online_store_navigation_action','omega_online_store_single_post_navigation',30 );

if( !function_exists('omega_online_store_content_offcanvas') ):

    // Offcanvas Contents
    function omega_online_store_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'omega-online-store'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'omega-online-store'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('omega-online-store-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'omega-online-store-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Omega_Online_Store_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'omega_online_store_before_footer_content_action','omega_online_store_content_offcanvas',30 );

if( !function_exists('omega_online_store_footer_content_widget') ):

    function omega_online_store_footer_content_widget(){
        
        $omega_online_store_default = omega_online_store_get_default_theme_options();
        
        $omega_online_store_footer_column_layout = absint(get_theme_mod('omega_online_store_footer_column_layout', $omega_online_store_default['omega_online_store_footer_column_layout']));
        $omega_online_store_footer_sidebar_class = 12;
        
        if($omega_online_store_footer_column_layout == 2) {
            $omega_online_store_footer_sidebar_class = 6;
        }
        
        if($omega_online_store_footer_column_layout == 3) {
            $omega_online_store_footer_sidebar_class = 4;
        }
        ?>
        
        <?php if ( get_theme_mod('omega_online_store_display_footer', true) == true ) : ?>
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">
                    
                        <?php for ($i = 0; $i < $omega_online_store_footer_column_layout; $i++) : ?>
                            
                            <div class="column <?php echo 'column-' . absint($omega_online_store_footer_sidebar_class); ?> column-sm-12">
                                
                                <?php 
                                // If no widgets are assigned, display default widgets
                                if ( ! is_active_sidebar( 'omega-online-store-footer-widget-' . $i ) ) : 

                                    if ($i === 0) : ?>
                                        <div id="media_image-3" class="widget widget_media_image">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr__( 'Footer Image', 'omega-online-store' ); ?>" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div id="text-3" class="widget widget_text">
                                            <div class="textwidget">
                                                <p class="widget_text">
                                                    <?php esc_html_e('Omega Online Store is a versatile and user-friendly WordPress theme designed to empower your e-commerce journey. This theme is a game-changer for businesses seeking a visually appealing and seamlessly functional online store. Boasting a clean and modern design, Omega ensures your products take center stage, creating an immersive shopping experience for your customers.', 'omega-online-store'); ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php elseif ($i === 1) : ?>
                                        <div id="pages-2" class="widget widget_pages">
                                            <h2 class="widget-title"><?php esc_html_e('Calendar', 'omega-online-store'); ?></h2>
                                            <?php get_calendar(); ?>
                                        </div>

                                    <?php elseif ($i === 2) : ?>
                                        <div id="search-2" class="widget widget_search">
                                            <h2 class="widget-title"><?php esc_html_e('Enter Keywords Here', 'omega-online-store'); ?></h2>
                                            <?php get_search_form(); ?>
                                        </div>
                                    <?php endif; 
                                    
                                else :
                                    // Display dynamic sidebar widget if assigned
                                    dynamic_sidebar('omega-online-store-footer-widget-' . $i);
                                endif;
                                ?>
                                
                            </div>
                            
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?> 

    <?php
    }

endif;

add_action( 'omega_online_store_footer_content_action', 'omega_online_store_footer_content_widget', 10 );

if( !function_exists('omega_online_store_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function omega_online_store_footer_content_info(){

        $omega_online_store_default = omega_online_store_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $omega_online_store_footer_copyright_text = wp_kses_post( get_theme_mod( 'omega_online_store_footer_copyright_text', $omega_online_store_default['omega_online_store_footer_copyright_text'] ) );
                                    echo esc_html( $omega_online_store_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'omega-online-store') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-store-wordpress-theme') . '" title="' . esc_attr__('Omega Online Store', 'omega-online-store') . '" target="_blank"><span>' . esc_html__('Omega Online Store', 'omega-online-store') . '</span></a>' . esc_html__(' By ', 'omega-online-store') . '  <span>' . esc_html__('OMEGA ', 'omega-online-store') . '</span>';
                                    echo esc_html__('Powered by ', 'omega-online-store') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'omega-online-store') . '" target="_blank"><span>' . esc_html__('WordPress.', 'omega-online-store') . '</span></a>';
                                 ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('omega_online_store_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $omega_online_store_to_the_top_text = get_theme_mod( 'omega_online_store_to_the_top_text', __( 'To the Top', 'omega-online-store' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $omega_online_store_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

endif;

add_action( 'omega_online_store_footer_content_action','omega_online_store_footer_content_info',20 );


if( !function_exists( 'omega_online_store_main_slider' ) ) :

    function omega_online_store_main_slider(){

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_header_banner = get_theme_mod( 'omega_online_store_header_banner', $omega_online_store_default['omega_online_store_header_banner'] );
        $omega_online_store_header_banner_cat = get_theme_mod( 'omega_online_store_header_banner_cat' );

        if( $omega_online_store_header_banner ){

            $omega_online_store_rtl = '';
            if( is_rtl() ){
                $omega_online_store_rtl = 'dir="rtl"';
            }
            $omega_online_store_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $omega_online_store_header_banner_cat ) ) );
            if( $omega_online_store_banner_query->have_posts() ): ?>
            <div class="wrapper">
                <div class="theme-custom-block theme-banner-block">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $omega_online_store_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $omega_online_store_banner_query->have_posts() ):
                            $omega_online_store_banner_query->the_post();
                            $omega_online_store_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            $omega_online_store_default_image = get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/slider-img1.png'; // Replace with the actual path to your default image  
                            $omega_online_store_featured_image = isset( $omega_online_store_featured_image[0] ) ? $omega_online_store_featured_image[0] : $omega_online_store_default_image;?>
                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($omega_online_store_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php omega_online_store_post_format_icon(); ?>
                                        </div>
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>
                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                        the_excerpt();

                                                    } else {

                                                        echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                    <?php echo esc_html__('Shop Collections', 'omega-online-store'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
            endif;
        }
    }
endif;

if( !function_exists( 'omega_online_store_product_section' ) ) :

    function omega_online_store_product_section(){ 

        $omega_online_store_default = omega_online_store_get_default_theme_options();

        $omega_online_store_product_section_title = esc_html( get_theme_mod( 'omega_online_store_product_section_title',
        $omega_online_store_default['omega_online_store_product_section_title'] ) );

        $omega_online_store_product_section_button_title = esc_html( get_theme_mod( 'omega_online_store_product_section_button_title',
        $omega_online_store_default['omega_online_store_product_section_button_title'] ) );

        $omega_online_store_product_section_button_url = esc_html( get_theme_mod( 'omega_online_store_product_section_button_url',
        $omega_online_store_default['omega_online_store_product_section_button_url'] ) );

        $omega_online_store_product_enable_wishlist = esc_html( get_theme_mod( 'omega_online_store_product_enable_wishlist',
        $omega_online_store_default['omega_online_store_product_enable_wishlist'] ) );

        $omega_online_store_catData = get_theme_mod('omega_online_store_featured_product_category','');
        if ( class_exists( 'WooCommerce' ) ) {
            $omega_online_store_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $omega_online_store_catData,
                'order' => 'ASC'
            ); ?>

            <div class="theme-product-block">
                <div class="wrapper">
                    <div class="wrapper header-wrapper">
                        <?php if( $omega_online_store_product_section_title ){ ?>
                            <h3><?php echo esc_html( $omega_online_store_product_section_title ); ?></h3>
                        <?php } ?>
                        <?php if( $omega_online_store_product_section_button_title ){ ?>
                            <div class="">
                                <a href="<?php echo esc_url( $omega_online_store_product_section_button_url ); ?>" class="btn-fancy btn-fancy-primary" tabindex="0"><?php echo esc_html( $omega_online_store_product_section_button_title ); ?></a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="product-image">
                        <?php $loop = new WP_Query( $omega_online_store_args );
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="grid-items">
                                <figure>
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                                </figure>
                                <div class="shop-box">
                                    <span class="shop-cat">
                                        <?php $categories = get_the_term_list( $product->get_id(), 'product_cat');
                                        if ( $categories ) {
                                            echo wp_kses_post( $categories );
                                        } ?>
                                    </span>
                                    <?php if( $omega_online_store_product_enable_wishlist ){ ?>
                                    <span class="wish-list">
                                        <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
                                        
                                    </span>
                                    <?php } ?>
                                </div>
                                <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></div>
                                <div class="product-cart">
                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
    <?php }

endif;


if (!function_exists('omega_online_store_post_format_icon')):

    // Post Format Icon.
    function omega_online_store_post_format_icon() {

        $omega_online_store_format = get_post_format(get_the_ID()) ?: 'standard';
        $omega_online_store_icon = '';
        $omega_online_store_title = '';
        if( $omega_online_store_format == 'video' ){
            $omega_online_store_icon = omega_online_store_get_theme_svg( 'video' );
            $omega_online_store_title = esc_html__('Video','omega-online-store');
        }elseif( $omega_online_store_format == 'audio' ){
            $omega_online_store_icon = omega_online_store_get_theme_svg( 'audio' );
            $omega_online_store_title = esc_html__('Audio','omega-online-store');
        }elseif( $omega_online_store_format == 'gallery' ){
            $omega_online_store_icon = omega_online_store_get_theme_svg( 'gallery' );
            $omega_online_store_title = esc_html__('Gallery','omega-online-store');
        }elseif( $omega_online_store_format == 'quote' ){
            $omega_online_store_icon = omega_online_store_get_theme_svg( 'quote' );
            $omega_online_store_title = esc_html__('Quote','omega-online-store');
        }elseif( $omega_online_store_format == 'image' ){
            $omega_online_store_icon = omega_online_store_get_theme_svg( 'image' );
            $omega_online_store_title = esc_html__('Image','omega-online-store');
        }
        
        if (!empty($omega_online_store_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo omega_online_store_svg_escape($omega_online_store_icon); ?></span>
                <?php if( $omega_online_store_title ){ echo '<span class="post-format-label">'.esc_html( $omega_online_store_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'omega_online_store_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $omega_online_store_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function omega_online_store_svg_escape( $omega_online_store_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_online_store_svg = wp_kses(
            $omega_online_store_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $omega_online_store_svg ) {
            return false;
        }

        return $omega_online_store_svg;

    }

endif;

if( !function_exists( 'omega_online_store_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_online_store_sanitize_sidebar_option_meta( $omega_online_store_input ){

        $omega_online_store_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $omega_online_store_input,$omega_online_store_metabox_options ) ){

            return $omega_online_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_online_store_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_online_store_sanitize_pagination_meta( $omega_online_store_input ){

        $omega_online_store_metabox_options = array( 'Center','Right','Left');
        if( in_array( $omega_online_store_input,$omega_online_store_metabox_options ) ){

            return $omega_online_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_online_store_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function omega_online_store_sanitize_menu_transform( $omega_online_store_input ){

        $omega_online_store_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $omega_online_store_input,$omega_online_store_metabox_options ) ){

            return $omega_online_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_online_store_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function omega_online_store_sanitize_page_content_alignment( $omega_online_store_input ){

        $omega_online_store_metabox_options = array( 'left','center','right');
        if( in_array( $omega_online_store_input,$omega_online_store_metabox_options ) ){

            return $omega_online_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_online_store_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function omega_online_store_sanitize_footer_widget_title_alignment( $omega_online_store_input ){

        $omega_online_store_metabox_options = array( 'left','center','right');
        if( in_array( $omega_online_store_input,$omega_online_store_metabox_options ) ){

            return $omega_online_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_online_store_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $omega_online_store_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function omega_online_store_sanitize_pagination_type( $omega_online_store_input ) {
        // Define valid options for the pagination type.
        $omega_online_store_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $omega_online_store_input, $omega_online_store_valid_options, true ) ) {
            return $omega_online_store_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('omega_online_store_sanitize_enable_pagination') ) :
    function omega_online_store_sanitize_enable_pagination( $omega_online_store_input ) {
        return (bool) $omega_online_store_input;
    }
endif;