<!-- Navbar -->
<div
    class="white_nav_bottom z-100 text-gray-900 px-4 md:px-[120px] py-4 lg:py-8 flex justify-between items-center relative">
    <!-- Hamburger Button (Mobile) -->
    <button id="menu-btn" class="text-3xl md:hidden focus:outline-none">
        ☰
    </button>

    <!-- Navigation Menu -->
    <ul id="nav-menu"
        class="fixed inset-0 flex flex-col items-center justify-center h-screen transition-transform duration-300 ease-in-out transform -translate-x-full bg-white HeadernavItems z-300 md:bg-transparent md:static md:h-auto md:flex-row md:space-x-12 md:translate-x-0">

        <!-- Close Button -->
        <button id="close-menu" class="absolute text-3xl top-5 right-5 md:hidden">
            ✖
        </button>

        <li><a href="{{ route('frontend.home') }}">Home</a></li>
        <li class="relative group">
            <span class="cursor-pointer" id="collection-toggle">Collection</span>

            <!-- Dropdown Menu -->
            <div id="collection-dropdown"
                class="lg:absolute lg:top-full lg:left-0 lg:w-auto lg:min-w-[700px] lg:max-w-[90vw]
                lg:max-h-[80vh] lg:overflow-y-auto lg:mt-2 lg:bg-white lg:z-50 lg:hidden
                lg:group-hover:flex lg:flex-col lg:shadow-lg border border-gray-200 rounded-lg
                hidden md:absolute md:left-0 md:hidden">

                <div
                    class="container grid grid-cols-1 gap-4 p-5 mx-auto bg-white sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                    @php
                        $firstSixCategories = $categories->take(6);
                    @endphp

                    @foreach ($firstSixCategories as $category)
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold text-black whitespace-nowrap">{{ $category->category_name }}
                            </h3>
                            <ul class="space-y-1 text-gray-600">
                                @foreach ($category->subcategories->take(6) as $subcategory)
                                    <li>
                                        <a href="{{ route('frontend.subcategory.products', $subcategory->id) }}"
                                            class="block hover:text-black hover:underline whitespace-nowrap">
                                            {{ $subcategory->subcategory_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>




        <li>

            <a href="{{ route('frontend.aboutus') }}">About Us</a>
        </li>


        <li>
            <a href="{{ session()->has('company_user_id') ? route('frontend.specialproduct') : route('frontend.login') }}"
                class="transition hover:text-purple-400">
                Special Production
            </a>
        </li>

        <div class="md:flex md:flex-col hidden md:flex-row items-start md:items-center gap-1 md:gap-5">
            <span class="text-base text-white">Select Language</span>
            <div id="google_translate_element"></div>
        </div>

    </ul>

    <!-- Download Button -->
    @if (session()->has('company_user_id'))
        <div class="downloadPricelist_button">
            <a href="{{ asset('frontend/assets/pdf/my_catalog.pdf') }}" target="_blank"
                class="bg-[#F4F4F4] px-[13px] py-[12px] text-[#E2001A] flex justify-between items-center gap-2 text-[12px] rounded-xl">
                Download Catalog
                <img src="{{ asset('frontend/assets/images/basil_download-outline.svg') }}" alt="">
            </a>
        </div>
    @endif


</div>


<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,es,de,hi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            },
            'google_translate_element'
        );
    }
</script>
<script>
    // Remove the top iframe (banner)
    document.addEventListener("DOMContentLoaded", function() {
        let interval = setInterval(function() {
            const bannerFrame = document.querySelector(".goog-te-banner-frame");
            if (bannerFrame) {
                bannerFrame.style.display = "none";
                document.body.style.top = "0px";
                clearInterval(interval);
            }
        }, 100); // Check every 100ms until it's gone
    });
</script>
<script>
    // Keep removing banner if it appears dynamically
    function removeGoogleTranslateBanner() {
        let banner = document.querySelector('.goog-te-banner-frame');
        let htmlEl = document.documentElement;

        if (banner) {
            banner.style.display = 'none';
        }

        if (htmlEl.style.top) {
            htmlEl.style.top = '0px';
        }

        document.body.style.top = '0px';
    }

    // Run immediately and keep checking every second
    setInterval(removeGoogleTranslateBanner, 1000);
</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

{{--  <style>
    /* Hide top frame (Google Translate toolbar) */
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    /* Prevent body from getting pushed down */
    body {
        top: 0px !important;
        position: relative !important;
    }

    /* Optional: hide any leftover Google elements */
    .goog-te-gadget-icon,
    .goog-te-menu-value span,
    .goog-te-menu-frame,
    .goog-te-balloon-frame {
        display: none !important;
    }
</style>  --}}

<style>
