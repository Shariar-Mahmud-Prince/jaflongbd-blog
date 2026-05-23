<?php
/**
 * Template Name: Travel Budget Calculator (Bangla Version)
 * A fully customizable local budget estimation engine with CTA forms in Bengali.
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
        
        <!-- Header Banner -->
        <div class="text-center mb-12">
            <span class="bg-emerald-100 text-emerald-800 text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider">স্মার্ট ট্রাভেল প্ল্যানার</span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-950 mt-4 tracking-tight">সিলেট ও জাফলং বাজেট ক্যালকুলেটর</h1>
            <p class="text-sm md:text-base text-slate-500 mt-3 max-w-2xl mx-auto leading-relaxed">অতিরিক্ত খরচ বা দালালের খপ্পর এড়ান। আপনার ভ্রমণের প্যারামিটার সিলেক্ট করে লোকাল যাতায়াত, বোট ভাড়া, খাওয়া এবং গাইডের খরচ হিসাব করুন এক ক্লিকে।</p>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 mb-16">
            <!-- Parameter Selections -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm space-y-6">
                <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">ভ্রমণের বিবরণ সেট করুন</h3>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">ভ্রমণকারী সংখ্যা:</label>
                        <input type="number" id="calc-travelers-page" value="2" min="1" max="50" onchange="performLivePageCalculation()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">ভ্রমণের মেয়াদ (দিন):</label>
                        <select id="calc-days-page" onchange="performLivePageCalculation()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                            <option value="1">ডে ট্যুর (১ দিন)</option>
                            <option value="2" selected>উইকএন্ড ট্যুর (২ দিন)</option>
                            <option value="3">ইন-ডেপথ ট্যুর (৩ দিন)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">লোকাল ট্রান্সপোর্ট:</label>
                    <select id="calc-transit-page" onchange="performLivePageCalculation()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                        <option value="local-bus">লোকাল বাস (জনপ্রতি ১২০ টাকা)</option>
                        <option value="shared-cng">শেয়ার্ড সিএনজি (জনপ্রতি ২৫০ টাকা)</option>
                        <option value="reserved-cng" selected>রিজার্ভ সিএনজি (২,০০০ টাকা ফ্লাট)</option>
                        <option value="reserved-sedan">রিজার্ভ কার / নোয়াহ (৪,০০০ টাকা ফ্লাট)</option>
                        <option value="reserved-microbus">রিজার্ভ মাইক্রোবাস / হায়েস (৬,০০০ টাকা ফ্লাট)</option>
                    </select>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">হোটেল বা রিসোর্ট ক্যাটাগরি:</label>
                        <select id="calc-hotel-page" onchange="performLivePageCalculation()" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                            <option value="none">প্রয়োজন নেই (১ দিনের ডে ট্যুর)</option>
                            <option value="budget">বাজেট গেস্ট হাউজ (রাত্রিপ্রতি ১,৫০০ টাকা)</option>
                            <option value="standard" selected>স্ট্যান্ডার্ড এসি হোটেল (রাত্রিপ্রতি ৩,৫০০ টাকা)</option>
                            <option value="luxury">লাক্সারি রিসোর্ট (রাত্রিপ্রতি ৮,০০০ টাকা)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">অতিরিক্ত সুবিধা:</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                                <input type="checkbox" id="calc-boat" checked onchange="performLivePageCalculation()" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                জাফলং বোট ভাড়া (৮০০ টাকা ফ্লাট)
                            </label>
                            <label class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                                <input type="checkbox" id="calc-guide" onchange="performLivePageCalculation()" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                লোকাল ট্যুর গাইড (১,৫০০ টাকা/দিন)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calculation Output display card -->
            <div class="lg:col-span-5 bg-emerald-950 text-white rounded-3xl p-6 md:p-8 flex flex-col justify-between shadow-xl relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-emerald-50 rounded-full filter blur-3xl opacity-10"></div>
                
                <div>
                    <h3 class="text-lg font-bold text-emerald-300 border-b border-emerald-900 pb-3 mb-6">খরচের আনুমানিক বিবরণ</h3>
                    <div class="space-y-4 text-xs">
                        <div class="flex justify-between border-b border-emerald-900 pb-2">
                            <span class="text-emerald-200">লোকাল যাতায়াত খরচ:</span>
                            <span id="breakdown-transport" class="font-bold">৳ ০</span>
                        </div>
                        <div class="flex justify-between border-b border-emerald-900 pb-2">
                            <span class="text-emerald-200">হোটেল বা গেস্ট হাউজ:</span>
                            <span id="breakdown-hotel" class="font-bold">৳ ০</span>
                        </div>
                        <div class="flex justify-between border-b border-emerald-900 pb-2">
                            <span class="text-emerald-200">খাবারের আনুমানিক খরচ (৩ বেলা):</span>
                            <span id="breakdown-food" class="font-bold">৳ ০</span>
                        </div>
                        <div class="flex justify-between border-b border-emerald-900 pb-2">
                            <span class="text-emerald-200">নৌকা ও গাইড খরচ:</span>
                            <span id="breakdown-activities" class="font-bold">৳ ০</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-emerald-900 pt-6">
                    <p class="text-xs text-emerald-300 uppercase tracking-widest font-semibold">সর্বমোট খসড়া বাজেট</p>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span id="calc-total-display" class="text-4xl md:text-5xl font-black text-amber-400">৳ ০</span>
                        <span class="text-xs text-emerald-300 font-semibold">টাকা</span>
                    </div>
                    <p class="text-[10px] text-emerald-400 mt-2">ডিসক্লেইমার: উপরোক্ত খরচ সিলেটের বর্তমান লোকাল মার্কেট রেট অনুযায়ী হিসাব করা হয়েছে।</p>
                </div>
            </div>
        </div>

        <!-- WHATSAPP BOOKING SECTION -->
        <section id="booking-form-section" class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-slate-100 p-8 md:p-12">
            <div class="text-center mb-10">
                <span class="text-emerald-700 font-extrabold text-xs uppercase tracking-widest">বুকিং এবং কোয়েরি</span>
                <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-1">ভ্রমণের জন্য প্রস্তুত? এখনই হোয়াটসঅ্যাপে মেসেজ দিন</h3>
                <p class="text-slate-500 mt-2 text-xs md:text-sm">নিচের তথ্যগুলো পূরণ করুন। এটি স্বয়ংক্রিয়ভাবে একটি চমৎকার মেসেজ সাজিয়ে সরাসরি আমাদের বুকিং ডেস্কে হোয়াটসঅ্যাপে পাঠিয়ে দেবে।</p>
            </div>

            <form onsubmit="triggerWhatsAppBooking(event)" class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">আপনার নাম:</label>
                        <input type="text" id="wa-name" placeholder="যেমন: রাইহান চৌধুরী" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">মোবাইল নম্বর:</label>
                        <input type="text" id="wa-phone" placeholder="যেমন: 017XXXXXXXX" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">যাত্রা শুরুর বিভাগ:</label>
                        <select id="wa-division" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
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
                        <input type="date" id="wa-date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">ভ্রমণকারী সংখ্যা:</label>
                        <input type="number" id="wa-guests" value="2" min="1" required class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1.5">বিশেষ কোনো চাহিদা (ঐচ্ছিক):</label>
                    <textarea id="wa-note" rows="3" placeholder="হোটেল বুকিং, গাইড প্রয়োজন কিংবা খাবার সংক্রান্ত বিশেষ কোনো গাইডলাইন থাকলে এখানে লিখুন..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 px-4 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-4 rounded-xl transition shadow-md flex items-center justify-center gap-2 text-xs uppercase tracking-wider transform hover:-translate-y-0.5 border-0 cursor-pointer">
                    <i class="fa-brands fa-whatsapp text-lg"></i> হোয়াটসঅ্যাপের মাধ্যমে বুকিং পাঠান
                </button>
            </form>
        </section>

    </div>
</main>

<script>
    function performLivePageCalculation() {
        const travelers = parseInt(document.getElementById('calc-travelers-page').value) || 1;
        const days = parseInt(document.getElementById('calc-days-page').value) || 1;
        const transit = document.getElementById('calc-transit-page').value;
        const hotelOption = document.getElementById('calc-hotel-page').value;
        const boatOn = document.getElementById('calc-boat').checked;
        const guideOn = document.getElementById('calc-guide').checked;

        // 1. Calculate Transport
        let transportCost = 0;
        if (transit === 'local-bus') {
            transportCost = travelers * 120;
        } else if (transit === 'shared-cng') {
            transportCost = travelers * 250;
        } else if (transit === 'reserved-cng') {
            transportCost = Math.ceil(travelers / 5) * 2000;
        } else if (transit === 'reserved-sedan') {
            transportCost = Math.ceil(travelers / 4) * 4000;
        } else if (transit === 'reserved-microbus') {
            transportCost = Math.ceil(travelers / 10) * 6000;
        }
        transportCost = transportCost * Math.ceil(days / 2);

        // 2. Calculate Accommodation
        let hotelCost = 0;
        const nights = days - 1;
        if (nights > 0 && hotelOption !== 'none') {
            let ratePerRoom = 0;
            if (hotelOption === 'budget') ratePerRoom = 1500;
            else if (hotelOption === 'standard') ratePerRoom = 3500;
            else if (hotelOption === 'luxury') ratePerRoom = 8000;

            const roomsNeeded = Math.ceil(travelers / 2);
            hotelCost = roomsNeeded * ratePerRoom * nights;
        }

        // 3. Calculate Food (Roughly BDT 500 per person per day)
        const foodCost = travelers * 500 * days;

        // 4. Activities & Guides
        let activitiesCost = 0;
        if (boatOn) {
            activitiesCost += Math.ceil(travelers / 6) * 800; // 1 boat fits 6 people
        }
        if (guideOn) {
            activitiesCost += 1500 * days;
        }

        // Update breakdowns
        document.getElementById('breakdown-transport').innerText = `৳ ${transportCost.toLocaleString()}`;
        document.getElementById('breakdown-hotel').innerText = `৳ ${hotelCost.toLocaleString()}`;
        document.getElementById('breakdown-food').innerText = `৳ ${foodCost.toLocaleString()}`;
        document.getElementById('breakdown-activities').innerText = `৳ ${activitiesCost.toLocaleString()}`;

        // Update Grand Total
        const total = transportCost + hotelCost + foodCost + activitiesCost;
        document.getElementById('calc-total-display').innerText = `৳ ${total.toLocaleString()}`;

        // Keep travelers and dates inputs matched with booking form fields dynamically
        const waGuests = document.getElementById('wa-guests');
        if(waGuests) waGuests.value = travelers;
    }

    function triggerWhatsAppBooking(event) {
        event.preventDefault();
        const name = document.getElementById('wa-name').value;
        const phone = document.getElementById('wa-phone').value;
        const division = document.getElementById('wa-division').value;
        const date = document.getElementById('wa-date').value;
        const guests = document.getElementById('wa-guests').value;
        const note = document.getElementById('wa-note').value;

        const messageText = `*নতুন ভ্রমণের তথ্য ও বুকিং রিকোয়েস্ট (খরচ ক্যালকুলেটর)*\n` +
                            `-------------------------------\n` +
                            `*নাম:* ${name}\n` +
                            `*মোবাইল নম্বর:* ${phone}\n` +
                            `*যাত্রা শুরুর বিভাগ:* ${division}\n` +
                            `*ভ্রমণের তারিখ:* ${date}\n` +
                            `*ভ্রমণকারী সংখ্যা:* ${guests}\n` +
                            `${note ? `*বিশেষ চাহিদা:* ${note}` : ''}`;

        const waUrl = `https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>?text=${encodeURIComponent(messageText)}`;
        window.open(waUrl, '_blank');
    }

    document.addEventListener("DOMContentLoaded", function() {
        performLivePageCalculation();
    });
</script>

<?php get_footer(); ?>