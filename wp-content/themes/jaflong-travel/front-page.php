<?php
/**
 * Template Name: JaflongTravel Static Front Page (100% Bangla Translation)
 * Optimized UI/UX Layout with Customizable Background, Sleek Responsive Headline, Review Grids, and FAQs.
 * Matches reference designs image_9cebcb.jpg, image_23cbcb.png, and image_23cbec.png with flawless Javascript execution.
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Direct file access block
}

get_header(); 

// Fetch customizer settings safely
$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
$hero_bg = get_theme_mod( 'jaflong_travel_hero_bg', 'https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?auto=format&fit=crop&w=1600&q=80' );
?>

<div class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <!-- HERO SECTION: Premium dynamic background banner with optimized White Overlay Card -->
    <div class="relative bg-slate-900 text-slate-800 py-16 md:py-28 px-4 overflow-hidden flex items-center min-h-[500px] md:min-h-[580px] bg-cover bg-center" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');">
        <!-- Soft Overlay configuration for high CRO readability -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/40 via-transparent to-transparent"></div>
        
        <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-emerald-500 rounded-full filter blur-3xl opacity-10"></div>
        <div class="absolute -top-12 -right-12 w-64 h-64 bg-teal-500 rounded-full filter blur-3xl opacity-10"></div>
        
        <div class="relative z-10 container-custom w-full">
            <!-- Sleeker Card Container: Downsized to max-w-[580px] for premium high-fidelity contrast -->
            <div class="max-w-[580px] bg-white/95 backdrop-blur-md p-6 md:p-10 rounded-3xl shadow-2xl border border-white/45 text-left">
                <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest block mb-2.5">সিলেটের সেরা ভ্রমণ নির্দেশিকা পোর্টাল</span>
                
                <!-- Headline wrapping cleanly and natively onto two balanced lines (Fixed truncation image_23de0f.jpg) -->
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-[34px] font-black text-slate-900 leading-snug mb-3 tracking-tight">
                    আপনার জাফলং ভ্রমণের<br class="hidden sm:inline"> সম্পূর্ণ ডিজিটাল গাইডলাইন
                </h2>
                
                <h3 class="text-xs md:text-sm font-extrabold text-emerald-800 mb-3.5">
                    সিলেটের প্রশান্তি অন্বেষণ করুন
                </h3>
                
                <p class="text-xs md:text-sm text-slate-600 mb-5 leading-relaxed">
                    ঢাকা থেকে রুট ম্যাপ, budget ক্যালকুলেশন, হোটেল রিভিউ এবং লোকাল ট্রান্সপোর্ট ট্র্যাকিং—সব কিছু এখন এক ক্লিকে।
                </p>
                
                <!-- Instant AJAX Live Search input field (Fixed search functionality) -->
                <div class="relative mb-5 max-w-[480px]">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="hero-local-search" onkeyup="handleHeroLiveSearch(this.value)" placeholder="গন্তব্য খুঁজুন... / Search destinations..." class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 text-xs md:text-sm shadow-inner text-slate-800" autocomplete="off">
                    
                    <!-- Dynamic Live Search Results Overlay Box -->
                    <div id="hero-live-search-results" class="absolute left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-slate-100 hidden z-50 max-h-[300px] overflow-y-auto p-2">
                        <!-- Rendered via JS AJAX -->
                    </div>
                </div>

                <div class="flex flex-wrap gap-2.5">
                    <a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=হ্যালো!%20আমি%20জাফলং%20ভ্রমণের%20বুকিং%20সংক্রান্ত%20তথ্য%20জানতে%20চাই।" target="_blank" class="bg-amber-500 text-slate-950 hover:bg-amber-400 transition-all duration-300 font-extrabold text-[11px] md:text-xs px-5 py-3 rounded-xl shadow-md flex items-center gap-1.5 transform hover:-translate-y-0.5 border-0 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-lg"></i> সরাসরি হোয়াটসঅ্যাপ গাইড
                    </a>
                    <a href="#popular-destinations" class="bg-emerald-800 text-white border border-emerald-600/40 hover:bg-emerald-700 transition-all duration-300 font-bold text-[11px] md:text-xs px-5 py-3 rounded-xl flex items-center gap-1.5 transform hover:-translate-y-0.5 border-0 cursor-pointer">
                        <i class="fa-solid fa-compass"></i> দর্শনীয় স্থানসমূহ দেখুন
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- POPULAR DESTINATIONS SECTION (100% Dynamic - Category: popular-destinations) -->
    <section id="popular-destinations" class="container-custom py-16 md:py-24">
        <!-- Headline matching image_23cf86.png styling exactly -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-4">
                <span class="bg-emerald-100 text-emerald-850 text-xs font-bold px-4 py-1.5 rounded-full border border-emerald-200/50 shadow-sm inline-block">দর্শনীয় স্থান</span>
            </div>
            <h3 class="text-2xl md:text-4xl font-extrabold text-slate-900 tracking-tight">সবচেয়ে জনপ্রিয় দর্শনীয় স্থান test</h3>
            <p class="text-slate-500 mt-2 text-xs md:text-sm"><?php esc_html_e( 'সিলেটের সবচেয়ে চমৎকার স্পটগুলোর ভ্রমণ নির্দেশিকা সরাসরি ক্যাটাগরি থেকে লোড হচ্ছে।', 'jaflong-travel' ); ?></p>
            <div class="w-12 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $dest_query = new WP_Query( array(
                'category_name'  => 'popular-destinations',
                'posts_per_page' => 4,
                'post_status'    => 'publish',
            ) );

            if ( $dest_query->have_posts() ) :
                while ( $dest_query->have_posts() ) : $dest_query->the_post(); 
                    // Dynamic query to extract the absolute first tag from current post
                    $post_tags = get_the_tags();
                    $dynamic_tag = '#দর্শনীয়স্থান'; // default fallback
                    if ( $post_tags ) {
                        $dynamic_tag = '#' . esc_html( $post_tags[0]->name );
                    }
                    ?>
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 card-hover-effect flex flex-col justify-between">
                        <div class="relative h-48 bg-slate-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?auto=format&fit=crop&w=600&q=80" alt="Destination" class="w-full h-full object-cover">
                            <?php endif; ?>
                            <!-- Dynamic Tag injection instead of Featured hardcode -->
                            <span class="absolute top-3 right-3 bg-teal-100 text-teal-800 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase"><?php echo esc_html( $dynamic_tag ); ?></span>
                        </div>
                        <div class="p-5">
                            <h4 class="font-extrabold text-slate-900 text-base hover:text-emerald-700 transition mb-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-3"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <!-- Pre-populated placeholders falling back cleanly on zero post state -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 card-hover-effect flex flex-col justify-between">
                    <div class="relative h-48 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1589182373726-e4f658ab50f0?auto=format&fit=crop&w=600&q=80" alt="Jaflong" class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 bg-teal-100 text-teal-800 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">#নদী_ও_পাথর</span>
                    </div>
                    <div class="p-5">
                        <h4 class="font-extrabold text-slate-900 text-base">জাফলং জিরো পয়েন্ট</h4>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">খাসিয়া পাহাড়ের পাদদেশে পিয়াইন নদীর স্বচ্ছ পানি আর পাথরের অপরূপ খেলা।</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 card-hover-effect flex flex-col justify-between">
                    <div class="relative h-48 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80" alt="Ratargul" class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 bg-green-100 text-green-800 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">#সোয়াম্প_ফরেস্ট</span>
                    </div>
                    <div class="p-5">
                        <h4 class="font-extrabold text-slate-900 text-base">রাতারগুল বন</h4>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">বাংলার একমাত্র মিঠাপানির জলাবন, যেখানে নৌকায় চড়ে রোমাঞ্চকর অভিজ্ঞতা মেলে।</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 card-hover-effect flex flex-col justify-between">
                    <div class="relative h-48 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" alt="Bisanakandi" class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 bg-blue-100 text-blue-800 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">#ঝর্ণা_ও_পাহাড়</span>
                    </div>
                    <div class="p-5">
                        <h4 class="font-extrabold text-slate-900 text-base">বিছনাকান্দি</h4>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">পাহাড়ের কোল ঘেঁষে বয়ে চলা ঠাণ্ডা পানির স্রোত এবং পাথর ছিটানো নদীপথ।</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 card-hover-effect flex flex-col justify-between">
                    <div class="relative h-48 bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Sreemangal" class="w-full h-full object-cover">
                        <span class="absolute top-3 right-3 bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">#চা_বাগান</span>
                    </div>
                    <div class="p-5">
                        <h4 class="font-extrabold text-slate-900 text-base">শ্রীমঙ্গল</h4>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">দেশের চায়ের রাজধানী, যেদিকে চোখ যায় শুধু সবুজ আর সবুজের সমারোহ।</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- NEW ON THE BLOG / LATEST NEWS SECTION -->
    <section class="bg-white border-t border-b border-slate-100 py-16 md:py-20">
        <div class="container-custom">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10">
                <div>
                    <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">নতুন আপডেট</span>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">ব্লগের নতুন ভ্রমণ নির্দেশিকা</h3>
                    <p class="text-slate-500 mt-2 text-xs md:text-sm max-w-xl">সিলেট এবং জাফলং ভ্রমণের লাইভ আবহাওয়া, বর্তমান পরিস্থিতি এবং সাশ্রয়ী গাইডলাইন জানতে চোখ রাখুন ব্লগে।</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="<?php echo esc_url( home_url( '/blogs/' ) ); ?>" class="inline-flex items-center gap-2 bg-slate-50 text-slate-700 hover:bg-slate-100 transition font-bold text-xs px-5 py-2.5 rounded-xl border border-slate-200">
                        সবগুলো আর্টিকেল পড়ুন <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 md:gap-8">
                <?php
                $latest_posts = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ) );

                if ( $latest_posts->have_posts() ) :
                    while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); 
                        $categories = get_the_category();
                        $category_name = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'ভ্রমণ গাইড';
                        ?>
                        <article class="bg-slate-50/60 rounded-3xl overflow-hidden border border-slate-100 flex flex-col justify-between card-hover-effect">
                            <div>
                                <div class="relative h-52 bg-slate-200">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                                    <?php else : ?>
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80" alt="Placeholder" class="w-full h-full object-cover opacity-80">
                                    <?php endif; ?>
                                    <span class="absolute top-4 left-4 bg-emerald-600 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                        <?php echo $category_name; ?>
                                    </span>
                                </div>
                                <div class="p-5">
                                    <div class="text-[10px] text-slate-400 font-semibold mb-2 flex justify-between items-center">
                                        <span><?php echo esc_html( get_the_date() ); ?></span>
                                        <span>লেখক: <?php the_author(); ?></span>
                                    </div>
                                    <h4 class="font-extrabold text-slate-850 text-base leading-snug hover:text-emerald-700 transition">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
                                </div>
                            </div>
                            <div class="p-5 pt-0 text-right">
                                <a href="<?php the_permalink(); ?>" class="text-xs text-emerald-600 font-extrabold hover:underline inline-flex items-center gap-1">
                                    বিস্তারিত পড়ুন <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                </a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="col-span-full text-center py-12 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-xs text-slate-500">এখনো কোনো ব্লগ পোস্ট লেখা হয়নি।</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 7 DIVISION ROADMAP SELECTION -->
    <section id="roadmaps-selector" class="container-custom py-16">
        <div class="text-center mb-10">
            <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">ইন্টারেক্টিভ রুট ম্যাপ</span>
            <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-1">আপনার বিভাগ থেকে সিলেট যাওয়ার রুট ম্যাপ</h3>
            <p class="text-slate-600 text-xs md:text-sm mt-2">নিচের যে কোনো একটি বিভাগ সিলেক্ট করে সিলেট ও জাফলং যাওয়ার পারফেক্ট গাইডলাইন এবং খরচের খসড়া দেখুন।</p>
            <div class="w-12 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button onclick="selectDivision('dhaka')" id="div-btn-dhaka" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-emerald-600 text-white border border-emerald-600">ঢাকা</button>
            <button onclick="selectDivision('chittagong')" id="div-btn-chittagong" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">চট্টগ্রাম</button>
            <button onclick="selectDivision('rajshahi')" id="div-btn-rajshahi" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">রাজশাহী</button>
            <button onclick="selectDivision('khulna')" id="div-btn-khulna" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">খুলনা</button>
            <button onclick="selectDivision('barisal')" id="div-btn-barisal" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">বরিশাল</button>
            <button onclick="selectDivision('rangpur')" id="div-btn-rangpur" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">রংপুর</button>
            <button onclick="selectDivision('mymensingh')" id="div-btn-mymensingh" class="div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200">ময়মনসিংহ</button>
        </div>

        <div id="division-content-card" class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 md:p-10 mb-12 animate-fade-in">
            <div id="dynamic-roadmap-placeholder"></div>
        </div>
    </section>

    <!-- REVIEWS SECTION: 100% Matching image_23cbcb.png design parameters -->
    <section class="bg-emerald-50/50 py-16 border-t border-b border-slate-100">
        <div class="container-custom">
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-4 py-1 rounded-full border border-emerald-200/50 shadow-sm inline-block">রিভিউ</span>
                </div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-slate-900 tracking-tight">যা বলছেন আমাদের ভ্রমণকারীরা</h3>
                <p class="text-slate-500 mt-2 text-xs md:text-sm">গুগল ও ফেসবুকে ৪.৯★ রেটিং • ২,৩০০+ ভেরিফায়েড রিভিউ</p>
                <div class="w-12 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- 4 Column Testimonial Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Review Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <!-- 5 Stars -->
                        <div class="flex text-amber-400 gap-1 mb-4 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-6 font-medium">"পরিবার নিয়ে ২ দিনের ট্যুর — হোটেল, গাড়ি, খাবার সব ফার্স্ট ক্লাস। বাচ্চারা এখনো জাফলং এর কথা বলে।"</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-emerald-100 text-emerald-800 font-bold rounded-full flex items-center justify-center text-xs">ত</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900">তানভীর হাসান</h4>
                            <p class="text-[10px] text-slate-400 font-semibold">ঢাকা</p>
                        </div>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 gap-1 mb-4 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-6 font-medium">"হানিমুনের জন্য এক্সক্লুসিভ প্যাকেজ নিয়েছিলাম। ক্যান্ডেললাইট ডিনার, রিসোর্ট, ফটোগ্রাফি — যা প্রতিশ্রুতি দিয়েছিল তাই পেয়েছি।"</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-emerald-100 text-emerald-800 font-bold rounded-full flex items-center justify-center text-xs">S</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900">Sadia Rahman</h4>
                            <p class="text-[10px] text-slate-400 font-semibold">চট্টগ্রাম</p>
                        </div>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 gap-1 mb-4 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-6 font-medium">"বন্ধুরা মিলে গিয়েছিলাম, বাজেটে পারফেক্ট। গাইড আশরাফ ভাই অসাধারণ — পরের ট্যুরেও তাকেই চাইব।"</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-emerald-100 text-emerald-800 font-bold rounded-full flex items-center justify-center text-xs">I</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900">Imran Khan</h4>
                            <p class="text-[10px] text-slate-400 font-semibold">নারায়ণগঞ্জ</p>
                        </div>
                    </div>
                </div>

                <!-- Review Card 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <div class="flex text-amber-400 gap-1 mb-4 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-6 font-medium">"দেশের বাইরে থেকে বুক করে পরিবারকে পাঠালাম। হোয়াটসঅ্যাপে রিয়েল টাইম আপডেট পেয়েছি ১০০% নিশ্চিত ছিলাম।"</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-emerald-100 text-emerald-800 font-bold rounded-full flex items-center justify-center text-xs">N</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900">Nusrat Jahan</h4>
                            <p class="text-[10px] text-slate-400 font-semibold">সিলেট প্রবাসী</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION: 100% Matching image_23cbec.png design parameters with native JS accordion triggers -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container-custom max-w-4xl">
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-4 py-1 rounded-full border border-emerald-200/50 shadow-sm inline-block">প্রশ্নোত্তর</span>
                </div>
                <h3 class="text-2xl md:text-4xl font-extrabold text-slate-900 tracking-tight">যা সবাই জানতে চায়</h3>
                <p class="text-slate-500 mt-2 text-xs md:text-sm">আরও কিছু জানতে চান? সরাসরি হোয়াটসঅ্যাপে মেসেজ দিন — ২ মিনিটে উত্তর।</p>
                <div class="w-12 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Toggled FAQ Item Set -->
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(1)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>বুকিং কনফার্ম করতে কত টাকা অগ্রিম দিতে হবে?</span>
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-1" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        মোট প্যাকেজ মূল্যের মাত্র ২০% অগ্রিম দিতে হয়। বাকি টাকা ট্যুর শুরুর দিন নগদ বা মোবাইল ব্যাংকিং-এ পরিশোধ করতে পারবেন।
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(2)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>ট্যুর ক্যান্সেল করলে টাকা ফেরত পাব?</span>
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-2" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        অবশ্যই। ট্যুর শুরুর ৪৮ ঘণ্টা আগে ক্যান্সেল করলে ১০০% রিফান্ড। ২৪ ঘণ্টা আগে ৫০% রিফান্ড।
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(3)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>জাফলং ভ্রমণের সেরা সময় কোনটি?</span>
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-3" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        অক্টোবর থেকে মার্চ সেরা সময় — আবহাওয়া শুষ্ক, পানি স্বচ্ছ। জুন-আগস্ট বর্ষায় পাহাড়-নদী আরও সুন্দর কিন্তু কাদা ও বৃষ্টি থাকে।
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(4)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>পরিবার ও বাচ্চাদের জন্য কি নিরাপদ?</span>
                        <i id="faq-icon-4" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-4" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        ১০০%! আমাদের গাইড ও ড্রাইভার বাচ্চা-বান্ধব, hotelগুলোও ফ্যামিলি ফ্রেন্ডলি। ৫ বছরের নিচের শিশুদের জন্য চার্জ নেই।
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(5)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>কাস্টম প্যাকেজ তৈরি করা যাবে?</span>
                        <i id="faq-icon-5" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-5" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        অবশ্যই। হোয়াটসঅ্যাপে আপনার বাজেট, দিনসংখ্যা ও পছন্দের স্পট জানান — ৩০ মিনিটে কাস্টম প্ল্যান পাবেন।
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-sm transition duration-300">
                    <button onclick="toggleFaq(6)" class="w-full bg-slate-50/50 hover:bg-slate-50 p-5 flex items-center justify-between font-bold text-xs md:text-sm text-slate-800 text-left focus:outline-none border-0 cursor-pointer">
                        <span>পেমেন্ট কীভাবে করব?</span>
                        <i id="faq-icon-6" class="fa-solid fa-chevron-down text-emerald-600 transition-transform duration-300 text-xs"></i>
                    </button>
                    <div id="faq-body-6" class="hidden p-5 bg-white border-t border-slate-100 text-xs text-slate-600 leading-relaxed">
                        বিকাশ, নগদ, রকেট, ব্যাংক ট্রান্সফার বা কার্ড — যেকোনো মাধ্যমে। পেমেন্ট রিসিট সাথে সাথে হোয়াটসঅ্যাপে পাবেন।
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INSTANT WHATSAPP BOOKING SECTION -->
    <section id="booking-form-section" class="container-custom py-16 max-w-4xl">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 md:p-10">
            <div class="text-center mb-8">
                <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">বুকিং এবং কোয়েরি</span>
                <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-1">ভ্রমণের জন্য প্রস্তুত? এখনই হোয়াটসঅ্যাপে মেসেজ দিন</h3>
                <p class="text-slate-500 mt-2 text-xs md:text-sm">নিচের তথ্যগুলো পূরণ করুন। এটি স্বয়ংক্রিয়ভাবে একটি চমৎকার মেসেজ সাজিয়ে সরাসরি আমাদের বুকিং ডেস্কে হোয়াটসঅ্যাপে পাঠিয়ে দেবে।</p>
            </div>

            <form onsubmit="triggerWhatsAppBooking(event)" class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">আপনার নাম:</label>
                        <input type="text" id="wa-name" placeholder="যেমন: রাইহান চৌধুরী" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">মোবাইল নম্বর:</label>
                        <input type="text" id="wa-phone" placeholder="যেমন: 017XXXXXXXX" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">যাত্রা শুরুর বিভাগ:</label>
                        <select id="wa-division" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                            <option value="Dhaka">ঢাকা</option>
                            <option value="Chittagong">চট্টগ্রাম</option>
                            <option value="Rajshahi">রাজশাহী</option>
                            <option value="Khulna">খুলনা</option>
                            <option value="Barisal">বরিশাল</option>
                            <option value="Rangpur">রংপুর</option>
                            <option value="Mymensingh">ময়মনসিংহ</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">ভ্রমণের তারিখ:</label>
                        <input type="date" id="wa-date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">ভ্রমণকারী সংখ্যা:</label>
                        <input type="number" id="wa-guests" value="2" min="1" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">বিশেষ কোনো চাহিদা (ঐচ্ছিক):</label>
                    <textarea id="wa-note" rows="3" placeholder="হোটেল বুকিং, গাইড প্রয়োজন কিংবা খাবার সংক্রান্ত বিশেষ কোনো গাইডলাইন থাকলে এখানে লিখুন..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-3.5 rounded-xl transition shadow-md flex items-center justify-center gap-2 text-xs uppercase tracking-wider transform hover:-translate-y-0.5 border-0 cursor-pointer">
                    <i class="fa-brands fa-whatsapp text-lg"></i> হোয়াটসঅ্যাপের মাধ্যমে বুকিং পাঠান
                </button>
            </form>
        </section>
</div>

<script>
    // Front page Roadmap Selector Data
    const divisionRoadmaps = {
        dhaka: {
            title: "ঢাকা থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "দেশের রাজধানী ঢাকা থেকে সিলেট যাওয়ার সবচেয়ে দ্রুত ও আধুনিক যাতায়াত রুটসমূহ।",
            bus: "ঢাকা সায়েদাবাদ বা রাজারবাগ বাস টার্মিনাল থেকে প্রিমিয়াম এসি বাস (গ্রিন লাইন, হানিф, এনা, শ্যামলী) যোগে সিলেট কদমতলী পৌঁছান (ভাড়া: ৭০০ - ১,৫০০ টাকা; সময়: ৫-৬ ঘণ্টা)।",
            train: "কমলাপুর রেলওয়ে স্টেশন থেকে কালনী, জয়ন্তিকা বা উপবন এক্সপ্রেসে চেপে সরাসরি সিলেট রেলওয়ে স্টেশন চলে আসুন (ভাড়া: ৩৭৫ - ১,২০০ টাকা; সময়: ৬-৭ ঘণ্টা)।",
            local: "সিলেট শহর থেকে সরাসরি জাফলং যাওয়ার জন্য সোবহানীঘাট থেকে লোকাল বাস (ভাড়া: ১২০ টাকা) অথবা আম্বরখানা থেকে শেয়ার্ড সিএনজি নিতে পারেন।"
        },
        chittagong: {
            title: "চট্টগ্রাম থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "পাহাড়ি আঁকাবাঁকা সৌন্দর্য এবং দেশের পূর্ব অঞ্চলের চা বাগান হয়ে সিলেট পৌঁছানোর চমৎকার রুট।",
            bus: "চট্টগ্রামের দামপাড়া কাউন্টার থেকে সরাসরি সৌদিয়া, এস.আলম বা এনা পরিবহনে উঠে পড়ুন (ভাড়া: ৯০০ - ১,৮০০ টাকা; সময়: ৮-৯ ঘণ্টা)।",
            train: "চট্টগ্রাম রেল স্টেশন থেকে পাহাড়িকা অথবা উদয়ন এক্সপ্রেসে করে আরামদায়কভাবে সিলেট রেলস্টেশন পৌঁছান। স্নিগ্ধা ক্লাসের টিকিট বুকিং করা ভালো হবে।",
            local: "সিলেট রেলস্টেশন থেকে জাফলং জিরো পয়েন্টে যাওয়ার জন্য সরাসরি সিএনজি বা কার রিজার্ভ করতে পারেন।"
        },
        rajshahi: {
            title: "রাজশাহী থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "ঐতিহাসিক সিল্ক সিটি থেকে পাথর এবং ঝর্ণার শহর সিলেটে আসার রুট গাইড।",
            bus: "রাজশাহী সেন্ট্রাল বাস টার্মিনাল থেকে দেশ ট্রাভেলস অথবা ন্যাশনাল এন্টারপ্রাইজের সরাসরি ডে-নাইট বাস সার্ভিস চালু আছে (ভাড়া: ১,১০০ - ১,৮০০ টাকা; সময়: ১০-১২ ঘণ্টা)।",
            train: "রাজশাহী থেকে সরাসরি ট্রেন নেই। জয়দেবপুর জংশনে এসে ট্রেন পরিবর্তন করে সিলেট-গামী ট্রেনে উঠতে হবে।",
            local: "সিলেট কদমতলী পৌঁছানোর পর লোকাল শেয়ার্ড মাইক্রোবাসের মাধ্যমে সরাসরি জাফলং যাওয়া সম্ভব।"
        },
        khulna: {
            title: "খুলনা থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "পদ্মা সেতু পার হয়ে রূপসা ও সুন্দরবনের খুলনা বিভাগ থেকে সিলেটে আসার রুট গাইড।",
            bus: "টুঙ্গিপাড়া এক্সপ্রেস অথবা হানিফ এন্টারপ্রাইজে চড়ে চমৎকারভাবে সরাসরি সিলেট চলে আসতে পারেন (ভাড়া: ১,৫০০ - ২,২০০ টাকা; সময়: ১২-১৪ ঘণ্টা)।",
            train: "খুলনা থেকে ট্রেনে কমলাপুর স্টেশন হয়ে কানেক্টিং ট্রেনে সিলেটে আসতে হবে।",
            local: "সিলেটের কদমতলী বাস টার্মিনাল থেকে সরাসরি রিজার্ভ গাড়ি নিয়ে সরাসরি জাফলং চলে যেতে পারেন।"
        },
        barisal: {
            title: "বরিশাল থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "দক্ষিণাঞ্চলের জলপথ ও পদ্মা সেতু পাড়ি দিয়ে চায়ের দেশ সিলেটে আসার উপায়।",
            bus: "বরিশাল নথুল্লাবাদ টার্মিনাল থেকে সাকুরা ও হানিফ পরিবহনে করে সরাসরি সিলেটে চলে আসতে পারবেন (ভাড়া: ১,১০০ - ১,৯০০ টাকা; সময়: ১১-১৩ ঘণ্টা)।",
            train: "প্রথমে লঞ্চ যোগে ঢাকা সদরঘাট এসে কমলাপুর থেকে ট্রেনে চেপে সিলেটে চলে আসুন।",
            local: "সিলেটে আম্বরখানা পয়েন্ট থেকে লোকাল শেয়ার্ড সিএনজি যোগে সহজেই জাফলং বাজারে পৌঁছানো যাবে।"
        },
        rangpur: {
            title: "রংপুর থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "উত্তরের সীমান্ত ও হিমালয় কন্যা অঞ্চল রংপুর থেকে সিলেটের পাহাড়ি ঝর্ণার পথ।",
            bus: "রংপুর টার্মিনাল থেকে হানিফ বা এনা যোগে সরাসরি সিলেট কদমতলী পৌঁছানো যায় (ভাড়া: ১,০০০ - ১,৮০০ টাকা; সময়: ১১-১৩ ঘণ্টা)।",
            train: "প্রথমে জয়দেবপুর জংশনে এসে নামুন, সেখান থেকে সিলেটের চমৎকার সব ট্রেনে কানেক্ট করুন।",
            local: "সিলেট শহর থেকে শালুটিকর হয়ে সরাসরি ট্যাক্সি করে জাফলং জিরো পয়েন্টে পৌঁছানো যায়।"
        },
        mymensingh: {
            title: "ময়মনসিংহ থেকে সিলেট ও জাফলং রুট ম্যাপ",
            desc: "সবচেয়ে কম দূরত্বের চমৎকার এবং সবুজ প্রাকৃতিক পথে সিলেট যাতায়াতের রুট।",
            bus: "ময়মনসিংহ বাস টার্মিনাল থেকে এনা পরিবহনে বা লোকাল বাসে চড়ে সরাসরি সিলেট আসতে পারবেন (ভাড়া: ৫০০ - ৮০০ টাকা; সময়: ৬ ঘণ্টা)।",
            train: "ময়মনসিংহ থেকে ট্রেন বাসে ঢাকা এসে কমলাপুর থেকে ট্রেনে চেপে সিলেটে চলে আসুন।",
            local: "সিলেটের সোবহানীঘাট বাস টার্মিনাল থেকে লোকাল শেয়ার্ড মাইক্রোবাসে করে সরাসরি জাফলং যেতে পারেন।"
        }
    };

    // Client-side scroll to blog search trigger
    function scrollToBlogAndSearch(event) {
        if (event.key === "Enter") {
            const blogSection = document.getElementById("travel-blog");
            if (blogSection) {
                blogSection.scrollIntoView({ behavior: "smooth" });
                const mainSearch = document.getElementById("blog-search-input");
                if (mainSearch) {
                    mainSearch.value = event.target.value;
                    mainSearch.focus();
                    if (typeof handleSearchInput === "function") {
                        handleSearchInput();
                    }
                }
            }
        }
    }

    // High Fidelity AJAX Search Engine for Hero Card (Fixed Live Search)
    let searchDebounceTimer;
    function handleHeroLiveSearch(val) {
        clearTimeout(searchDebounceTimer);
        const resultsBox = document.getElementById('hero-live-search-results');
        
        if (!val || val.trim().length < 2) {
            resultsBox.innerHTML = '';
            resultsBox.classList.add('hidden');
            return;
        }

        resultsBox.classList.remove('hidden');
        resultsBox.innerHTML = '<div class="p-4 text-xs text-slate-500 text-center"><i class="fa-solid fa-circle-notch fa-spin text-emerald-600 mr-2"></i>অনুসন্ধান করা হচ্ছে...</div>';

        searchDebounceTimer = setTimeout(async () => {
            const formData = new FormData();
            formData.append('action', 'jaflong_travel_ajax_search');
            formData.append('query', val);

            try {
                const response = await fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();

                if (result.success && result.data.posts.length > 0) {
                    let html = '';
                    result.data.posts.forEach(post => {
                        html += `
                            <a href="${post.permalink}" class="flex items-center gap-3 p-2.5 hover:bg-slate-50 rounded-xl transition duration-150 border-b border-slate-100 last:border-0">
                                <img src="${post.image}" alt="${post.title}" class="w-10 h-10 object-cover rounded-lg shrink-0">
                                <div class="overflow-hidden">
                                    <h5 class="text-xs font-bold text-slate-900 truncate leading-snug">${post.title}</h5>
                                    <p class="text-[10px] text-slate-500 truncate leading-relaxed mt-0.5">${post.excerpt}</p>
                                </div>
                            </a>
                        `;
                    });
                    resultsBox.innerHTML = html;
                } else {
                    resultsBox.innerHTML = '<div class="p-4 text-xs text-slate-500 text-center">কোনো তথ্য পাওয়া যায়নি!</div>';
                }
            } catch (err) {
                console.error(err);
                resultsBox.innerHTML = '<div class="p-4 text-xs text-red-500 text-center">সার্ভার সংযোগে ত্রুটি ঘটেছে!</div>';
            }
        }, 300);
    }

    // Toggle logic for FAQ Accordion matching image_23cbec.png mechanics
    function toggleFaq(id) {
        const faqBody = document.getElementById('faq-body-' + id);
        const faqIcon = document.getElementById('faq-icon-' + id);
        
        if (faqBody.classList.contains('hidden')) {
            // Close other FAQs first for premium UX accordion behavior
            for (let i = 1; i <= 6; i++) {
                const body = document.getElementById('faq-body-' + i);
                const icon = document.getElementById('faq-icon-' + i);
                if (body && icon) {
                    body.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            }
            // Open selected FAQ
            faqBody.classList.remove('hidden');
            faqIcon.style.transform = 'rotate(180deg)';
        } else {
            faqBody.classList.add('hidden');
            faqIcon.style.transform = 'rotate(0deg)';
        }
    }

    // Modern Javascript String Concatenation to avoid backslash escaping issues inside PHP/WordPress environment
    function selectDivision(divKey) {
        document.querySelectorAll('.div-tab-btn').forEach(function(btn) {
            btn.className = "div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-white text-slate-600 hover:bg-slate-100 border border-slate-200";
        });

        const targetBtn = document.getElementById('div-btn-' + divKey);
        if (targetBtn) {
            targetBtn.className = "div-tab-btn px-5 py-3 rounded-xl text-xs font-bold shadow-sm transition-all duration-300 bg-emerald-600 text-white border border-emerald-600";
        }

        const data = divisionRoadmaps[divKey];
        const placeholder = document.getElementById('dynamic-roadmap-placeholder');
        if (placeholder && data) {
            placeholder.innerHTML = 
                '<div class="mb-6">' +
                    '<span class="bg-emerald-100 text-emerald-800 text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider">সক্রিয় রুট গাইড</span>' +
                    '<h4 class="text-2xl font-extrabold text-slate-900 mt-2">' + data.title + '</h4>' +
                    '<p class="text-xs text-slate-500 mt-1">' + data.desc + '</p>' +
                '</div>' +
                '<div class="grid md:grid-cols-3 gap-6">' +
                    '<div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">' +
                        '<h5 class="font-bold text-slate-800 text-xs mb-2"><i class="fa-solid fa-bus text-amber-500"></i> সরাসরি বাস রুট</h5>' +
                        '<p class="text-xs text-slate-600 leading-relaxed">' + data.bus + '</p>' +
                    '</div>' +
                    '<div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">' +
                        '<h5 class="font-bold text-slate-800 text-xs mb-2"><i class="fa-solid fa-train text-blue-500"></i> রেলওয়ে কানেকশন</h5>' +
                        '<p class="text-xs text-slate-600 leading-relaxed">' + data.train + '</p>' +
                    '</div>' +
                    '<div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">' +
                        '<h5 class="font-bold text-slate-800 text-xs mb-2"><i class="fa-solid fa-map-pin text-emerald-500"></i> সিলেট থেকে জাফলং</h5>' +
                        '<p class="text-xs text-slate-600 leading-relaxed">' + data.local + '</p>' +
                    '</div>' +
                '</div>';
        }
    }

    function triggerWhatsAppBooking(event) {
        event.preventDefault();
        const name = document.getElementById('wa-name').value;
        const phone = document.getElementById('wa-phone').value;
        const division = document.getElementById('wa-division').value;
        const date = document.getElementById('wa-date').value;
        const guests = document.getElementById('wa-guests').value;
        const note = document.getElementById('wa-note').value;

        let messageText = "*নতুন ভ্রমণের তথ্য ও বুকিং রিকোয়েস্ট*\n" +
                          "-------------------------------\n" +
                          "*নাম:* " + name + "\n" +
                          "*মোবাইল নম্বর:* " + phone + "\n" +
                          "*যাত্রা শুরুর বিভাগ:* " + division + "\n" +
                          "*ভ্রমণের তারিখ:* " + date + "\n" +
                          "*ভ্রমণকারী সংখ্যা:* " + guests + "\n";
        
        if (note && note.trim() !== "") {
            messageText += "*विशेष চাহিদা:* " + note;
        }

        const waUrl = "https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=" + encodeURIComponent(messageText);
        window.open(waUrl, '_blank');
    }

    document.addEventListener("DOMContentLoaded", function() {
        selectDivision('dhaka');
        
        // Hide hero search results when clicked outside
        document.addEventListener('click', function(e) {
            const searchBox = document.getElementById('hero-local-search');
            const resultsBox = document.getElementById('hero-live-search-results');
            if (e.target !== searchBox && e.target !== resultsBox && resultsBox) {
                resultsBox.classList.add('hidden');
            }
        });
    });
</script>

<?php get_footer(); ?>