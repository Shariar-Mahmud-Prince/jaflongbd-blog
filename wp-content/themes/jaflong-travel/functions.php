<?php
/**
 * JaflongTravel Theme Functions & Secure Optimization Engine
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct file access for security
}

/**
 * Basic Theme Setup & Support hooks
 */
function jaflong_travel_setup() {
    // Enable dynamic Title tags supported by WordPress for perfect SEO
    add_theme_support( 'title-tag' );

    // Enable Featured Images (Post Thumbnails) for blog layout
    add_theme_support( 'post-thumbnails' );

    // Register primary navigation menus
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary Header Menu', 'jaflong-travel' ),
    ) );

    // Switch default core markup to output clean semantic HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
}
add_action( 'after_setup_theme', 'jaflong_travel_setup' );

/**
 * Add Tailwind classes to primary menu links in the header.
 */
function jaflong_travel_primary_menu_link_attributes( $atts, $item, $args ) {
    if ( empty( $args->theme_location ) || 'menu-1' !== $args->theme_location ) {
        return $atts;
    }

    $context = ! empty( $args->jaflong_menu_context ) ? $args->jaflong_menu_context : 'desktop';

    if ( 'mobile' === $context ) {
        $atts['class']   = trim( ( $atts['class'] ?? '' ) . ' py-3 px-4 text-emerald-100 hover:text-white hover:bg-emerald-900/50 rounded-xl transition' );
        $atts['onclick'] = 'toggleMobileNavigationMenu()';
    } else {
        $atts['class'] = trim( ( $atts['class'] ?? '' ) . ' py-2 px-3 text-emerald-100 hover:text-white hover:bg-emerald-900/40 rounded-lg transition' );
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'jaflong_travel_primary_menu_link_attributes', 10, 3 );

/**
 * Output primary header menu items as direct anchor tags.
 */
class Jaflong_Travel_Header_Menu_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $atts           = array();
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( '' !== $value && false !== $value ) {
                $value       = 'href' === $attr ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $output .= '<a' . $attributes . '>' . esc_html( $title ) . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

/**
 * Enable a multi-image gallery picker for blog posts.
 */
function jaflong_travel_add_post_gallery_meta_box() {
    add_meta_box(
        'jaflong_travel_post_gallery',
        esc_html__( 'Post Gallery Images', 'jaflong-travel' ),
        'jaflong_travel_post_gallery_meta_box_callback',
        'post',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'jaflong_travel_add_post_gallery_meta_box' );

function jaflong_travel_post_gallery_meta_box_callback( $post ) {
    wp_nonce_field( 'jaflong_travel_save_post_gallery', 'jaflong_travel_post_gallery_nonce' );

    $gallery_ids = get_post_meta( $post->ID, '_jaflong_travel_gallery_ids', true );
    $gallery_ids = is_array( $gallery_ids ) ? $gallery_ids : array_filter( array_map( 'absint', explode( ',', (string) $gallery_ids ) ) );
    ?>
    <div id="jaflong-travel-gallery-metabox">
        <input type="hidden" id="jaflong-travel-gallery-ids" name="jaflong_travel_gallery_ids" value="<?php echo esc_attr( implode( ',', $gallery_ids ) ); ?>">
        <div id="jaflong-travel-gallery-preview" style="display:flex;flex-wrap:wrap;gap:10px;margin:12px 0;">
            <?php foreach ( $gallery_ids as $attachment_id ) : ?>
                <?php $thumb_url = wp_get_attachment_image_url( $attachment_id, 'thumbnail' ); ?>
                <?php if ( $thumb_url ) : ?>
                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="" style="width:80px;height:80px;object-fit:cover;border:1px solid #dcdcde;border-radius:6px;">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <p>
            <button type="button" class="button button-primary" id="jaflong-travel-gallery-select"><?php esc_html_e( 'Add / Edit Gallery', 'jaflong-travel' ); ?></button>
            <button type="button" class="button" id="jaflong-travel-gallery-clear"><?php esc_html_e( 'Clear Gallery', 'jaflong-travel' ); ?></button>
        </p>
        <p class="description"><?php esc_html_e( 'Select multiple images from the media library for this blog post gallery.', 'jaflong-travel' ); ?></p>
    </div>

    <script>
        jQuery(function($) {
            let galleryFrame;
            const idsInput = $('#jaflong-travel-gallery-ids');
            const preview = $('#jaflong-travel-gallery-preview');

            function renderPreview(attachments) {
                preview.empty();
                attachments.each(function(attachment) {
                    const image = attachment.attributes.sizes && attachment.attributes.sizes.thumbnail
                        ? attachment.attributes.sizes.thumbnail.url
                        : attachment.attributes.url;

                    preview.append(
                        $('<img>', {
                            src: image,
                            alt: ''
                        }).css({
                            width: '80px',
                            height: '80px',
                            objectFit: 'cover',
                            border: '1px solid #dcdcde',
                            borderRadius: '6px'
                        })
                    );
                });
            }

            $('#jaflong-travel-gallery-select').on('click', function(e) {
                e.preventDefault();

                galleryFrame = wp.media({
                    title: '<?php echo esc_js( __( 'Select Gallery Images', 'jaflong-travel' ) ); ?>',
                    button: {
                        text: '<?php echo esc_js( __( 'Use These Images', 'jaflong-travel' ) ); ?>'
                    },
                    multiple: true,
                    library: {
                        type: 'image'
                    }
                });

                galleryFrame.on('open', function() {
                    const selection = galleryFrame.state().get('selection');
                    const selectedIds = idsInput.val() ? idsInput.val().split(',') : [];

                    selectedIds.forEach(function(id) {
                        const attachment = wp.media.attachment(id);
                        attachment.fetch();
                        selection.add(attachment ? [attachment] : []);
                    });
                });

                galleryFrame.on('select', function() {
                    const selection = galleryFrame.state().get('selection');
                    const ids = [];

                    selection.each(function(attachment) {
                        ids.push(attachment.id);
                    });

                    idsInput.val(ids.join(','));
                    renderPreview(selection);
                });

                galleryFrame.open();
            });

            $('#jaflong-travel-gallery-clear').on('click', function(e) {
                e.preventDefault();
                idsInput.val('');
                preview.empty();
            });
        });
    </script>
    <?php
}

function jaflong_travel_enqueue_post_gallery_admin_assets( $hook ) {
    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
        return;
    }

    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'jaflong_travel_enqueue_post_gallery_admin_assets' );

function jaflong_travel_save_post_gallery_meta( $post_id ) {
    if ( ! isset( $_POST['jaflong_travel_post_gallery_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['jaflong_travel_post_gallery_nonce'] ) ), 'jaflong_travel_save_post_gallery' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $gallery_ids = isset( $_POST['jaflong_travel_gallery_ids'] ) ? sanitize_text_field( wp_unslash( $_POST['jaflong_travel_gallery_ids'] ) ) : '';
    $gallery_ids = array_filter( array_map( 'absint', explode( ',', $gallery_ids ) ) );

    if ( ! empty( $gallery_ids ) ) {
        update_post_meta( $post_id, '_jaflong_travel_gallery_ids', implode( ',', $gallery_ids ) );
    } else {
        delete_post_meta( $post_id, '_jaflong_travel_gallery_ids' );
    }
}
add_action( 'save_post_post', 'jaflong_travel_save_post_gallery_meta' );

/**
 * Register Customize settings for Logo, Whatsapp, and Hero Background
 */
function jaflong_travel_customize_register( $wp_customize ) {
    // Section for Jaflong Travel Settings
    $wp_customize->add_section( 'jaflong_travel_settings', array(
        'title'       => __( 'জাফলং-ট্রাভেল কনফিগারেশন', 'jaflong-travel' ),
        'priority'    => 30,
        'description' => __( 'আপনার সাইটের হোয়াটসঅ্যান্ড নম্বর, লোগো এবং হিরো ব্যানার পরিবর্তন করুন।', 'jaflong-travel' ),
    ) );

    // WhatsApp Number Setting
    $wp_customize->add_setting( 'jaflong_travel_whatsapp_number', array(
        'default'           => '8801700000000',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'jaflong_travel_whatsapp_number', array(
        'label'       => __( 'হোয়াটসঅ্যাপ নম্বর (কান্ট্রি কোডসহ, স্পেস ছাড়া)', 'jaflong-travel' ),
        'section'     => 'jaflong_travel_settings',
        'type'        => 'text',
        'description' => __( 'উদাহরণ: 8801700000000', 'jaflong-travel' ),
    ) );

    // Header Logo Setting
    $wp_customize->add_setting( 'jaflong_travel_header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jaflong_travel_header_logo', array(
        'label'    => __( 'হেডার লোগো ইমেজ', 'jaflong-travel' ),
        'section'  => 'jaflong_travel_settings',
        'settings' => 'jaflong_travel_header_logo',
    ) ) );

    // Footer Logo Setting
    $wp_customize->add_setting( 'jaflong_travel_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jaflong_travel_footer_logo', array(
        'label'    => __( 'ফুটার লোগো ইমেজ', 'jaflong-travel' ),
        'section'  => 'jaflong_travel_settings',
        'settings' => 'jaflong_travel_footer_logo',
    ) ) );

    // Hero Background Image Setting (Dynamic customizer support)
    $wp_customize->add_setting( 'jaflong_travel_hero_bg', array(
        'default'           => 'https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?auto=format&fit=crop&w=1600&q=80',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jaflong_travel_hero_bg', array(
        'label'    => __( 'হিরো ব্যানার ব্যাকগ্রাউন্ড ইমেজ (জাফলং জিরো পয়েন্ট)', 'jaflong-travel' ),
        'section'  => 'jaflong_travel_settings',
        'settings' => 'jaflong_travel_hero_bg',
    ) ) );
}
add_action( 'customize_register', 'jaflong_travel_customize_register' );

/**
 * Enqueue styles and scripts securely with Hind Siliguri and Inter Fonts
 */
function jaflong_travel_scripts() {
    // Theme primary stylesheet
    wp_enqueue_style( 'jaflong-travel-style', get_stylesheet_uri(), array(), '1.0.7' );

    // Google Font: Hind Siliguri (Bengali) & Inter (English)
    wp_enqueue_style( 'google-fonts-bangla', 'https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:wght@400;600;800&display=swap', array(), null );

    // FontAwesome Icons
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Tailwind CSS Loaded as a Script safely at bottom
    wp_enqueue_script( 'tailwind-cdn-js', 'https://cdn.tailwindcss.com', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'jaflong_travel_scripts' );

/**
 * Custom OpenGraph & SEO Head Tags for Bengali Content
 */
function jaflong_travel_seo_meta_tags() {
    if ( is_singular() ) {
        global $post;
        setup_postdata( $post );
        $meta_desc = wp_strip_all_tags( wp_trim_words( get_the_excerpt(), 25 ) );
        $meta_url  = esc_url( get_permalink() );
        $meta_title = esc_attr( get_the_title() );
        $meta_img   = has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) : '';

        echo '<meta name="description" content="' . $meta_desc . '">' . "\n";
        echo '<meta property="og:title" content="' . $meta_title . '">' . "\n";
        echo '<meta property="og:description" content="' . $meta_desc . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
        echo '<meta property="og:url" content="' . $meta_url . '">' . "\n";
        if ( $meta_img ) {
            echo '<meta property="og:image" content="' . $meta_img . '">' . "\n";
        }
    } else {
        echo '<meta name="description" content="সিলেট এবং জাফলং ভ্রমণের সম্পূর্ণ গাইডলাইন। দেশের ৭টি বিভাগ থেকে যাওয়ার রুট, বাস-ট্রেন ভাড়ার হিসাব এবং বাজেট ক্যালকুলেটর।">' . "\n";
    }
}
add_action( 'wp_head', 'jaflong_travel_seo_meta_tags', 1 );

/**
 * Clean up unnecessary WordPress header bloat
 */
function jaflong_travel_performance_cleanup() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'jaflong_travel_performance_cleanup' );

/**
 * High-Performance Secure AJAX Handler for Infinite Scroll Blog Loading (In Bengali)
 */
function jaflong_travel_ajax_load_posts() {
    $paged = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
    $category_slug = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : 'all';
    $search_query = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 12,
        'paged'          => $paged,
        'post_status'    => 'publish',
    );

    if ( 'all' !== $category_slug ) {
        $args['category_name'] = $category_slug;
    }

    if ( ! empty( $search_query ) ) {
        $args['s'] = $search_query;
    }

    $ajax_query = new WP_Query( $args );

    if ( $ajax_query->have_posts() ) :
        while ( $ajax_query->have_posts() ) : $ajax_query->the_post(); 
            $categories = get_the_category();
            $cat_classes = array();
            foreach ( $categories as $cat ) {
                $cat_classes[] = 'cat-' . esc_attr( $cat->slug );
            }
            $class_string = implode( ' ', $cat_classes );
            ?>
            <article class="blog-post-card <?php echo esc_attr( $class_string ); ?> bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between card-hover-effect">
                <div>
                    <div class="relative h-56 bg-slate-100">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                        <?php else : ?>
                            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80" alt="Placeholder" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <div class="text-[10px] text-slate-400 font-semibold mb-2 flex justify-between items-center">
                            <span><?php echo esc_html( get_the_date() ); ?></span>
                            <span>লেখক: <?php the_author(); ?></span>
                        </div>
                        <h4 class="font-extrabold text-slate-850 text-base leading-snug hover:text-emerald-700 transition">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <p class="text-xs text-slate-500 mt-2.5 line-clamp-3 leading-relaxed"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                    </div>
                </div>
                <div class="p-6 pt-0 text-right">
                    <a href="<?php the_permalink(); ?>" class="text-xs text-emerald-600 font-extrabold hover:underline inline-flex items-center gap-1">
                        সম্পূর্ণ পড়ুন <i class="fa-solid fa-chevron-right text-[9px]"></i>
                    </a>
                </div>
            </article>
            <?php
        endwhile;
    else :
        echo '';
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action( 'wp_ajax_jaflong_travel_ajax_load_posts', 'jaflong_travel_ajax_load_posts' );
add_action( 'wp_ajax_nopriv_jaflong_travel_ajax_load_posts', 'jaflong_travel_ajax_load_posts' );

/**
 * Real-time AJAX Search Engine for Front-Page Hero Search Input
 */
function jaflong_travel_ajax_search() {
    $search_query = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';
    
    if ( empty( $search_query ) || strlen( $search_query ) < 2 ) {
        wp_send_json_success( array( 'posts' => array() ) );
    }

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        's'              => $search_query
    );

    $query = new WP_Query( $args );
    $posts_list = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) : 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=150&q=80';
            
            $posts_list[] = array(
                'title'     => get_the_title(),
                'permalink' => get_permalink(),
                'image'     => $thumbnail,
                'excerpt'   => wp_strip_all_tags( wp_trim_words( get_the_excerpt(), 10 ) )
            );
        }
    }

    wp_reset_postdata();
    wp_send_json_success( array( 'posts' => $posts_list ) );
}
add_action( 'wp_ajax_jaflong_travel_ajax_search', 'jaflong_travel_ajax_search' );
add_action( 'wp_ajax_nopriv_jaflong_travel_ajax_search', 'jaflong_travel_ajax_search' );
