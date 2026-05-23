<?php
/**
 * The template for displaying archive pages (Categories, Tags, Authors, Dates)
 * optimized with 1320px containers, clean grid views, and dynamic AJAX Auto-Scroll.
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

get_header(); 

$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
?>

<main class="bg-slate-50 min-h-screen pb-16">
    
    <!-- Hero Banner for Archive: Dark Emerald Background matching image_a7c132.jpg layout -->
    <div class="bg-gradient-to-b from-emerald-950 to-teal-950 text-white py-20 px-4 mb-12">
        <div class="container-custom text-center">
            <span class="bg-emerald-500/20 text-emerald-300 text-[11px] font-extrabold uppercase px-3.5 py-1.5 rounded-full inline-block shadow-sm mb-4 tracking-wider">
                <?php esc_html_e( 'Jaflong Travel Blog & Live News', 'jaflong-travel' ); ?>
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight">Stay Updated with Live Information</h1>
            <p class="text-xs md:text-sm text-emerald-200 mt-3 max-w-2xl mx-auto leading-relaxed">
                Stay updated on recent weather changes, water levels, local festival announcements and explore the best backpacker guides.
            </p>
        </div>
    </div>

    <div class="container-custom">
        
        <!-- Filter Controls and Instant Search Box Grid exactly like image_a7c132.jpg -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-12">
            <!-- Filter Tabs to quickly jump/filter archives -->
            <div class="flex flex-wrap gap-2">
                <button onclick="changeCategoryFilter('all', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-emerald-600 text-white shadow-sm">All Articles</button>
                <button onclick="changeCategoryFilter('popular-destinations', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">Popular Destinations</button>
                <button onclick="changeCategoryFilter('travel-guides', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">Travel Guides</button>
                <button onclick="changeCategoryFilter('live-news', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">Live News</button>
                <button onclick="changeCategoryFilter('travel-tips', this)" class="blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">Travel Tips</button>
            </div>
            
            <!-- Modern Search Box matching your high fidelity layouts -->
            <div class="relative w-full md:w-72">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" id="blog-search-input" onkeyup="handleSearchInput()" placeholder="Search articles..." class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
            </div>
        </div>

        <!-- Archive Post Grid inside strict 1320px Container -->
        <div id="blog-posts-grid" class="grid md:grid-cols-3 gap-8">
            <?php
            // Initial render query (12 posts)
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'post_status'    => 'publish',
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); 
                    $categories = get_the_category();
                    $cat_classes = array();
                    foreach ( $categories as $category ) {
                        $cat_classes[] = 'cat-' . esc_attr( $category->slug );
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
                                    <span>By <?php the_author(); ?></span>
                                </div>
                                <h4 class="font-extrabold text-slate-850 text-base leading-snug hover:text-emerald-700 transition">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <p class="text-xs text-slate-500 mt-2.5 line-clamp-3 leading-relaxed"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                            </div>
                        </div>
                        <div class="p-6 pt-0 text-right">
                            <a href="<?php the_permalink(); ?>" class="text-xs text-emerald-600 font-extrabold hover:underline inline-flex items-center gap-1">
                                Read Article <i class="fa-solid fa-chevron-right text-[9px]"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="col-span-full text-center py-16" id="no-posts-indicator">
                    <p class="text-xs text-slate-500"><?php esc_html_e( 'No posts found in this selection.', 'jaflong-travel' ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Auto-Scroll Infinite Scroll Trigger Loader -->
        <div id="infinite-scroll-trigger" class="flex justify-center items-center py-12 mt-8">
            <div id="infinite-loader-icon" class="hidden">
                <i class="fa-solid fa-circle-notch fa-spin text-emerald-600 text-3xl"></i>
            </div>
            <p id="all-loaded-text" class="hidden text-xs text-slate-400 font-semibold uppercase tracking-wider">All content has been loaded</p>
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

    // Use IntersectionObserver to track when scroll trigger is visible
    const observerOptions = {
        root: null,
        rootMargin: '150px', // Fetch posts early before user hits absolute bottom
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && !allContentLoaded) {
                loadMorePostsFromServer();
            }
        });
    }, observerOptions);

    // Start observing trigger anchor
    document.addEventListener("DOMContentLoaded", () => {
        const triggerElement = document.getElementById('infinite-scroll-trigger');
        if (triggerElement) {
            observer.observe(triggerElement);
        }
    });

    /**
     * Trigger Server-Side AJAX request to fetch more posts
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
                // No more posts returned
                allContentLoaded = true;
                document.getElementById('all-loaded-text').classList.remove('hidden');
            } else {
                // Append retrieved server rendered post HTML to the grid
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
        // Reset category button layouts
        document.querySelectorAll('.blog-filter-btn').forEach(btn => {
            btn.className = "blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-white text-slate-600 hover:bg-slate-100 border border-slate-200";
        });
        buttonElement.className = "blog-filter-btn px-5 py-3 rounded-xl text-xs font-bold transition-all bg-emerald-600 text-white shadow-sm border border-emerald-600";

        // Reset variables
        currentCategory = catSlug;
        currentPage = 1;
        allContentLoaded = false;
        document.getElementById('all-loaded-text').classList.add('hidden');
        
        // Wipe grid & show loading state
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
                grid.innerHTML = '<div class="col-span-full text-center py-16"><p class="text-xs text-slate-500">No posts found in this category.</p></div>';
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
                    grid.innerHTML = '<div class="col-span-full text-center py-16"><p class="text-xs text-slate-500">No search results found.</p></div>';
                    allContentLoaded = true;
                } else {
                    grid.innerHTML = textHTML;
                }
            } catch (error) {
                console.error('Search query failed:', error);
            }
        }, 350); // 350ms debounce time
    }
</script>

<?php get_footer(); ?>