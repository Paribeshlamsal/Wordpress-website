<?php
/**
 * Custom Functions
 * @package Omega Online Store
 * @since 1.0.0
 */

if( !function_exists('omega_online_store_site_logo') ):

    /**
     * Logo & Description
     */
    /**
     * Displays the site logo, either text or image.
     *
     * @param array $omega_online_store_args Arguments for displaying the site logo either as an image or text.
     * @param boolean $omega_online_store_echo Echo or return the HTML.
     *
     * @return string $omega_online_store_html Compiled HTML based on our arguments.
     */
    function omega_online_store_site_logo( $omega_online_store_args = array(), $omega_online_store_echo = true ){
        $omega_online_store_logo = get_custom_logo();
        $omega_online_store_site_title = get_bloginfo('name');
        $omega_online_store_contents = '';
        $omega_online_store_classname = '';
        $omega_online_store_defaults = array(
            'logo' => '%1$s<span class="screen-reader-text">%2$s</span>',
            'logo_class' => 'site-logo site-branding',
            'title' => '<a href="%1$s" class="custom-logo-name">%2$s</a>',
            'title_class' => 'site-title',
            'home_wrap' => '<h1 class="%1$s">%2$s</h1>',
            'single_wrap' => '<div class="%1$s">%2$s</div>',
            'condition' => (is_front_page() || is_home()) && !is_page(),
        );
        $omega_online_store_args = wp_parse_args($omega_online_store_args, $omega_online_store_defaults);
        /**
         * Filters the arguments for `omega_online_store_site_logo()`.
         *
         * @param array $omega_online_store_args Parsed arguments.
         * @param array $omega_online_store_defaults Function's default arguments.
         */
        $omega_online_store_args = apply_filters('omega_online_store_site_logo_args', $omega_online_store_args, $omega_online_store_defaults);
        if ( has_custom_logo() ) {
            $omega_online_store_contents = sprintf($omega_online_store_args['logo'], $omega_online_store_logo, esc_html($omega_online_store_site_title));
            $omega_online_store_contents .= sprintf($omega_online_store_args['title'], esc_url( get_home_url(null, '/') ), esc_html($omega_online_store_site_title));
            $omega_online_store_classname = $omega_online_store_args['logo_class'];
        } else {
            $omega_online_store_contents = sprintf($omega_online_store_args['title'], esc_url( get_home_url(null, '/') ), esc_html($omega_online_store_site_title));
            $omega_online_store_classname = $omega_online_store_args['title_class'];
        }
        $omega_online_store_wrap = $omega_online_store_args['condition'] ? 'home_wrap' : 'single_wrap';
        // $omega_online_store_wrap = 'home_wrap';
        $omega_online_store_html = sprintf($omega_online_store_args[$omega_online_store_wrap], $omega_online_store_classname, $omega_online_store_contents);
        /**
         * Filters the arguments for `omega_online_store_site_logo()`.
         *
         * @param string $omega_online_store_html Compiled html based on our arguments.
         * @param array $omega_online_store_args Parsed arguments.
         * @param string $omega_online_store_classname Class name based on current view, home or single.
         * @param string $omega_online_store_contents HTML for site title or logo.
         */
        $omega_online_store_html = apply_filters('omega_online_store_site_logo', $omega_online_store_html, $omega_online_store_args, $omega_online_store_classname, $omega_online_store_contents);
        if (!$omega_online_store_echo) {
            return $omega_online_store_html;
        }
        echo $omega_online_store_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }

endif;

