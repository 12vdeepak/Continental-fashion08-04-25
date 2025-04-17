<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continental Fashion</title>

    <!-- ======= IMPORTED CSS - start  ====== -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/global.css') }}">


    <!-- ======= TAILWIND CDN LINK - start  ====== -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- ======= TAILWIND CDN LINK - end ====== -->

    <!-- ==== Icon Pack Lucide -- start  ==== -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- ==== Icon Pack Lucide -- end  ==== -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">



    <style>
        .animate-scroll {
            display: flex;
            width: max-content;
            animation: scroll 20s linear infinite;
        }

        @keyframes scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>

    <style>
        @keyframes scrollBanner {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-scroll-banner {
            display: flex;
            animation: scrollBanner 20s linear infinite;
            width: 200%;
            /* Double the width to accommodate duplicated slides */
        }

        .animate-scroll-banner:hover {
            animation-play-state: paused;
        }
    </style>


    <style>
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-slide {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            height: 400px;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide img {
            max-height: 100%;
            max-width: 100%;
            margin-right: 2%;
            /* Add spacing between images */
        }

        .carousel-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            width: 40px;
            height: 40px;
        }

        .carousel-nav .prev {
            left: 10px;
        }

        .carousel-nav .next {
            right: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 640px) {
            .carousel-slide img {
                width: 100%;
                /* Show 1 item on mobile */
                margin-right: 0;
                /* Remove spacing between images */
            }
        }

        @media (min-width: 641px) {
            .carousel-slide img {
                width: 48%;
                /* Show 2 items on desktop */
            }
        }
    </style>
    <style>
        /* Prevent scrolling when dropdown is open */
        .no-scroll {
            overflow: hidden;
        }

        .error {
            color: red;
        }

        .invalid-feedback {
            color: red;
        }

        .highStock {
            background-image: url("public/frontend/assets/images/highStock.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% auto;
            font-weight: 400;
            font-family: var(--font-primary);
        }

        .poster {
            background-image: url("public/frontend/assets/images/poster.jpeg");
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 40vh;

            font-family: var(--font-primary);
        }
    </style>
    <style>
        @keyframes scrollBanners {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .banner-wrapper {
            display: flex;
            animation: scrollBanners 20s linear infinite;
            width: 200%;
            /* Double width for continuous scroll */
        }

        .banner-slide {
            flex-shrink: 0;
            width: 50%;
            height: 70vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>









</head>



<body>

    <!-- header -->
    @include('frontend.partials.header')


    @include('frontend.partials.navbar')

    <!-- main content -->
    <main>
        @yield('content')
    </main>

    <!-- footer -->
    @include('frontend.partials.footer')










    <!-- ==== Importing main js - start ==== -->
    <script defer src="{{ asset('frontend/assets/js/index.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    <!-- ==== Importing main js - end ==== -->


    <script>
        // js for popup

        document
            .getElementById("registrationForm")
            .addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent form submission (for demo)

                // Simulate successful registration (Replace this with actual API call)
                setTimeout(() => {
                    document.getElementById("successModal").classList.remove("hidden");
                }, 500);
            });

        // Function to Close the Modal
        function closeModal() {
            document.getElementById("successModal").classList.add("hidden");
        }


        // ---

        // show file name
        document
            .getElementById("businessRegistration")
            .addEventListener("change", function() {
                let fileName = this.files[0]?.name || "Upload your business registration";
                document.getElementById("fileName").textContent = fileName;
            });

        //  Confirm password

        function validatePassword() {
            let newPassword = document.getElementById("newPassword").value;
            let confirmPassword = document.getElementById("confirmPassword").value;
            let errorText = document.getElementById("passwordError");

            if (newPassword !== confirmPassword && confirmPassword.length > 0) {
                errorText.classList.remove("hidden"); // Show error message
            } else {
                errorText.classList.add("hidden"); // Hide error message
            }
        }
    </script>



    <script>
        function showSelectedFileName(input) {
            const fileNameSpan = document.getElementById('fileName');
            if (input.files.length > 0) {
                fileNameSpan.textContent = input.files[0].name;
            } else {
                fileNameSpan.textContent = 'Upload your business registration';
            }
        }
    </script>

    <script>
        function changeImage(imageSrc) {
            document.getElementById('mainImage').src = imageSrc;
        }
    </script>



    <!-- Add this JavaScript at the end of your file -->
    <script>
        // Function to toggle password visibility for new password








        // Function to Close the Modal
        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        // Check if there's a success message from the server and show modal
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the URL has a success parameter or if there's a session success message
            const urlParams = new URLSearchParams(window.location.search);
            const hasSuccess = "{{ Session::has('message') && Session::get('alert-type') === 'success' }}";

            if (hasSuccess === "1" || urlParams.has('success')) {
                document.getElementById('successModal').classList.remove('hidden');
            }
        });
    </script>
    <script>
        const newPass = document.getElementById("newPass");
        const confirmPass = document.getElementById("confirmPass");
        const message = document.getElementById("message");
        const submitBtn = document.getElementById("submitBtn");
        const popup = document.getElementById("popup");
        const closePopup = document.getElementById("closePopup");

        // Validate password match in real time
        confirmPass.addEventListener("input", () => {
            if (confirmPass.value === newPass.value && confirmPass.value !== "") {
                confirmPass.classList.remove("border-red-500");
                confirmPass.classList.add("border-green-500");
                message.textContent = "Passwords match ✅";
                message.classList.remove("text-red-500");
                message.classList.add("text-green-500");
            } else {
                confirmPass.classList.remove("border-green-500");
                confirmPass.classList.add("border-red-500");
                message.textContent = "Passwords do not match ❌";
                message.classList.remove("text-green-500");
                message.classList.add("text-red-500");
            }
        });

        // Show popup when password is changed
        submitBtn.addEventListener("click", () => {
            if (newPass.value && confirmPass.value && newPass.value === confirmPass.value) {
                popup.classList.remove("hidden");
            }
        });

        // Close popup
        closePopup.addEventListener("click", () => {
            popup.classList.add("hidden");
            newPass.value = "";
            confirmPass.value = "";
            confirmPass.classList.remove("border-green-500", "border-red-500");
            message.textContent = "";
        });
    </script>

    <script>
        document.getElementById("closePopupBtn").addEventListener("click", function() {
            document.getElementById("orderSuccessPopup").classList.add("hidden");
        });

        document.getElementById("closePopup").addEventListener("click", function() {
            document.getElementById("orderSuccessPopup").classList.add("hidden");
        });
    </script>



    <script>
        document.getElementById('orderForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            fetch("{{ route('order.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update order number
                        document.getElementById('orderNumber').textContent = `#${data.order_id}`;

                        // Clear previous order items
                        let orderItemsContainer = document.getElementById('orderItemsContainer');
                        orderItemsContainer.innerHTML = '';

                        // Insert new order items
                        data.order_items.forEach(item => {
                            let itemHTML = `
                            <div class="flex items-center p-4 bg-gray-100 rounded-lg">
                                <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="Hoodie" class="object-cover w-16 h-16 rounded-lg">
                                <div class="ml-4">
                                    <p class="text-lg font-semibold">${item.product_name}</p>
                                    <div class="flex gap-2 mt-1 text-sm text-gray-600">
                                        <span>Size: ${item.size}</span> |
                                        <span>Qty: ${item.quantity}</span>
                                    </div>
                                    <div class="flex gap-4 mt-2 text-sm">
                                        <span class="text-gray-600">Unit Price: <span class="font-semibold">€${item.unit_price}</span></span>
                                        <span class="text-gray-600">Total Price: <span class="font-semibold text-blue-600">€${item.total_price}</span></span>
                                    </div>
                                </div>
                            </div>
                        `;
                            orderItemsContainer.innerHTML += itemHTML;
                        });

                        // Show popup
                        document.getElementById('orderSuccessPopup').classList.remove('hidden');
                    } else {
                        alert(data.error || "Something went wrong!");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Something went wrong. Please try again.");
                });
        });

        // Close popup button
        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('orderSuccessPopup').classList.add('hidden');
        });

        document.getElementById('closePopupBtn').addEventListener('click', function() {
            document.getElementById('orderSuccessPopup').classList.add('hidden');
        });
    </script>


    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            let passwordInput = document.getElementById('password');
            let type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.textContent = type === 'password' ? '👁️' : '🙈'; // Toggle icon
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentIndex = 0;
            let imageElements = document.querySelectorAll(".dots .dot");
            let mainImage = document.getElementById("mainImage");
            let imagePaths = [];

            // Extract image paths from dot elements
            imageElements.forEach((dot) => {
                let match = dot.getAttribute("onclick").match(/'([^']+)'/);
                if (match) imagePaths.push(match[1]);
            });

            function updateImage() {
                if (imagePaths.length === 0) return;
                mainImage.src = imagePaths[currentIndex];

                // Update active dot styling
                document.querySelectorAll(".dots .dot").forEach((dot, index) => {
                    dot.style.backgroundColor = index === currentIndex ? "#E2001A" : "#6E6E6E";
                });
            }

            document.querySelector(".rightArrow").addEventListener("click", function() {
                if (imagePaths.length === 0) return;
                currentIndex = (currentIndex + 1) % imagePaths.length;
                updateImage();
            });

            document.querySelector(".leftArrow").addEventListener("click", function() {
                if (imagePaths.length === 0) return;
                currentIndex = (currentIndex - 1 + imagePaths.length) % imagePaths.length;
                updateImage();
            });

            // Add event listeners to dots for manual image switching
            imageElements.forEach((dot, index) => {
                dot.addEventListener("click", function() {
                    currentIndex = index;
                    updateImage();
                });
            });

            // Set initial image and active dot
            updateImage();
        });
    </script>









    <script>
        // Password visibility toggle
        function togglePasswordVisibility(inputId, toggleBtnId) {
            const passwordInput = document.getElementById(inputId);
            const toggleBtn = document.getElementById(toggleBtnId);

            toggleBtn.addEventListener("click", function() {
                const type = passwordInput.type === "password" ? "text" : "password";
                passwordInput.type = type;
                this.textContent = type === "password" ? "👁️" : "🙈"; // Toggle icon
            });
        }

        togglePasswordVisibility("newPassword", "toggleNewPassword");
        togglePasswordVisibility("confirmPassword", "toggleConfirmPassword");

        // Password match validation
        function validatePassword() {
            const newPassword = document.getElementById("newPassword").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            const passwordError = document.getElementById("passwordError");

            if (newPassword !== confirmPassword && confirmPassword !== "") {
                passwordError.classList.remove("hidden");
            } else {
                passwordError.classList.add("hidden");
            }
        }
    </script>

    <script>
        document.getElementById('openPasswordPopup').addEventListener('click', function() {
            document.getElementById('passwordPopup').classList.remove('hidden');
        });

        document.getElementById('closePasswordPopup').addEventListener('click', function() {
            document.getElementById('passwordPopup').classList.add('hidden');
        });

        document.getElementById('closePasswordPopupBtn').addEventListener('click', function() {
            document.getElementById('passwordPopup').classList.add('hidden');
        });
    </script>

    <script>
        function togglePassword(inputId, eyeId) {
            let input = document.getElementById(inputId);
            let eyeIcon = document.getElementById(eyeId);

            if (input.type === "password") {
                input.type = "text";
                eyeIcon.src = "{{ asset('frontend/assets/images/eye-slash.svg') }}"; // Change to "eye-off" icon
            } else {
                input.type = "password";
                eyeIcon.src = "{{ asset('frontend/assets/images/eye.svg') }}"; // Change to "eye" icon
            }
        }
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const slides = @json($banners); // Convert Laravel data to JSON
            const baseUrl = "{{ asset('storage/banner_images') }}/"; // Base URL

            // Filter only active banners
            const filteredSlides = slides.filter(banner => banner.status == 1);

            // Get DOM elements for dynamic content
            const bannerContainer = document.getElementById("bannerContainer");
            const titleElement = document.getElementById("title");
            const descriptionElement = document.getElementById("description");
            const prevBtn = document.getElementById("prevSlide");
            const nextBtn = document.getElementById("nextSlide");

            // Create wrapper for continuous scrolling
            const wrapper = document.createElement("div");
            wrapper.classList.add("banner-wrapper");

            let currentSlide = 0;
            let autoSlideInterval;

            // Function to create banner slides
            function createBannerSlides(slides) {
                slides.forEach(slide => {
                    let imagePath = slide.image;

                    // Ensure the image path does not include "banner_images/" twice
                    if (imagePath.includes("banner_images/")) {
                        imagePath = imagePath.replace("banner_images/", "");
                    }

                    const slideElement = document.createElement("div");
                    slideElement.classList.add("banner-slide");
                    slideElement.style.backgroundImage = `url('${baseUrl}${imagePath}')`;

                    wrapper.appendChild(slideElement);
                });

                // Duplicate slides for continuous scrolling
                slides.forEach(slide => {
                    const clonedSlide = wrapper.children[slides.indexOf(slide)].cloneNode(true);
                    wrapper.appendChild(clonedSlide);
                });
            }

            // Function to update slide content
            function updateSlide() {
                if (filteredSlides.length === 0) return;

                // Update title and description
                titleElement.innerHTML = filteredSlides[currentSlide].title || 'Banner Title';
                descriptionElement.textContent = filteredSlides[currentSlide].description || 'Banner Description';
            }

            // Navigation functions
            function nextSlide() {
                currentSlide = (currentSlide + 1) % filteredSlides.length;
                updateSlide();
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + filteredSlides.length) % filteredSlides.length;
                updateSlide();
            }

            // Auto slide function
            function startAutoSlide() {
                clearInterval(autoSlideInterval);
                autoSlideInterval = setInterval(nextSlide, 7000);
            }

            // Initialize the carousel
            function initCarousel() {
                if (filteredSlides.length === 0) {
                    console.warn("No active banners found.");
                    return;
                }

                // Create slides
                createBannerSlides(filteredSlides);

                // Add wrapper to container
                bannerContainer.appendChild(wrapper);

                // Initial slide update
                updateSlide();

                // Start auto sliding
                startAutoSlide();

                // Pause on hover
                bannerContainer.addEventListener('mouseenter', () => {
                    wrapper.style.animationPlayState = 'paused';
                });

                bannerContainer.addEventListener('mouseleave', () => {
                    wrapper.style.animationPlayState = 'running';
                });

                // Navigation button event listeners
                prevBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    prevSlide();
                    startAutoSlide();
                });

                nextBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    nextSlide();
                    startAutoSlide();
                });
            }

            // Initialize
            initCarousel();
        });
    </script>






    {{--  <script>
        function changeColor(colorId, imageUrl, element) {
            // Update the main product image
            document.getElementById('mainImage').src = imageUrl;

            // Remove the black border from all color buttons
            document.querySelectorAll('.colorButton').forEach(button => {
                button.classList.remove('border-black', 'ring-2', 'ring-gray-900');
            });

            // Add a black border to the selected button
            element.classList.add('border-black', 'ring-2', 'ring-gray-900');
        }
    </script>  --}}


    {{--  <script>
        // Function to change product image and update sizes dynamically
        function changeColors(colorId, imageUrl) {
            // Update the main image
            document.getElementById("mainImage").src = imageUrl;

            // Hide all sizes first
            document.querySelectorAll(".sizeButton").forEach(button => {
                button.style.display = "none";
            });

            // Show sizes that match the selected color
            document.querySelectorAll(`.sizeButton[data-color='${colorId}']`).forEach(button => {
                button.style.display = "inline-block";
            });
        }

        // Ensure the correct sizes are shown when the page loads (for the first image)
        document.addEventListener("DOMContentLoaded", function() {
            let firstColorButton = document.querySelector(".colorButton");
            if (firstColorButton) {
                firstColorButton.click(); // Simulate a click on the first color
            }
        });
    </script>  --}}




    {{--  <script>
        // Add this to your product detail page JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity controls
            const decreaseBtn = document.getElementById('decreaseQty');
            const increaseBtn = document.getElementById('increaseQty');
            const quantityDisplay = document.getElementById('quantity');
            const quantityInput = document.getElementById('productQuantity');

            decreaseBtn.addEventListener('click', function() {
                let currentQty = parseInt(quantityDisplay.textContent);
                if (currentQty > 1) {
                    currentQty--;
                    quantityDisplay.textContent = currentQty;
                    quantityInput.value = currentQty;
                }
            });

            increaseBtn.addEventListener('click', function() {
                let currentQty = parseInt(quantityDisplay.textContent);
                currentQty++;
                quantityDisplay.textContent = currentQty;
                quantityInput.value = currentQty;
            });

            // Color selection
            const colorButtons = document.querySelectorAll('.colorButton');
            const selectedColorInput = document.getElementById('selectedColor');

            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Extract color ID from the onclick attribute
                    const onclickAttr = this.getAttribute('onclick');
                    const colorId = onclickAttr.match(/changeColors\('(\d+)'/)[1];

                    // Set the selected color
                    selectedColorInput.value = colorId;

                    // Add visual indication of selection
                    colorButtons.forEach(btn => btn.classList.remove('ring-2', 'ring-offset-2',
                        'ring-[#54114C]'));
                    this.classList.add('ring-2', 'ring-offset-2', 'ring-[#54114C]');

                    // Reset size selection when color changes
                    document.getElementById('selectedSize').value = '';
                    document.querySelectorAll('.sizeButton').forEach(btn => {
                        btn.classList.remove('bg-[#54114C]', 'text-white');
                    });
                });
            });

            // Size selection
            const sizeButtons = document.querySelectorAll('.sizeButton');
            const selectedSizeInput = document.getElementById('selectedSize');

            sizeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default button behavior

                    // Get the size ID from data attribute
                    const sizeId = this.getAttribute('data-size-id');

                    // Set the selected size
                    selectedSizeInput.value = sizeId;

                    // Add visual indication of selection
                    sizeButtons.forEach(btn => btn.classList.remove('bg-[#54114C]', 'text-white'));
                    this.classList.add('bg-[#54114C]', 'text-white');

                    console.log('Selected size ID:', sizeId); // Debug log
                });
            });

            // Show the first color's sizes by default if available
            const firstColorButton = document.querySelector('.colorButton');
            if (firstColorButton) {
                const onclickAttr = firstColorButton.getAttribute('onclick');
                const colorId = onclickAttr.match(/changeColors\('(\d+)'/)[1];
                changeColors(colorId, firstColorButton.getAttribute('data-image'));
            }
        });

        // Modify your existing changeColors function to update the size options
        function changeColors(colorId, imagePath) {
            // Update the main image
            document.getElementById('mainImage').src = imagePath;

            // Update the selected color input
            document.getElementById('selectedColor').value = colorId;

            // Show only sizes available for this color
            const sizeButtons = document.querySelectorAll('.sizeButton');
            let firstSizeButton = null;

            sizeButtons.forEach(button => {
                if (button.getAttribute('data-color') === colorId) {
                    button.style.display = 'block';
                    if (!firstSizeButton) {
                        firstSizeButton = button;
                    }
                } else {
                    button.style.display = 'none';
                }
            });

            // Reset size selection
            document.getElementById('selectedSize').value = '';
            sizeButtons.forEach(btn => btn.classList.remove('bg-[#54114C]', 'text-white'));

            // Optionally select the first size by default
            if (firstSizeButton) {
                firstSizeButton.classList.add('bg-[#54114C]', 'text-white');
                document.getElementById('selectedSize').value = firstSizeButton.getAttribute('data-size-id');
            }
        }
    </script>  --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let mainImage = document.getElementById("mainImage");
            let colorButtons = document.querySelectorAll(".colorButton");
            let sizeButtons = document.querySelectorAll(".sizeButton");
            let selectedColorInput = document.getElementById("selectedColor");
            let selectedSizeInput = document.getElementById("selectedSize");

            // Ensure the first color is selected on page load
            if (colorButtons.length > 0) {
                colorButtons[0].click();
            }

            // Color Selection - Change Image and Show Relevant Sizes
            colorButtons.forEach(button => {
                button.addEventListener("click", function() {
                    let colorId = this.getAttribute("onclick").match(/changeColors\('(\d+)'/)[1];
                    let imageUrl = this.getAttribute("onclick").match(/'([^']+)'/g)[1].replace(/'/g,
                        "");

                    // Update the main product image
                    mainImage.src = imageUrl;

                    // Set selected color
                    selectedColorInput.value = colorId;

                    // Remove highlight from other buttons
                    colorButtons.forEach(btn => btn.classList.remove("border-black", "ring-2",
                        "ring-gray-900"));
                    this.classList.add("border-black", "ring-2", "ring-gray-900");

                    // Show only sizes for the selected color
                    sizeButtons.forEach(button => {
                        if (button.getAttribute("data-color") === colorId) {
                            button.style.display = "inline-block";
                        } else {
                            button.style.display = "none";
                        }
                    });

                    // Auto-select the first available size (if exists)
                    let firstSize = document.querySelector(`.sizeButton[data-color='${colorId}']`);
                    if (firstSize) {
                        firstSize.click();
                    } else {
                        selectedSizeInput.value = ""; // Reset size if no matching sizes
                    }
                });
            });

            // Size Selection - Update Selected Size
            sizeButtons.forEach(button => {
                button.addEventListener("click", function(e) {
                    e.preventDefault();
                    let sizeId = this.getAttribute("data-size-id");

                    // Update the selected size
                    selectedSizeInput.value = sizeId;

                    // Remove highlight from other buttons
                    sizeButtons.forEach(btn => btn.classList.remove("bg-[#54114C]", "text-white"));
                    this.classList.add("bg-[#54114C]", "text-white");
                });
            });

            // Quantity Controls
            const decreaseBtn = document.getElementById("decreaseQty");
            const increaseBtn = document.getElementById("increaseQty");
            const quantityDisplay = document.getElementById("quantity");
            const quantityInput = document.getElementById("productQuantity");

            decreaseBtn.addEventListener("click", function() {
                let currentQty = parseInt(quantityDisplay.textContent);
                if (currentQty > 1) {
                    currentQty--;
                    quantityDisplay.textContent = currentQty;
                    quantityInput.value = currentQty;
                }
            });

            increaseBtn.addEventListener("click", function() {
                let currentQty = parseInt(quantityDisplay.textContent);
                currentQty++;
                quantityDisplay.textContent = currentQty;
                quantityInput.value = currentQty;
            });
        });
    </script>

    <script>
        document.getElementById("openPopup").addEventListener("click", function() {
            document.getElementById("deletePopup").classList.remove("hidden");
        });

        document.getElementById("cancelNo").addEventListener("click", function() {
            document.getElementById("deletePopup").classList.add("hidden");
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sizeButtons = document.querySelectorAll(".sizeButton");
            const quantityDisplay = document.getElementById("quantityDisplay");

            sizeButtons.forEach(button => {
                button.addEventListener("click", function() {
                    // Remove active class from all buttons
                    sizeButtons.forEach(btn => btn.classList.remove("bg-gray-200"));

                    // Add active class to selected size button
                    this.classList.add("bg-gray-200");

                    // Get quantity from the selected button
                    const quantity = this.getAttribute("data-quantity");

                    // Update quantity display
                    quantityDisplay.textContent = `Available Quantity: ${quantity}`;
                });
            });
        });
    </script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addressDivs = document.querySelectorAll('.address');
            const deliveryInput = document.getElementById('selectedDeliveryAddressId');
            const billingInput = document.getElementById('selectedBillingAddressId');
            const sameAsDeliveryCheckbox = document.getElementById('sameAsDelivery');
            const billingSection = document.getElementById('billingAddressSection');

            // Function to set selection icon
            function setSelectionIcon(element, isSelected) {
                if (isSelected) {
                    element.querySelector('.selection').innerHTML =
                        `<img src="${window.location.origin}/projects/Continental-fashion/public/frontend/assets/images/checked.svg" class="w-[25px] h-[25px]">`;
                } else {
                    element.querySelector('.selection').innerHTML =
                        '<div class="circle w-[25px] h-[25px] bg-[#DADDDE] rounded-full"></div>';
                }
            }

            // Auto-select first address on page load
            function autoSelectFirstAddress(type) {
                const firstAddress = document.querySelector(`.address[data-type="${type}"]`);
                if (firstAddress) {
                    setSelectionIcon(firstAddress, true);
                    return firstAddress.dataset.addressId;
                }
                return null;
            }

            // Set default selections on page load
            if (!deliveryInput.value) {
                deliveryInput.value = autoSelectFirstAddress("delivery") || "";
            }
            if (!billingInput.value) {
                billingInput.value = autoSelectFirstAddress("billing") || "";
            }

            // Handle Address Selection Clicks
            addressDivs.forEach(div => {
                div.addEventListener('click', function() {
                    const type = this.dataset.type;
                    const addressId = this.dataset.addressId;

                    console.log(`Selected ${type} Address ID: ${addressId}`);

                    // Remove selection from all addresses of the same type
                    document.querySelectorAll(`.address[data-type="${type}"]`).forEach(d => {
                        setSelectionIcon(d, false);
                    });

                    // Mark the clicked address as selected
                    setSelectionIcon(this, true);

                    // Update hidden input fields
                    if (type === "delivery") {
                        deliveryInput.value = addressId;
                        if (sameAsDeliveryCheckbox.checked) {
                            billingInput.value = addressId;
                            selectBillingAddressById(addressId);
                        }
                    } else {
                        billingInput.value = addressId;
                    }
                });
            });

            // Handle "Same as Delivery" Checkbox
            sameAsDeliveryCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    billingSection.style.display = 'none';
                    billingInput.value = deliveryInput.value;
                    selectBillingAddressById(deliveryInput.value);
                } else {
                    billingSection.style.display = 'block';
                }
            });

            // Function to Select Billing Address When "Same as Delivery" is Checked
            function selectBillingAddressById(addressId) {
                document.querySelectorAll('.address[data-type="billing"]').forEach(d => {
                    setSelectionIcon(d, d.dataset.addressId === addressId);
                });
            }

            // Debugging Logs
            document.getElementById('orderForm').addEventListener('submit', function() {
                console.log("Final Submitted Delivery Address ID:", deliveryInput.value);
                console.log("Final Submitted Billing Address ID:", billingInput.value);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchBtn = document.getElementById("searchBtn");
            const searchForm = document.getElementById("searchForm");

            // Show search form on button click
            searchBtn.addEventListener("click", function() {
                searchForm.classList.toggle("hidden"); // Toggle visibility
                searchForm.classList.toggle("flex"); // Ensure flex layout when visible
            });

            // Hide search bar when clicking outside (only for mobile)
            document.addEventListener("click", function(event) {
                if (!searchForm.contains(event.target) && !searchBtn.contains(event.target)) {
                    if (window.innerWidth < 1024) { // Only hide on mobile
                        searchForm.classList.add("hidden");
                        searchForm.classList.remove("flex");
                    }
                }
            });
        });
    </script>



    {{-- JavaScript for Modal --}}
    <script>
        function showDescription(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
        }

        function closeDescription(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>

    <script>
        // all product filter dropdown

        function toggleFilter(id) {
            let element = document.getElementById(id);
            if (element.classList.contains("hidden")) {
                element.classList.remove("hidden");
            } else {
                element.classList.add("hidden");
            }
        }

        function clearFilters() {
            document
                .querySelectorAll('input[type="checkbox"]')
                .forEach((checkbox) => (checkbox.checked = false));
        }

        // sort drop down

        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("menu-btn");
            const closeBtn = document.getElementById("close-menu");
            const navMenu = document.getElementById("nav-menu");
            const collectionToggle = document.getElementById("collection-toggle");
            const collectionDropdown = document.getElementById("collection-dropdown");

            // Open mobile menu
            menuBtn?.addEventListener("click", function() {
                navMenu.classList.remove("-translate-x-full");
                navMenu.classList.add("translate-x-0");
            });

            // Close mobile menu
            closeBtn?.addEventListener("click", function() {
                navMenu.classList.remove("translate-x-0");
                navMenu.classList.add("-translate-x-full");
            });

            // Open dropdown on hover for all screen sizes
            collectionToggle?.addEventListener("mouseenter", function() {
                collectionDropdown.classList.remove("hidden");
            });

            // Close dropdown when mouse leaves (all screens)
            collectionDropdown?.addEventListener("mouseleave", function() {
                collectionDropdown.classList.add("hidden");
            });

            // Close dropdown when clicking outside (only for mobile)
            document.addEventListener("click", function(event) {
                if (!collectionDropdown.contains(event.target) && !collectionToggle.contains(event
                        .target)) {
                    collectionDropdown.classList.add("hidden");
                }
            });

            // Prevent auto-open issue when resizing between mobile and desktop
            window.addEventListener("resize", function() {
                collectionDropdown.classList.add("hidden"); // Hide dropdown when switching screen sizes
            });
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel2");
            const prevBtn = document.getElementById("prevBtn2");
            const nextBtn = document.getElementById("nextBtn2");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
    </script>


    <script>
        document.getElementById('closePopup')?.addEventListener('click', () => {
            document.getElementById('orderSuccessPopup').style.display = 'none';
        });

        document.getElementById('closePopupBtn')?.addEventListener('click', () => {
            document.getElementById('orderSuccessPopup').style.display = 'none';
        });
    </script>








    {{--  <script>
        document.addEventListener("DOMContentLoaded", () => {
            function updateTotals() {
                let netTotal = 0;
                document.querySelectorAll(".quantity").forEach((element) => {
                    const quantity = parseInt(element.textContent);
                    const price = 12;
                    const total = quantity * price;
                    element.closest(".bg-gray-100, tr").querySelector(".total-price")?.textContent =
                        `$${total}`;
                    netTotal += total;
                });

                document.querySelector(".net-amount").textContent = `€${netTotal}`;
                const vat = (netTotal * 0.19).toFixed(2);
                document.querySelector(".vat-amount").textContent = `€${vat}`;
                const finalAmount = (netTotal + parseFloat(vat)).toFixed(2);
                document.querySelector(".final-amount").textContent = `€${finalAmount}`;
            }

            document.querySelectorAll(".increment").forEach((button) => {
                button.addEventListener("click", () => {
                    const quantityElement = button.parentElement.querySelector(".quantity");
                    let quantity = parseInt(quantityElement.textContent);
                    quantityElement.textContent = quantity + 1;
                    updateTotals();
                });
            });

            document.querySelectorAll(".decrement").forEach((button) => {
                button.addEventListener("click", () => {
                    const quantityElement = button.parentElement.querySelector(".quantity");
                    let quantity = parseInt(quantityElement.textContent);
                    if (quantity > 1) {
                        quantityElement.textContent = quantity - 1;
                        updateTotals();
                    }
                });
            });

            document.querySelectorAll(".remove-item").forEach((button) => {
                button.addEventListener("click", () => {
                    button.closest(".bg-gray-100, tr").remove();
                    updateTotals();
                });
            });

            updateTotals();
        });
    </script>  --}}

    {{--  <script>
        const counter = document.getElementById("counter");
        const increaseBtn = document.getElementById("increase");
        const decreaseBtn = document.getElementById("decrease");

        let count = 120; // Initial value

        increaseBtn.addEventListener("click", () => {
            count++;
            counter.textContent = count;
        });

        decreaseBtn.addEventListener("click", () => {
            if (count > 0) { // Prevents negative values
                count--;
                counter.textContent = count;
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
    </script>  --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel2");
            const prevBtn = document.getElementById("prevBtn2");
            const nextBtn = document.getElementById("nextBtn2");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
    </script>


    {{--  <script>
        document.addEventListener("DOMContentLoaded", () => {
            function updateTotals() {
                let netTotal = 0;
                document.querySelectorAll(".quantity").forEach((element) => {
                    const quantity = parseInt(element.textContent);
                    const price = 12;
                    const total = quantity * price;
                    element.closest(".bg-gray-100, tr").querySelector(".total-price")?.textContent =
                        `$${total}`;
                    netTotal += total;
                });

                document.querySelector(".net-amount").textContent = `€${netTotal}`;
                const vat = (netTotal * 0.19).toFixed(2);
                document.querySelector(".vat-amount").textContent = `€${vat}`;
                const finalAmount = (netTotal + parseFloat(vat)).toFixed(2);
                document.querySelector(".final-amount").textContent = `€${finalAmount}`;
            }

            document.querySelectorAll(".increment").forEach((button) => {
                button.addEventListener("click", () => {
                    const quantityElement = button.parentElement.querySelector(".quantity");
                    let quantity = parseInt(quantityElement.textContent);
                    quantityElement.textContent = quantity + 1;
                    updateTotals();
                });
            });

            document.querySelectorAll(".decrement").forEach((button) => {
                button.addEventListener("click", () => {
                    const quantityElement = button.parentElement.querySelector(".quantity");
                    let quantity = parseInt(quantityElement.textContent);
                    if (quantity > 1) {
                        quantityElement.textContent = quantity - 1;
                        updateTotals();
                    }
                });
            });

            document.querySelectorAll(".remove-item").forEach((button) => {
                button.addEventListener("click", () => {
                    button.closest(".bg-gray-100, tr").remove();
                    updateTotals();
                });
            });

            updateTotals();
        });
    </script>  --}}
    <script>
        // Carousel functionality
        let currentSlide = 0;

        function openCarousel() {
            const carouselModal = document.getElementById('carouselModal');
            carouselModal.classList.remove('hidden');
            showSlide(currentSlide);
        }

        function closeCarousel() {
            const carouselModal = document.getElementById('carouselModal');
            carouselModal.classList.add('hidden');
        }

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-slide img');
            const slideWidth = slides[0].offsetWidth + 16; // Width of one slide + margin
            const carouselSlide = document.querySelector('.carousel-slide');

            // Determine the number of items to slide based on screen size
            const itemsToSlide = window.innerWidth < 640 ? 1 : 2;

            // Ensure the index stays within bounds
            if (index >= slides.length / itemsToSlide) currentSlide = 0;
            if (index < 0) currentSlide = (slides.length / itemsToSlide) - 1;

            // Calculate the translation value
            const translateXValue = -currentSlide * slideWidth * itemsToSlide;
            carouselSlide.style.transform = `translateX(${translateXValue}px)`;
        }

        function changeSlide(n) {
            // Determine the number of items to slide based on screen size
            const itemsToSlide = window.innerWidth < 640 ? 1 : 2;

            // Update the current slide index
            currentSlide += n;

            // Ensure the index stays within bounds
            const totalSlides = document.querySelectorAll('.carousel-slide img').length;
            if (currentSlide >= totalSlides / itemsToSlide) currentSlide = 0;
            if (currentSlide < 0) currentSlide = (totalSlides / itemsToSlide) - 1;

            showSlide(currentSlide);
        }

        // Initialize the first slide
        showSlide(currentSlide);
    </script>

    <script>
        const counter = document.getElementById("counter");
        const increaseBtn = document.getElementById("increase");
        const decreaseBtn = document.getElementById("decrease");

        let count = 120; // Initial value

        increaseBtn.addEventListener("click", () => {
            count++;
            counter.textContent = count;
        });

        decreaseBtn.addEventListener("click", () => {
            if (count > 0) { // Prevents negative values
                count--;
                counter.textContent = count;
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("carousel");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            prevBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: -360,
                    behavior: "smooth"
                });
            });

            nextBtn.addEventListener("click", () => {
                carousel.scrollBy({
                    left: 360,
                    behavior: "smooth"
                });
            });
        });
    </script>
    <script>
        document.getElementById('profileImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let viewMoreBtn = document.getElementById("viewMoreBtn");
            let hiddenOrders = document.querySelectorAll(".order-item.hidden");

            if (viewMoreBtn) {
                viewMoreBtn.addEventListener("click", function() {
                    hiddenOrders.forEach(order => order.classList.remove("hidden"));
                    viewMoreBtn.style.display = "none"; // Hide button after showing all orders
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const addAddressButton = document.querySelector(".addAddressButton button");
            const popup = document.getElementById("addressPopup");
            const closePopup = document.getElementById("closePopup"); // Get the cancel button

            addAddressButton.addEventListener("click", () => {
                popup.classList.remove("hidden");
            });

            closePopup.addEventListener("click", () => {
                popup.classList.add("hidden");
            });

            // Optional: Close popup when clicking outside
            popup.addEventListener("click", (e) => {
                if (e.target === popup) {
                    popup.classList.add("hidden");
                }
            });
        });
    </script>





    @include('cookie-consent::index')
</body>

</html>
