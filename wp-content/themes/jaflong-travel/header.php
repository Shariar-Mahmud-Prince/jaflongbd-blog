<?php
/**
 * The Header for our theme (100% Mobile Responsive with Hamburger Toggle Menu).
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

$header_logo = get_theme_mod( 'jaflong_travel_header_logo' );
$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Main Sticky Navigation Bar with Custom 1320px Max Width Wrapper -->
<header class="bg-emerald-950 text-white shadow-lg sticky top-0 z-50">
    <div class="container-custom py-4 flex flex-row justify-between items-center relative">
        <!-- Customizable Header Logo rendering -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center space-x-3 z-50">
            <?php if ( ! empty( $header_logo ) ) : ?>
                <img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php bloginfo( 'name' ); ?> লোগো" class="h-10 md:h-12 w-auto object-contain">
            <?php else : ?>
                <span class="bg-emerald-500 text-emerald-950 p-2.5 rounded-xl font-extrabold text-xl md:text-2xl shadow-md">
                    <i class="fa-solid fa-mountain-sun"></i>
                </span>
                <div>
                    <h1 class="text-xl md:text-2xl font-black tracking-tight m-0">জাফলং<span class="text-emerald-400">ট্রাভেল</span></h1>
                    <p class="text-[9px] md:text-[10px] text-emerald-300 -mt-1 uppercase tracking-wider font-semibold">সিলেট ভ্রমণের সম্পূর্ণ গাইড</p>
                </div>
            <?php endif; ?>
        </a>

        <!-- Mobile Hamburger Toggle Button (Target of image_24346b.png fix) -->
        <button id="hamburger-menu-btn" onclick="toggleMobileNavigationMenu()" type="button" class="lg:hidden text-white hover:text-emerald-300 focus:outline-none z-50 ml-auto p-2 border border-emerald-800 rounded-xl" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-xl md:text-2xl"></i>
        </button>

        <!-- Desktop Navigation Links (Responsive display) -->
        <nav class="hidden lg:flex items-center gap-4 text-sm font-semibold">
            <?php
            wp_nav_menu( array(
                'theme_location'       => 'menu-1',
                'container'            => false,
                'items_wrap'           => '%3$s',
                'fallback_cb'          => false,
                'depth'                => 1,
                'walker'               => new Jaflong_Travel_Header_Menu_Walker(),
                'jaflong_menu_context' => 'desktop',
            ) );
            ?>
            <a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=হ্যালো!%20আমি%20সিলেট%20এবং%20জাফলং%20ভ্রমণের%20জন্য%20বুকিং%20করতে%20চাই।" target="_blank" class="py-2.5 px-4 bg-emerald-700 hover:bg-emerald-600 rounded-xl text-white font-extrabold transition flex items-center justify-center gap-1.5 shadow-sm transform hover:-translate-y-0.5">
                <i class="fa-brands fa-whatsapp text-base text-emerald-300"></i> সরাসরি হোয়াটসঅ্যাপ বুকিং
            </a>
        </nav>

        <!-- Mobile Navigation Menu Container (Fully styled and hidden by default) -->
        <nav id="mobile-nav-panel" class="hidden absolute top-full left-0 right-0 bg-emerald-950/98 backdrop-blur-md p-6 border-t border-emerald-900 shadow-2xl flex flex-col gap-3 text-sm font-bold lg:hidden rounded-b-2xl z-40 animate-fade-in mx-4 mt-2">
            <?php
            wp_nav_menu( array(
                'theme_location'       => 'menu-1',
                'container'            => false,
                'items_wrap'           => '%3$s',
                'fallback_cb'          => false,
                'depth'                => 1,
                'walker'               => new Jaflong_Travel_Header_Menu_Walker(),
                'jaflong_menu_context' => 'mobile',
            ) );
            ?>
            <hr class="border-emerald-900 my-1">
            <a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=হ্যালো!%20আমি%20সিলেট%20এবং%20জাফলং%20ভ্রমণের%20জন্য%20বুকিং%20করতে%20চাই।" target="_blank" class="py-3.5 px-4 bg-emerald-600 hover:bg-emerald-500 rounded-xl text-white font-black text-center transition flex items-center justify-center gap-2 shadow-md">
                <i class="fa-brands fa-whatsapp text-lg"></i> সরাসরি হোয়াটসঅ্যাপ বুকিং
            </a>
        </nav>
    </div>
</header>

<script>
    // Responsive Mobile Menu Drawer Toggle Action
    function toggleMobileNavigationMenu() {
        const panel = document.getElementById('mobile-nav-panel');
        const icon = document.querySelector('#hamburger-menu-btn i');
        
        if (panel && panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            icon.className = 'fa-solid fa-xmark text-xl md:text-2xl';
        } else if (panel) {
            panel.classList.add('hidden');
            icon.className = 'fa-solid fa-bars text-xl md:text-2xl';
        }
    }
</script>