if( !function_exists('omega_online_store_site_description') ):

    /**
     * Displays the site description.
     *
     * @param boolean $omega_online_store_echo Echo or return the html.
     *
     * @return string $omega_online_store_html The HTML to display.
     */
    function omega_online_store_site_description($omega_online_store_echo = true){

        if ( get_theme_mod('omega_online_store_display_header_text', false) == true ) :
        $omega_online_store_description = get_bloginfo('description');
        if (!$omega_online_store_description) {
            return;
        }
        $omega_online_store_wrapper = '<div class="site-description"><span>%s</span></div><!-- .site-description -->';
        $omega_online_store_html = sprintf($omega_online_store_wrapper, esc_html($omega_online_store_description));
        /**
         * Filters the html for the site description.
         *
         * @param string $omega_online_store_html The HTML to display.
         * @param string $omega_online_store_description Site description via `bloginfo()`.
         * @param string $omega_online_store_wrapper The format used in case you want to reuse it in a `sprintf()`.
         * @since 1.0.0
         *
         */
        $omega_online_store_html = apply_filters('omega_online_store_site_description', $omega_online_store_html, $omega_online_store_description, $omega_online_store_wrapper);
        if (!$omega_online_store_echo) {
            return $omega_online_store_html;
        }
        echo $omega_online_store_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
    }

endif;

if( !function_exists('omega_online_store_posted_on') ):

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function omega_online_store_posted_on( $omega_online_store_icon = true, $omega_online_store_animation_class = '' ){

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_post_date = absint( get_theme_mod( 'omega_online_store_post_date',$omega_online_store_default['omega_online_store_post_date'] ) );

        if( $omega_online_store_post_date ){

            $omega_online_store_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $omega_online_store_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $omega_online_store_time_string = sprintf($omega_online_store_time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date()),
                esc_attr(get_the_modified_date(DATE_W3C)),
                esc_html(get_the_modified_date())
            );

            $omega_online_store_year = get_the_date('Y');
            $omega_online_store_month = get_the_date('m');
            $omega_online_store_day = get_the_date('d');
            $omega_online_store_link = get_day_link($omega_online_store_year, $omega_online_store_month, $omega_online_store_day);

            $omega_online_store_posted_on = '<a href="' . esc_url($omega_online_store_link) . '" rel="bookmark">' . $omega_online_store_time_string . '</a>';

            echo '<div class="entry-meta-item entry-meta-date">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $omega_online_store_animation_class ).'">';

            if( $omega_online_store_icon ){

                echo '<span class="entry-meta-icon calendar-icon"> ';
                omega_online_store_the_theme_svg('calendar');
                echo '</span>';

            }

            echo '<span class="posted-on">' . $omega_online_store_posted_on . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;

if( !function_exists('omega_online_store_posted_by') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function omega_online_store_posted_by( $omega_online_store_icon = true, $omega_online_store_animation_class = '' ){   

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_post_author = absint( get_theme_mod( 'omega_online_store_post_author',$omega_online_store_default['omega_online_store_post_author'] ) );

        if( $omega_online_store_post_author ){

            echo '<div class="entry-meta-item entry-meta-author">';
            echo '<div class="entry-meta-wrapper '.esc_attr( $omega_online_store_animation_class ).'">';

            if( $omega_online_store_icon ){
            
                echo '<span class="entry-meta-icon author-icon"> ';
                omega_online_store_the_theme_svg('user');
                echo '</span>';
                
            }

            $omega_online_store_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';
            echo '<span class="byline"> ' . $omega_online_store_byline . '</span>'; // WPCS: XSS OK.
            echo '</div>';
            echo '</div>';

        }

    }

endif;


if( !function_exists('omega_online_store_posted_by_avatar') ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function omega_online_store_posted_by_avatar( $omega_online_store_date = false ){

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_post_author = absint( get_theme_mod( 'omega_online_store_post_author',$omega_online_store_default['omega_online_store_post_author'] ) );

        if( $omega_online_store_post_author ){



            echo '<div class="entry-meta-left">';
            echo '<div class="entry-meta-item entry-meta-avatar">';
            echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) );
            echo '</div>';
            echo '</div>';

            echo '<div class="entry-meta-right">';

            $omega_online_store_byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '">' . esc_html(get_the_author()) . '</a></span>';

            echo '<div class="entry-meta-item entry-meta-byline"> ' . $omega_online_store_byline . '</div>';

            if( $omega_online_store_date ){
                omega_online_store_posted_on($omega_online_store_icon = false);
            }
            echo '</div>';

        }

    }

endif;

if( !function_exists('omega_online_store_entry_footer') ):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function omega_online_store_entry_footer( $omega_online_store_cats = true, $omega_online_store_tags = true, $omega_online_store_edits = true){   

        $omega_online_store_default = omega_online_store_get_default_theme_options();
        $omega_online_store_post_category = absint( get_theme_mod( 'omega_online_store_post_category',$omega_online_store_default['omega_online_store_post_category'] ) );
        $omega_online_store_post_tags = absint( get_theme_mod( 'omega_online_store_post_tags',$omega_online_store_default['omega_online_store_post_tags'] ) );

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            if( $omega_online_store_cats && $omega_online_store_post_category ){

                /* translators: used between list items, there is a space after the comma */
                $omega_online_store_categories = get_the_category();
                if ($omega_online_store_categories) {
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';
                
                    /* translators: 1: list of categories. */
                    echo '<span class="cat-links">';
                    foreach( $omega_online_store_categories as $omega_online_store_category ){

                        $omega_online_store_cat_name = $omega_online_store_category->name;
                        $omega_online_store_cat_slug = $omega_online_store_category->slug;
                        $omega_online_store_cat_url = get_category_link( $omega_online_store_category->term_id );
                        ?>

                        <a class="twp_cat_<?php echo esc_attr( $omega_online_store_cat_slug ); ?>" href="<?php echo esc_url( $omega_online_store_cat_url ); ?>" rel="category tag"><?php echo esc_html( $omega_online_store_cat_name ); ?></a>

                    <?php }
                    echo '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';
                }

            }

            if( $omega_online_store_tags && $omega_online_store_post_tags ){
                /* translators: used between list items, there is a space after the comma */
                $omega_online_store_tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'omega-online-store'));
                if( $omega_online_store_tags_list ){

                    echo '<div class="entry-meta-item entry-meta-tags">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of tags. */
                    echo '<span class="tags-links">';
                    echo wp_kses_post($omega_online_store_tags_list) . '</span>'; // WPCS: XSS OK.
                    echo '</div>';
                    echo '</div>';

                }

            }

            if( $omega_online_store_edits ){

                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'omega-online-store'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }

        }
    }

