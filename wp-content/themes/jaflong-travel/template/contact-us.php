<?php
/**
 * Template Name: Contact Us (Fully Translated to Bangla with Premium 1320px layout)
 * Highly responsive SEO Contact Page within 1320px containers.
 *
 * @package JaflongTravel_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

get_header(); 

$whatsapp_num = get_theme_mod( 'jaflong_travel_whatsapp_number', '8801700000000' );
?>

<main class="bg-slate-50 min-h-screen py-16 px-4 font-sans">
    <div class="container-custom">
        
        <!-- Contact Page Header -->
        <div class="text-center mb-12">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-4 py-1.5 rounded-full border border-emerald-200/50 shadow-sm inline-block">যোগাযোগ</span>
            <h1 class="text-3xl md:text-5xl font-black text-slate-950 mt-4 tracking-tight">আমাদের সাথে যোগাযোগ করুন</h1>
            <p class="text-sm md:text-base text-slate-500 mt-3 max-w-2xl mx-auto leading-relaxed">হোটেল রুম, ভাড়া গাড়ি, আবহাওয়া আপডেট কিংবা গাইড সংক্রান্ত যেকোনো প্রশ্ন থাকলে নির্দ্বিধায় আমাদের সাথে সরাসরি যোগাযোগ করুন।</p>
            <div class="w-12 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- Two Column 1320px Grid layout for maximum UI/UX balance -->
        <div class="grid lg:grid-cols-12 gap-8 items-stretch">
            
            <!-- Left Side: Office & Direct Contact Info (5 Cols) -->
            <div class="lg:col-span-5 bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm flex flex-col justify-between">
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">সরাসরি যোগাযোগের মাধ্যম</h3>
                    
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 text-emerald-700 w-11 h-11 rounded-xl flex items-center justify-center font-bold shadow-sm shrink-0">
                            <i class="fa-solid fa-phone text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">জরুরি হটলাইন নম্বর:</h4>
                            <p class="text-xs md:text-sm text-slate-500 mt-1">+880 1700-000000 (২৪/৭ ঘণ্টা খোলা)</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 text-emerald-700 w-11 h-11 rounded-xl flex items-center justify-center font-bold shadow-sm shrink-0">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">হোয়াটসঅ্যাপ বিজনেস সাপোর্ট:</h4>
                            <a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>" target="_blank" class="text-xs md:text-sm text-emerald-600 font-bold hover:underline mt-1 block">সরাসরি হোয়াটসঅ্যাপ চ্যাট শুরু করুন</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 text-emerald-700 w-11 h-11 rounded-xl flex items-center justify-center font-bold shadow-sm shrink-0">
                            <i class="fa-solid fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">অফিসিয়াল ইমেইল এড্রেস:</h4>
                            <p class="text-xs md:text-sm text-slate-500 mt-1">support@jaflongtravel.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 text-emerald-700 w-11 h-11 rounded-xl flex items-center justify-center font-bold shadow-sm shrink-0">
                            <i class="fa-solid fa-location-dot text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm md:text-base">হেড অফিস ঠিকানা:</h4>
                            <p class="text-xs md:text-sm text-slate-500 mt-1 leading-relaxed">Jaflong zero point , সিলেট, বাংলাদেশ।</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Clean Form Panel (7 Cols) -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-6 md:p-10 border border-slate-100 shadow-sm flex flex-col justify-between">
                <form onsubmit="handleContactSubmission(event)" class="space-y-4">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3 mb-4">আমাদের মেসেজ পাঠান</h3>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">আপনার সম্পূর্ণ নাম:</label>
                        <input type="text" id="contact-name" placeholder="যেমন: রাইহান চৌধুরী" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">আপনার ইমেইল ঠিকানা:</label>
                        <input type="email" id="contact-email" placeholder="example@gmail.com" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">আপনার বার্তা বা অনুসন্ধান:</label>
                        <textarea id="contact-message" rows="5" placeholder="আপনার প্রয়োজনীয় প্রশ্নটি এখানে বিস্তারিত লিখুন..." required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500 resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-4 rounded-xl transition shadow-md text-xs uppercase tracking-wider cursor-pointer border-0">বার্তা পাঠান</button>
                </form>
            </div>
            
        </div>
    </div>
</main>

<script>
    function handleContactSubmission(event) {
        event.preventDefault();
        const notification = document.createElement('div');
        notification.className = "fixed top-6 right-6 bg-emerald-600 text-white p-4 rounded-xl shadow-2xl z-50 text-xs font-bold";
        notification.innerText = "ধন্যবাদ! আপনার মেসেজটি আমাদের সাপোর্ট ম্যানেজারদের কাছে পাঠানো হয়েছে। আমরা দ্রুত যোগাযোগ করব।";
        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 4000);
        event.target.reset();
    }
</script>

<?php get_footer(); ?>