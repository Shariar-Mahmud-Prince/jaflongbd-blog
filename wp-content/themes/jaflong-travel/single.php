<?php
/**
 * The template for displaying all single posts natively inside 1320px bounds (Bangla metadata).
 * Fully replacing popups for flawless SEO ranking and performance.
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

get_header(); 

$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
?>

<main class="bg-slate-50 min-h-screen py-16 px-4">
    <div class="container-custom">
        <!-- Strictly bound article wrapper inside 1320px screen bounds -->
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'max-w-[1320px] mx-auto bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden' ); ?>>
            
            <!-- Post Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="w-full h-80 md:h-[520px] bg-emerald-950 overflow-hidden relative">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Post Content Details Area - Center padded readable layout -->
            <div class="p-6 md:p-16 max-w-4xl mx-auto">
                
                <!-- Metadata & Breadcrumbs in Bangla -->
                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-400 mb-6">
                    <?php $post_tags = get_the_tags(); ?>
                    <?php foreach ( get_the_category() as $category ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $category ) ); ?>" class="bg-emerald-100 text-emerald-800 font-extrabold px-3.5 py-1.5 rounded-full uppercase tracking-wider text-[10px] hover:bg-emerald-200 transition">
                            <?php echo esc_html( $category->name ); ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if ( $post_tags ) : ?>
                        <?php foreach ( $post_tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>" class="bg-teal-50 text-teal-700 font-extrabold px-3.5 py-1.5 rounded-full uppercase tracking-wider text-[10px] hover:bg-teal-100 transition">
                                #<?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <span><?php the_date(); ?></span>
                    <span>•</span>
                    <span class="font-bold text-slate-600">লেখক: <?php the_author(); ?></span>
                </div>

                <!-- Main Post Title -->
                <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-8">
                    <?php the_title(); ?>
                </h1>

                <!-- Standard WordPress Article Post Body -->
                <div class="prose prose-slate max-w-none text-slate-600 text-sm md:text-base leading-relaxed space-y-6">
                    <?php
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'পৃষ্ঠা:', 'jaflong-travel' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <?php
                $post_gallery_ids = get_post_meta( get_the_ID(), '_jaflong_travel_gallery_ids', true );
                $post_gallery_ids = array_filter( array_map( 'absint', explode( ',', (string) $post_gallery_ids ) ) );
                ?>

                <?php if ( ! empty( $post_gallery_ids ) ) : ?>
                    <section class="mt-12">
                        <div class="flex items-end justify-between gap-4 mb-5">
                            <div>
                                <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">ছবি গ্যালারি</span>
                                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">পোস্টের ছবি</h2>
                            </div>
                            <div class="flex gap-2">
                                <button type="button" onclick="slideHorizontalGallery('single-post-image-gallery', -1)" class="w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition" aria-label="<?php esc_attr_e( 'Previous gallery images', 'jaflong-travel' ); ?>">
                                    <i class="fa-solid fa-arrow-left text-xs"></i>
                                </button>
                                <button type="button" onclick="slideHorizontalGallery('single-post-image-gallery', 1)" class="w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition" aria-label="<?php esc_attr_e( 'Next gallery images', 'jaflong-travel' ); ?>">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div id="single-post-image-gallery" class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
                            <?php foreach ( $post_gallery_ids as $attachment_id ) : ?>
                                <?php if ( wp_get_attachment_image_url( $attachment_id, 'large' ) ) : ?>
                                    <a href="<?php echo esc_url( wp_get_attachment_image_url( $attachment_id, 'full' ) ); ?>" target="_blank" class="snap-start shrink-0 w-[260px] sm:w-[340px] aspect-[4/3] bg-slate-100 rounded-2xl overflow-hidden border border-slate-100">
                                        <?php
                                        echo wp_get_attachment_image( $attachment_id, 'large', false, array(
                                            'class'    => 'w-full h-full object-cover',
                                            'loading'  => 'lazy',
                                            'decoding' => 'async',
                                        ) );
                                        ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <!-- Footer Share & Support CTAs -->
                <div class="border-t border-slate-100 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <h5 class="font-extrabold text-slate-800 text-sm md:text-base">লোকাল সাহায্য বা তথ্যের প্রয়োজন?</h5>
                        <p class="text-xs text-slate-500 mt-1">হোটেল বা বুকিং সংক্রান্ত নির্ভরযোগ্য তথ্য পেতে সরাসরি আমাদের হোয়াটসঅ্যান্ড লাইনে কথা বলুন।</p>
                    </div>
                    <a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=হ্যালো!%20আমি%20আপনার%20ব্লগ%20পড়ার%20পর%20সিলেট%20ভ্রমণের%20জন্য%20তথ্য%20জানতে%20চাই।" target="_blank" class="bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-3 px-6 rounded-xl text-xs transition flex items-center gap-2 shadow-sm border-0 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-lg"></i> সরাসরি হোয়াটসঅ্যাপ গাইড
                    </a>
                </div>

                <!-- Post Navigation Links -->
                <div class="border-t border-slate-100 mt-8 pt-6 flex justify-between text-xs font-extrabold text-emerald-600">
                    <div><?php previous_post_link('%link', '<i class="fa-solid fa-arrow-left"></i> পূর্ববর্তী পোস্ট'); ?></div>
                    <div><?php next_post_link('%link', 'পরবর্তী পোস্ট <i class="fa-solid fa-arrow-right"></i>'); ?></div>
                </div>

            </div>
        </article>

        <?php
        $blog_gallery_query = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => -1,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ) );
        ?>

        <?php if ( $blog_gallery_query->have_posts() ) : ?>
            <section class="mt-12 md:mt-16">
                <div class="flex items-end justify-between gap-4 mb-6">
                    <div>
                        <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">ব্লগ গ্যালারি</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">আরও ভ্রমণ ব্লগ</h2>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" onclick="slideBlogGallery(-1)" class="w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition" aria-label="<?php esc_attr_e( 'Previous posts', 'jaflong-travel' ); ?>">
                            <i class="fa-solid fa-arrow-left text-xs"></i>
                        </button>
                        <button type="button" onclick="slideBlogGallery(1)" class="w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition" aria-label="<?php esc_attr_e( 'Next posts', 'jaflong-travel' ); ?>">
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <div id="single-blog-gallery-slider" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
                    <?php
                    while ( $blog_gallery_query->have_posts() ) :
                        $blog_gallery_query->the_post();
                        $categories = get_the_category();
                        $category_name = ! empty( $categories ) ? $categories[0]->name : __( 'Blog', 'jaflong-travel' );
                        ?>
                        <article class="snap-start shrink-0 w-[280px] sm:w-[320px] bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between card-hover-effect">
                            <div>
                                <div class="relative h-48 bg-slate-100 overflow-hidden">
                                    <a href="<?php the_permalink(); ?>" class="block h-full">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium_large', array(
                                            'class'    => 'w-full h-full object-cover',
                                            'loading'  => 'lazy',
                                            'decoding' => 'async',
                                        ) ); ?>
                                    <?php else : ?>
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" class="w-full h-full object-cover">
                                    <?php endif; ?>
                                    </a>
                                    <?php if ( ! empty( $categories ) ) : ?>
                                        <a href="<?php echo esc_url( get_category_link( $categories[0] ) ); ?>" class="absolute top-4 left-4 bg-emerald-600 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm hover:bg-emerald-700 transition">
                                            <?php echo esc_html( $category_name ); ?>
                                        </a>
                                    <?php else : ?>
                                        <span class="absolute top-4 left-4 bg-emerald-600 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                            <?php echo esc_html( $category_name ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5">
                                    <div class="text-[10px] text-slate-400 font-semibold mb-2 flex justify-between items-center gap-3">
                                        <span><?php echo esc_html( get_the_date() ); ?></span>
                                        <span class="truncate">লেখক: <?php the_author(); ?></span>
                                    </div>
                                    <h3 class="font-extrabold text-slate-900 text-base leading-snug hover:text-emerald-700 transition">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-2.5 line-clamp-3 leading-relaxed"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                                </div>
                            </div>
                            <div class="p-5 pt-0 text-right">
                                <a href="<?php the_permalink(); ?>" class="text-xs text-emerald-600 font-extrabold hover:underline inline-flex items-center gap-1">
                                    বিস্তারিত পড়ুন <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</main>

<script>
    function slideHorizontalGallery(sliderId, direction) {
        const slider = document.getElementById(sliderId);
        if (!slider) {
            return;
        }

        const item = slider.firstElementChild;
        const itemWidth = item ? item.offsetWidth + 24 : 344;
        slider.scrollBy({
            left: direction * itemWidth,
            behavior: 'smooth'
        });
    }

    function slideBlogGallery(direction) {
        slideHorizontalGallery('single-blog-gallery-slider', direction);
    }
</script>

<?php get_footer(); ?>
