<?php
/**
 * The template for displaying the footer (Fully Translated).
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

$footer_logo = get_theme_mod( 'jaflong_travel_footer_logo' );
?>

    <footer class="bg-emerald-950 text-emerald-100 py-16 border-t border-emerald-900 mt-16">
        <div class="container-custom">
            <div class="grid md:grid-cols-3 gap-10">
                <div>
                    <div class="mb-4">
                        <?php if ( ! empty( $footer_logo ) ) : ?>
                            <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?> লোগো" class="h-12 w-auto object-contain">
                        <?php else : ?>
                            <h4 class="text-xl font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-mountain-sun text-emerald-400"></i> জাফলংট্রাভেল
                            </h4>
                        <?php endif; ?>
                    </div>
                    <p class="text-xs text-emerald-300 leading-relaxed max-w-sm">সিলেটের সবুজ চা বাগান, স্বচ্ছ পানির নদী, ঝর্ণা এবং জাফলংয়ের সৌন্দর্যে আপনার প্রতিটি ভ্রমণ নিরাপদ ও আনন্দদায়ক করতে আমাদের এই ডিজিটাল গাইডলাইন।</p>
                </div>
                <div>
                    <h4 class="text-md font-bold text-white mb-4">দ্রুত নেভিগেশন</h4>
                    <ul class="space-y-3 text-xs text-emerald-300">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white hover:underline transition">হোম ও রোডম্যাপ</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blogs/' ) ); ?>" class="hover:text-white hover:underline transition">ভ্রমণ ব্লগ ও তাজা খবর</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/airport-route/' ) ); ?>" class="hover:text-white hover:underline transition">এয়ারপোর্ট টু জাফলং রুট</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/travel-calculator/' ) ); ?>" class="hover:text-white hover:underline transition">ভ্রমণ খরচ ক্যালকুলেটর</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-bold text-white mb-4">প্রয়োজনীয় লিংক ও তথ্য</h4>
                    <ul class="space-y-3 text-xs text-emerald-300 font-medium">
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-white hover:underline transition">যোগাযোগ করুন</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-white hover:underline transition">প্রাইভেসি পলিসি</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-emerald-900 mt-12 pt-8 text-center text-xs text-emerald-400">
                <p>&copy; <?php echo date('Y'); ?> জাফলংট্রাভেল। সর্বস্বত্ব সংরক্ষিত। সিলেটের পর্যটনকে ছড়িয়ে দিতে আমাদের এই ক্ষুদ্র প্রচেষ্টা। ❤️</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>