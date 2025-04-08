<footer class="bg-black text-white px-6 md:px-[120px] py-10">
    <div class="flex flex-col justify-between gap-10 md:flex-row md:gap-20">

        <!-- Logo & Contact -->
        <div class="flex flex-col gap-6">
            <h2 class="text-3xl font-bold leading-tight">
                <a href="{{ route('frontend.home') }}" class="text-white-500">
                    Continental Fashion <br> Merchandising UG
                </a>
            </h2>

            <div class="flex items-center gap-3 text-lg">
                <img src="{{ asset('frontend/assets/images/phoneIcon.svg') }}" alt="Phone">
                <a href="tel:+496108826960">
                    +49 6108 826960
                </a>
            </div>

            <div class="flex items-center gap-3 text-lg">
                <img src="{{ asset('frontend/assets/images/mailIcon.svg') }}" alt="Email">
                <a href="mailto:sales@continental-fashion.de">
                    sales@continental-fashion.de
                </a>
            </div>

            <!-- Opening Hours -->
            <div class="mt-4 text-lg">
                <h3 class="font-bold">Opening Hours:</h3>
                <p>Mon - Thursday: 9:00 - 17:00 Uhr</p>
                <p>Fri: 9:00 - 14:00 Uhr</p>
            </div>
        </div>

        <!-- Legal Pages -->
        <div>
            <h3 class="mb-4 text-xl font-bold">Legal Pages</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('frontend.imprint') }}" class="transition hover:text-purple-400">Imprint</a></li>
                <li><a href="{{ route('frontend.privacy') }}" class="transition hover:text-purple-400">Privacy Policy</a></li>
                <li><a href="#" class="transition hover:text-purple-400">Legal Notes</a></li>
                <li><a href="{{ route('frontend.terms') }}" class="transition hover:text-purple-400">Terms &
                        Conditions</a></li>
                <li><a href="{{ asset('frontend/assets/pdf/Delivery Condition.pdf') }}"
                        class="transition hover:text-purple-400">Delivery Conditions</a></li>
                <li>
                    <a href="{{ session()->has('company_user_id') ? asset('frontend/assets/pdf/RETURN_CANCELLATION.pdf') : route('frontend.login') }}"
                        class="transition hover:text-purple-400"
                        {{ session()->has('company_user_id') ? 'target="_blank"' : '' }}>
                        Cancellation & Returns
                    </a>
                </li>



            </ul>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="mb-4 text-xl font-bold">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('frontend.faqs') }}" class="transition hover:text-purple-400">FAQ</a></li>

                <li>
                    <a href="{{ session()->has('company_user_id') ? asset('frontend/assets/pdf/price_list.pdf') : route('frontend.login') }}"
                        class="transition hover:text-purple-400"
                        {{ session()->has('company_user_id') ? 'target="_blank"' : '' }}>
                        Download Pricelist
                    </a>
                </li>

                <li>
                    <a href="{{ session()->has('company_user_id') ? '#' : route('frontend.login') }}"
                        class="transition hover:text-purple-400">
                        Measurement Charts
                    </a>
                </li>

                <li>
                    <a href="{{ session()->has('company_user_id') ? asset('frontend/assets/pdf/shipping_cost.pdf') : route('frontend.login') }}"
                        class="transition hover:text-purple-400"
                        {{ session()->has('company_user_id') ? 'target="_blank"' : '' }}>
                        Shipping Cost
                    </a>
                </li>

                <li><a href="{{ asset('frontend/assets/pdf/Versand kosten Deutschland.pdf') }}" target="_blank"
                        class="transition hover:text-purple-400">Transportation Cost</a></li>





            </ul>
        </div>

        <!-- Newsletter -->
        <div class="w-full md:w-[320px]">
            <h3 class="mb-4 text-xl font-bold">Subscribe To Our Newsletter</h3>
            <form action="{{ route('frontend.subscribe') }}" method="post" class="flex flex-col gap-4">
                @csrf
                <input type="email" placeholder="Enter Your Email" name="email"
                    class="border border-gray-300 rounded-xl p-4 bg-black text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit"
                    class="p-4 font-bold text-white transition bg-purple-700 hover:bg-purple-600 rounded-xl">
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="mt-8 text-sm text-center text-gray-400">
        &copy; 2025 Continental Fashion. All Rights Reserved.
    </div>
</footer>
