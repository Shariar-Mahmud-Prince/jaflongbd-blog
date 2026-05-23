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
                    <span class="bg-emerald-100 text-emerald-800 font-extrabold px-3.5 py-1.5 rounded-full uppercase tracking-wider text-[10px]">
                        <?php the_category(', '); ?>
                    </span>
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
    </div>
</main>

<?php get_footer(); ?>