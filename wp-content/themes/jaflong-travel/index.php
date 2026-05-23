<?php
/**
 * The template for displaying archive pages (Categories, Tags, Authors, Dates)
 * Optimized with 1320px containers, clean grid views, and dynamic AJAX Auto-Scroll in Bangla.
 * Matches reference design image_a7c132.jpg perfectly.
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

get_header(); 

$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
?>

<main class="bg-slate-50 min-h-screen pb-16 font-sans">
    
    <div class="bg-gradient-to-b from-emerald-950 to-teal-950 text-white py-20 px-4 mb-12 relative shadow-inner">
        <div class="container-custom text-center">
            <span class="bg-emerald-500/20 text-emerald-300 text-[11px] font-extrabold uppercase px-3.5 py-1.5 rounded-full inline-block border border-emerald-500/30 mb-4 tracking-wider">
                আর্কাইভ কালেকশন
            </span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight text-white mb-2">
                <?php the_archive_title(); ?>
            </h1>
            <div class="text-xs md:text-sm text-emerald-200 mt-3 max-w-2xl mx-auto leading-relaxed">
                <?php the_archive_description(); ?>
                সিলেট এবং জাফলং ভ্রমণের লাইভ আবহাওয়া, বর্তমান পরিস্থিতি, দর্শনীয় স্থানের বিবরণ এবং সাশ্রয়ী গাইডলাইনের খতিয়ান।
            </div>
        </div>
    </div>

    <div class="container-custom">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-12">
            <div class="flex flex-wrap gap-2">
                <button onclick="changeCategoryFilter('all', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-emerald-600 text-white shadow-sm border border-emerald-600 cursor-pointer">সকল আপডেট</button>
                <button onclick="changeCategoryFilter('popular-destinations', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer">জনপ্রিয় দর্শনীয় স্থান</button>
                <button onclick="changeCategoryFilter('travel-guides', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer">ভ্রমণ নির্দেশিকা</button>
                <button onclick="changeCategoryFilter('live-news', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer">লাইভ খবর</button>
                <button onclick="changeCategoryFilter('travel-tips', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer">ভ্রমণ টিপস</button>
            </div>
            
            <div class="relative w-full md:w-72">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" id="blog-search-input" onkeyup="handleSearchInput()" placeholder="আর্টিকেল খুঁজুন..." class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500 text-slate-800 shadow-inner">
            </div>
        </div>

        <div id="blog-posts-grid" class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); 
                    $categories = get_the_category();
                    $cat_classes = array();
                    foreach ( $categories as $category ) {
                        $cat_classes[] = 'cat-' . esc_attr( $category->slug );
                    }
                    $class_string = implode( ' ', $cat_classes );
                    
                    // Extract first tag dynamically for premium look
                    $post_tags = get_the_tags();
                    $dynamic_badge = 'ভ্রমণ';
                    if ( $post_tags ) {
                        $dynamic_badge = $post_tags[0]->name;
                    }
                    ?>
                    <article class="blog-post-card <?php echo esc_attr( $class_string ); ?> bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between card-hover-effect">
                        <div>
                            <div class="relative h-56 bg-slate-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                                <?php else : ?>
                                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80" alt="Placeholder" class="w-full h-full object-cover">
                                <?php endif; ?>
                                <span class="absolute top-4 left-4 bg-emerald-600 text-white text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                    #<?php echo esc_html( $dynamic_badge ); ?>
                                </span>
                            </div>
                            <div class="p-6">
                                <div class="text-[10px] text-slate-400 font-semibold mb-2.5 flex justify-between items-center">
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
                <?php endwhile;
            else : ?>
                <div class="col-span-full text-center py-16 bg-white rounded-3xl border border-slate-100 shadow-sm" id="no-posts-indicator">
                    <p class="text-xs text-slate-500 font-bold"><?php esc_html_e( 'দুঃখিত, এই ক্যাটাগরিতে কোনো আর্টিকেল পাওয়া যায়নি!', 'jaflong-travel' ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div id="infinite-scroll-trigger" class="flex justify-center items-center py-12 mt-8">
            <div id="infinite-loader-icon" class="hidden">
                <i class="fa-solid fa-circle-notch fa-spin text-emerald-600 text-3xl"></i>
            </div>
            <p id="all-loaded-text" class="hidden text-xs text-slate-400 font-bold uppercase tracking-wider bg-slate-100 px-4 py-2 rounded-full border border-slate-200 shadow-inner">সবগুলো আর্টিকেল সফলভাবে লোড করা হয়েছে</p>
        </div>

    </div>
</main>

<script>
    // State management for Infinite Scrolling
    let currentPage = 1;
    let isLoading = false;
    let allContentLoaded = false;
    let currentCategory = 'all';
    let currentSearch = '';
    let debounceTimer;

    const observerOptions = {
        root: null,
        rootMargin: '150px', // Pre-fetch content early before scrolling hits absolute bottom
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && !allContentLoaded) {
                loadMorePostsFromServer();
            }
        });
    }, observerOptions);

    document.addEventListener("DOMContentLoaded", () => {
        const triggerElement = document.getElementById('infinite-scroll-trigger');
        if (triggerElement) {
            observer.observe(triggerElement);
        }
    });

    /**
     * Trigger Server-Side AJAX request to fetch more posts in the loop
     */
    async function loadMorePostsFromServer() {
        if (isLoading || allContentLoaded) return;
        
        isLoading = true;
        document.getElementById('infinite-loader-icon').classList.remove('hidden');
        currentPage++;

        const formData = new FormData();
        formData.append('action', 'jaflong_travel_ajax_load_posts');
        formData.append('page', currentPage);
        formData.append('category', currentCategory);
        formData.append('search', currentSearch);

        try {
            const response = await fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                method: 'POST',
                body: formData
            });
            const textHTML = await response.text();
            
            document.getElementById('infinite-loader-icon').classList.add('hidden');
            
            if (textHTML.trim() === '') {
                allContentLoaded = true;
                document.getElementById('all-loaded-text').classList.remove('hidden');
            } else {
                const grid = document.getElementById('blog-posts-grid');
                grid.insertAdjacentHTML('beforeend', textHTML);
            }
        } catch (error) {
            console.error('AJAX Load More failed:', error);
        } finally {
            isLoading = false;
        }
    }

    /**
     * Category change action: Resets pagination and fetches clean categorized grid
     */
    async function changeCategoryFilter(catSlug, buttonElement) {
        document.querySelectorAll('.blog-filter-btn').forEach(btn => {
            btn.className = "blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 cursor-pointer";
        });
        buttonElement.className = "blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-emerald-600 text-white shadow-sm border border-emerald-600 cursor-pointer";

        currentCategory = catSlug;
        currentPage = 1;
        allContentLoaded = false;
        document.getElementById('all-loaded-text').classList.add('hidden');
        
        const grid = document.getElementById('blog-posts-grid');
        grid.innerHTML = '<div class="col-span-full text-center py-12"><i class="fa-solid fa-circle-notch fa-spin text-emerald-600 text-3xl"></i></div>';

        const formData = new FormData();
        formData.append('action', 'jaflong_travel_ajax_load_posts');
        formData.append('page', 1);
        formData.append('category', currentCategory);
        formData.append('search', currentSearch);

        try {
            const response = await fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                method: 'POST',
                body: formData
            });
            const textHTML = await response.text();
            
            if (textHTML.trim() === '') {
                grid.innerHTML = '<div class="col-span-full text-center py-16"><p class="text-xs text-slate-500 font-bold">এই বিভাগে কোনো পোস্ট পাওয়া যায়নি।</p></div>';
                allContentLoaded = true;
            } else {
                grid.innerHTML = textHTML;
            }
        } catch (error) {
            console.error('Category load failed:', error);
        }
    }

    /**
     * Secure debounced input listener for instant search queries
     */
    function handleSearchInput() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(async () => {
            currentSearch = document.getElementById('blog-search-input').value;
            currentPage = 1;
            allContentLoaded = false;
            document.getElementById('all-loaded-text').classList.add('hidden');

            const grid = document.getElementById('blog-posts-grid');
            grid.innerHTML = '<div class="col-span-full text-center py-12"><i class="fa-solid fa-circle-notch fa-spin text-emerald-600 text-3xl"></i></div>';

            const formData = new FormData();
            formData.append('action', 'jaflong_travel_ajax_load_posts');
            formData.append('page', 1);
            formData.append('category', currentCategory);
            formData.append('search', currentSearch);

            try {
                const response = await fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                    method: 'POST',
                    body: formData
                });
                const textHTML = await response.text();
                
                if (textHTML.trim() === '') {
                    grid.innerHTML = '<div class="col-span-full text-center py-16"><p class="text-xs text-slate-500 font-bold">আপনার খুঁজা তথ্যের সাথে কোনো আর্টিকেল মেলেনি।</p></div>';
                    allContentLoaded = true;
                } else {
                    grid.innerHTML = textHTML;
                }
            } catch (error) {
                console.error('Search query failed:', error);
            }
        }, 350);
    }
</script>

<?php get_footer(); ?>