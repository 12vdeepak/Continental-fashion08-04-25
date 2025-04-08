<!-- Load jQuery and Bootstrap Bundle -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<style>
    /* Hide ALL Google Translate elements except the dropdown itself */
    .goog-te-banner-frame,
    .goog-te-menu-frame,
    .goog-te-gadget-icon,
    .goog-te-gadget-simple img,
    .goog-te-menu-value span:first-child,
    .goog-te-menu-value span:nth-child(3),
    .goog-te-menu-value span:nth-child(5),
    .goog-te-gadget span,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd,
    .VIpgJd-ZVi9od-ORHb-OEVmcd {
        display: none !important;
    }

    /* Make the dropdown clean and minimal */
    .goog-te-combo {
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
        color: #002c8f;
        outline: none;
        font-size: 14px;
        width: 100%;
        min-width: 120px;
    }

    /* Keep dropdown open */
    .dropdown-menu.force-show {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    /* Hide Google branding completely */
    #google_translate_element {
        position: relative;
    }

    #google_translate_element span {
        display: none !important;
    }
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe"></i> Language
            </a>
            <div class="dropdown-menu p-2 keep-open" aria-labelledby="languageDropdown">
                <div id="google_translate_element"></div>
            </div>
        </li>
    </ul>
</nav>

<!-- Custom Language Switching Implementation -->
<script type="text/javascript">
    // Track initialization status
    var translationInitialized = false;

    function googleTranslateElementInit() {
        if (translationInitialized) return;

        // Use the simplest possible layout
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,de', // Only English & German
            autoDisplay: false,
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');

        translationInitialized = true;

        // Clean up the translate element and apply styles
        setTimeout(cleanTranslateInterface, 500);
    }

    function cleanTranslateInterface() {
        var selectElement = document.querySelector(".goog-te-combo");
        if (!selectElement) {
            setTimeout(cleanTranslateInterface, 300);
            return;
        }

        // Style the dropdown
        selectElement.classList.add("nav-link", "changeLanguage");
        selectElement.style.color = "#002c8f";
        selectElement.style.paddingLeft = "0";

        // Remove all other elements
        var parent = document.getElementById('google_translate_element');
        if (parent) {
            var children = parent.childNodes;
            var toRemove = [];

            // Identify what to remove (all except the select)
            for (var i = 0; i < children.length; i++) {
                var child = children[i];
                if (child.nodeType === 1 && !child.querySelector('.goog-te-combo')) {
                    toRemove.push(child);
                }
            }

            // Remove identified elements
            for (var i = 0; i < toRemove.length; i++) {
                parent.removeChild(toRemove[i]);
            }
        }

        // Load saved language
        var savedLang = localStorage.getItem("selectedLanguage");
        if (savedLang && savedLang !== "en") {
            selectElement.value = savedLang;
            selectElement.dispatchEvent(new Event('change'));
        }

        // Save language changes
        selectElement.addEventListener("change", function() {
            localStorage.setItem("selectedLanguage", this.value);
        });
    }

    // Function to completely purge Google Translate elements
    function purgeGoogleTranslate() {
        // Remove banner frame
        var bannerFrame = document.querySelector('.goog-te-banner-frame');
        if (bannerFrame) bannerFrame.remove();

        // Reset body positioning
        document.body.style.top = '0px';
        document.body.style.position = 'static';

        // Hide all translate-related iframes
        var iframes = document.querySelectorAll('iframe');
        for (var i = 0; i < iframes.length; i++) {
            var iframe = iframes[i];
            if (iframe.src.indexOf('translate.google') >= 0) {
                iframe.style.display = 'none';
                iframe.style.visibility = 'hidden';
                iframe.style.height = '0';
                iframe.style.width = '0';
            }
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        // Load the Google Translate script
        var script = document.createElement('script');
        script.src = "https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
        script.async = true;
        document.body.appendChild(script);

        // Purge Google Translate elements regularly
        setInterval(purgeGoogleTranslate, 200);

        // Add custom CSS to hide Google elements
        var style = document.createElement('style');
        style.textContent = `
            body > .skiptranslate { display: none !important; }
            .goog-te-banner-frame { display: none !important; }
            .goog-te-balloon-frame { display: none !important; }
            .goog-tooltip { display: none !important; }
            .goog-tooltip:hover { display: none !important; }
            .goog-text-highlight { background-color: transparent !important; box-shadow: none !important; }
        `;
        document.head.appendChild(style);

        // Dropdown management
        var isInteractingWithDropdown = false;

        // Language dropdown toggle handler
        $('#languageDropdown').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $menu = $(this).next('.dropdown-menu');
            $menu.toggleClass('show force-show');
        });

        // When mouse enters the dropdown area
        $('.dropdown-menu.keep-open').on('mouseenter', function() {
            isInteractingWithDropdown = true;
            $(this).addClass('force-show');
        });

        // When mouse leaves the dropdown area
        $('.dropdown-menu.keep-open').on('mouseleave', function() {
            isInteractingWithDropdown = false;
            setTimeout(function() {
                if (!isInteractingWithDropdown) {
                    $('.dropdown-menu').removeClass('force-show');
                }
            }, 300);
        });

        // Prevent dropdown from closing when clicking inside
        $(document).on('click', '.dropdown-menu.keep-open, .goog-te-combo', function(e) {
            e.stopPropagation();
            isInteractingWithDropdown = true;

            // Keep open for interaction time
            setTimeout(function() {
                isInteractingWithDropdown = false;
            }, 2000);
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown-menu.keep-open, #languageDropdown').length) {
                $('.dropdown-menu').removeClass('show force-show');
                isInteractingWithDropdown = false;
            }
        });
    });
</script>
