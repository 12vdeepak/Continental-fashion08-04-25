<!-- ==== TOPNAV_PURPLE - START ==== -->
<div class=" px-4 lg:px-[120px] purple_nav_top bg-[#54114C] h-22 text-[#FFFFFF]   flex justify-between items-center  ">
    <div class="text-lg font-bold logo lg:text-2xl md:text-xl sm:text-lg">
        <a href="{{ route('frontend.home') }}" class="text-white">
            Continental Fashion <br class="hidden sm:inline"> Merchandising UG
        </a>
    </div>


    <div class="flex items-center gap-5 sideContent">
        <!-- search bar  -->
        <div class="relative flex items-center">
            <!-- Full Search Bar (Only Visible on Larger Screens) -->
            <form action="{{ route('search') }}" method="GET"
                class="items-center hidden gap-3 px-3 py-2 bg-white border border-gray-300 lg:flex rounded-xl w-60">
                <img src="{{ asset('frontend/assets/images/search.svg') }}" alt="Search Icon"
                    class="w-10 lg:w-5 h-10 lg:h-5" style="filter: brightness(0);">
                <input type="text" name="query" placeholder="Search"
                    class="w-full text-black placeholder-gray-600 bg-transparent outline-none" required />
                <button type="submit" class="hidden"></button> <!-- Triggers form submission when Enter is pressed -->
            </form>
        </div>

        <!-- search bar end -->
        <!-- cart start -->
        <div class="relative flex items-center mr-3 cursor-pointer">
            @if (session()->has('company_user_id'))
                <a href="{{ route('frontend.my-cart') }}" class="relative">
                    <img src="{{ asset('frontend/assets/images/cart.svg') }}" alt="Cart"
                        class="w-20 h-20 lg:h-8 lg:w-8">
                    @if ($cartCount > 0)
                        <span
                            class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full min-w-[20px] text-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            @else
                <a href="javascript:void(0);" onclick="showLoginToast();" class="relative">
                    <img src="{{ asset('frontend/assets/images/cart.svg') }}" alt="Cart"
                        class="w-20 h-20 lg:h-8 lg:w-8">
                </a>
            @endif
        </div>





        <!-- cart end  -->

        <div class="relative flex items-center justify-between gap-2 mr-2 adminButton">
            @if (session()->has('company_user_id'))
                @php
                    $user = \App\Models\CompanyRegistration::find(session('company_user_id'));
                @endphp
                @if ($user)
                    <div class="relative flex items-center gap-3">
                        <!-- User Icon (Bigger for Mobile) -->
                        <a href="{{ route('frontend.manageprofile') }}">
                            <img src="{{ asset('frontend/assets/images/User Icon.svg') }}" alt="User Icon"
                                class="w-20 h-20 md:w-6 md:h-6 lg:w-10 lg:h-10"> <!-- Larger icon on mobile -->
                        </a>

                        <!-- Button to Toggle Dropdown -->
                        <button id="dropdownButton" class="flex items-center gap-2 px-3 py-2 text-sm md:text-base">
                            {{ $user->first_name }}
                            <svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu (Initially Hidden) -->
                        <div id="dropdownMenu"
                            class="absolute right-0 hidden w-40 mt-2 bg-white border rounded-md shadow-lg">
                            <a href="{{ route('frontend.logout') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Logout
                            </a>
                        </div>
                    </div>
                @endif
            @else
                <a href="{{ route('frontend.login') }}">
                    <img src="{{ asset('frontend/assets/images/User Icon.svg') }}" alt="User Icon"
                        class="w-20 h-20 lg:h-8 lg:w-8"> <!-- Larger icon for mobile -->
                </a>
                <a href="{{ route('frontend.login') }}">
                    <span class="hidden text-base md:flex"> Login </span>
                </a>
            @endif
        </div>





        {{--  <div class="langMenu">
            <div class="relative text-left ">
                <!-- Dropdown Toggle -->
                <button id="langToggle" type="button"
                    class="flex items-center h-full px-3 py-2 space-x-2 text-white rounded-md focus:outline-none"
                    onclick="toggleLangDropdown()">
                    <!-- Flag Image -->
                    <img src="{{ asset('frontend/assets/images/flag.svg') }}" alt="UK Flag"
                        class="object-cover w-6 h-4" />
                    <!-- Down Arrow Icon (SVG) -->
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586
                         l3.293-3.293a1 1 0 111.414 1.414l-4
                         4a1 1 0 01-1.414 0l-4-4a1 1 0
                         010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="langMenu"
                    class="absolute right-0 hidden w-40 mt-2 bg-white border border-gray-200 rounded shadow-lg">
                    <ul class="py-2 text-gray-700">
                        <li class="flex items-center px-4 py-2 space-x-2 cursor-pointer hover:bg-gray-100">
                            <img src="{{ asset('frontend/assets/images/flag.svg') }}" alt="US Flag"
                                class="object-cover w-5 h-3" />
                            <span>English (US)</span>
                        </li>
                        <li class="flex items-center px-4 py-2 space-x-2 cursor-pointer hover:bg-gray-100">
                            <img src="{{ asset('frontend/assets/images/flag.svg') }}" alt="France Flag"
                                class="object-cover w-5 h-3" />
                            <span>Français</span>
                        </li>
                        <li class="flex items-center px-4 py-2 space-x-2 cursor-pointer hover:bg-gray-100">
                            <img src="{{ asset('frontend/assets/images/flag.svg') }}" alt="Spain Flag"
                                class="object-cover w-5 h-3" />
                            <span>Español</span>
                        </li>
                        <!-- Add more languages as needed -->
                    </ul>
                </div>
            </div>
        </div>  --}}


        {{--  <div class="flex items-center gap-5">
            <!-- Google Translate Dropdown -->
            <div id="google_translate_element"></div>
        </div>  --}}

        <div class="flex flex-col md:flex-row items-start md:items-center gap-1 md:gap-5">
            <span class="text-base text-white">Select Language</span>
            <div id="google_translate_element"></div>
        </div>










    </div>