endif;

if ( !function_exists('omega_online_store_post_thumbnail') ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views. If no post thumbnail is available, a default image is used.
     */
    function omega_online_store_post_thumbnail($image_size = 'full'){

        if( post_password_required() || is_attachment() ){ return; }

        // Set the URL for your default image here (e.g. from your theme directory)
        $omega_online_store_default_image = get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/Crashas-Shopify-Product-Title-1.png'; // Update this path accordingly

        if ( is_singular() ) : ?>
                <?php the_post_thumbnail(); ?>
        <?php else : ?>

            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php

                $omega_online_store_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                $omega_online_store_featured_image = isset($omega_online_store_featured_image[0]) ? $omega_online_store_featured_image[0] : '';

                // Check if there's a featured image
                if ($omega_online_store_featured_image != '' ) {
                    // Display the featured image
                    the_post_thumbnail($image_size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                } else {
                    // No featured image, display the default image
                    echo '<img src="' . esc_url($omega_online_store_default_image) . '" alt="' . the_title_attribute(array('echo' => false)) . '" />';
                }
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

if( !function_exists('omega_online_store_is_comment_by_post_author') ):

    /**
     * Comments
     */
    /**
     * Check if the specified comment is written by the author of the post commented on.
     *
     * @param object $omega_online_store_comment Comment data.
     *
     * @return bool
     */
    function omega_online_store_is_comment_by_post_author($omega_online_store_comment = null){

        if (is_object($omega_online_store_comment) && $omega_online_store_comment->user_id > 0) {
            $omega_online_store_user = get_userdata($omega_online_store_comment->user_id);
            $post = get_post($omega_online_store_comment->comment_post_ID);
            if (!empty($omega_online_store_user) && !empty($post)) {
                return $omega_online_store_comment->user_id === $post->post_author;
            }
        }
        return false;
    }

endif;

if( !function_exists('omega_online_store_breadcrumb') ) :

    /**
     * Omega Online Store Breadcrumb
     */
    function omega_online_store_breadcrumb($omega_online_store_comment = null){

        echo '<div class="entry-breadcrumb">';
        omega_online_store_breadcrumb_trail();
        echo '</div>';

    }

endif;