</div>

<!-- ==== TOPNAV_PURPLE - END ==== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        dropdownButton.addEventListener("click", function(event) {
            event.stopPropagation(); // Prevent click from closing immediately
            dropdownMenu.classList.toggle("hidden");
        });

        // Close dropdown if clicking outside
        document.addEventListener("click", function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
<!-- Toastr Message for Unauthorized Access -->
<script>
    function showLoginToast() {
        toastr.error('Please log in to access the cart!', 'Authentication Required', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 3000
        });
    }
</script>



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
    /* Hide the Google Translate banner frame */
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    /* Prevent body from being pushed down by Google Translate */
    body {
        top: 0px !important;
        position: static !important;
    }

    /* Hide overlay that dims the site */
    .goog-te-banner-frame,
    .goog-te-balloon-frame {
        display: none !important;
    }

    /* Hide additional UI elements */
    .goog-te-menu-value span,
    {{--  .goog-te-gadget-icon {
        display: none !important;
    }  --}} .goog-te-gadget-icon {
        display: inline-block !important;
        margin-right: 6px;
    }

    /* Also make sure this doesn't hide important elements */
    .goog-te-menu-value span {
        display: inline-block !important;
    }

    /* Optional: hide the pop-up */
    iframe[id^=":"] {
        display: none !important;
    }

    /* Container of Google Translate element */
    #google_translate_element {
        display: flex;
        justify-content: flex-end;
        padding: 10px 20px;
        background-color: #4b0a49;
        /* Matching your theme */
    }

    /* Google Translate dropdown styling */
    .goog-te-combo {
        padding: 6px 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        color: #333;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        cursor: pointer;
    }

    /* Optional: on focus/hover */
    .goog-te-combo:focus,
    .goog-te-combo:hover {
        border-color: #4b0a49;
        outline: none;
    }

    /* Hide Google logo (optional) */
    .goog-logo-link {
        display: none !important;
    }

    /* Hide powered by text (optional) */
    .goog-te-gadget span {
        display: none !important;
    }

    #google_translate_element span {
        font-size: 16px;
        color: #fff;
        font-weight: 500;
    }

    /* Google Translate dropdown styling */
    .goog-te-combo {
        padding: 10px 14px !important;
        font-size: 16px !important;
        border: 1px solid #ccc !important;
        border-radius: 8px !important;
        background-color: #fff !important;
        color: #333 !important;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15) !important;
        cursor: pointer !important;
        min-width: 180px !important;
    }
</style>

{{--  <style>
    /* Parent container to flex-align */
    .top-right-options {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* Dropdown label */
    #google_translate_element::before {
        content: "Select Language:";
        font-size: 14px;
        margin-right: 5px;
        color: white;
    }

    /* Google Translate dropdown */
    #google_translate_element .goog-te-combo {
        padding: 6px 10px;
        font-size: 13px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        color: #333;
        cursor: pointer;
    }

    /* Remove Google branding */
    .goog-logo-link,
    .goog-te-gadget span {
        display: none !important;
    }

    /* Remove default margin if any */
    #google_translate_element {
        margin: 0 !important;
    }
</style>  --}}
