@extends('frontend.layouts.app')
@section('content')
@section('style')
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
<main>
    <section id="registerPage" class="w-full ">
        <!-- pageNavShow -->
        <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4  lg:px-[120px] ">
            <div class="backIcon">
                <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
            </div>
            <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
                <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}" alt=""> Home
            </div>
            <div class="line">
                <img src="{{ asset('frontend/assets/images/Line.svg') }}" alt="">
            </div>
            <div class="currentPage text-[#6E6E6E]  font-[500] text-[16px] flex items-center gap-2">
                Login
                <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
                <span class="text-[#E2001A]"> Register Customer Account </span>
            </div>

        </div>
        {{--  <!-- mainContent -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  --}}

        @if (session('success'))
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>{{ Session::get('success') }}</h5>
                    <?php Session::forget('success'); ?>
                </div>
            </div>
        @endif


        <div id="registerForm" class="w-full  px-4 lg:px-[120px] my-[80px] w-full gap-20  ">
            <!-- <div class="registerFormHeading text-[48px] font-bold">To Register Customer Account</div> -->
            <div class="registerFormDescription text-[32px] font-bold mt-[16px]">To create your account please
                provide details to continue</div>
            <form action="{{ route('register') }}" class="flex flex-col gap-5 mt-[30px] w-full" method="post"
                enctype="multipart/form-data">

                @csrf
                <!-- form line 1 -->
                <div id="company_Street " class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10 ">
                    <div class="flex flex-col gap-1 lg:w-1/2">


                        <label for="country">Company Name <span class="text-red-500">*</span></label>
                        <input type="text" name="company_name" id="country" placeholder="Enter Company Name"
                            class="order border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('company_name') is-invalid @enderror">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 lg:w-1/2 ">


                        <label for="street">Street <span class="text-red-500">*</span></label>
                        <input type="text" name="street" id="street" placeholder="Enter Your Street Name"
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('street') is-invalid @enderror">
                        @error('street')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <!-- zipcode city -->
                <div id="zipCode_City" class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10 ">
                    <div class="flex flex-col gap-1 lg:w-1/2">


                        <label for="zipCode">Zip Code <span class="text-red-500">*</spa></label>
                        <input type="text" name="zip_code" id="zipCode" placeholder="Enter Your Zip Code"
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('zip_code') is-invalid @enderror">
                        @error('zip_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 lg:w-1/2">


                        <label for="city">City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city" placeholder="Enter Your City"
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('city') is-invalid @enderror">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div id="country_PhoneNumber " class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10 ">
                    <div class="flex flex-col gap-1 lg:w-1/2">


                        <label for="country">Country <span class="text-red-500">*</span></label>
                        <input type="text" id="country" name="country" placeholder="Enter Your Country"
                            class="  border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('country') is-invalid @enderror">
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 lg:w-1/2 ">


                        <label for="phoneNumber">Phone Number <span class="text-red-500">*</span></label>
                        <input type="phone" id="phoneNumber" name="phone_number" placeholder="Enter Your Phone Number"
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('phone_number') is-invalid @enderror">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="flex flex-col gap-1 text-[#6E6E6E]">
                    <label for="gender" class="text-zinc-900">Gender <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select id="gender" name="gender"
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none w-full @error('gender') is-invalid @enderror">
                            <option value="" disabled selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="absolute inset-y-0 flex items-center pointer-events-none right-4">
                            <img src="{{ asset('frontend/assets/images/arrowDown.svg') }}" alt="">
                        </div>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- == Name field == -->

                <div id="name_fields " class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10 ">
                    <div class="flex flex-col gap-1 lg:w-1/2">


                        <label for="firstName">First Name <span class="text-red-500">*</span></label>
                        <input type="name" name="first_name" id="firstName" placeholder="Enter First Name"
                            class="  border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('first_name') is-invalid @enderror">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 lg:w-1/2 ">


                        <label for="lastName">Last Name <span class="text-red-500">*</span></label>
                        <input type="name" name="last_name" id="lastName" placeholder="Enter Last Name"
                            class="  border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <!-- == SuperVisory And email ==   -->

                <div id="SuperVisory_And_Email " class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10 ">
                    <div class="flex flex-col gap-1 text-[#6E6E6E] lg:w-1/2">
                        <label for="supervisory" class="text-zinc-900">Supervisory</label>
                        <div class="relative">
                            <select id="supervisory" name="supervisory"
                                class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none w-full @error('supervisory') is-invalid @enderror">
                                <option value="" selected>Select Position</option>
                                <option value="Managing Director">Managing Director</option>
                                <option value="Purchaser">Purchaser</option>
                                <option value="Office Assistant">Office Assistant</option>
                                <option value="Marketing Manager">Marketing Manager</option>
                                <option value="Accountant">Accountant</option>
                                <option value="HR Manager">HR Manager</option>
                                <option value="CEO">CEO</option>
                            </select>
                            <div class="absolute inset-y-0 flex items-center pointer-events-none right-4">
                                <img src="{{ asset('frontend/assets/images/arrowDown.svg') }}" alt="">
                            </div>
                            @error('supervisory')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 lg:w-1/2 ">


                        <label for="emailAddress">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="emailAddress" placeholder="Enter Your Email"
                            class="  border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <!-- == Password Fields == -->
                <div id="password_fields" class="flex flex-col w-full gap-3 lg:flex-row lg:gap-10">
                    <!-- New Password -->
                    <div class="relative flex flex-col gap-1 lg:w-1/2">
                        <label for="newPassword">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="password" name="new_password" id="newPassword"
                                placeholder="Enter New Password"
                                class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] w-full focus:outline-none focus:ring-2 focus:ring-purple-500 @error('new_password') is-invalid @enderror"
                                onkeyup="validatePassword()">
                            <button type="button" id="toggleNewPassword"
                                class="absolute transform -translate-y-1/2 right-4 top-1/2">
                                👁️
                            </button>
                        </div>
                        @error('new_password')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div class="relative flex flex-col gap-1 lg:w-1/2">
                        <label for="confirmPassword">Re-confirm Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="password" id="confirmPassword" name="new_password_confirmation"
                                placeholder="Confirm New Password"
                                class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] w-full focus:outline-none focus:ring-2 focus:ring-purple-500 @error('new_password_confirmation') is-invalid @enderror"
                                onkeyup="validatePassword()">
                            <button type="button" id="toggleConfirmPassword"
                                class="absolute transform -translate-y-1/2 right-4 top-1/2">
                                👁️
                            </button>
                        </div>
                        <span id="passwordError" class="hidden text-sm text-red-500">Passwords do not match!</span>
                        @error('new_password_confirmation')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- form line 3 -->


                <!-- Telefax -->

                <!-- <div class="flex flex-col gap-1">

                                <label for="telefax">Telefax </label>
                                <input type="text" id="telefax" placeholder="Telefax"
                                    class="border border-gray-300 bg-[#F4F4F4]  rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                            </div> -->


                <!-- ==== Sales tax form section  -->

                <div id="sales_tax_section "
                    class="flex flex-col w-full gap-10 bg-[#F4F4F4] rounded-2xl p-4 border border-gray-300 my-5 ">

                    <!-- <div class="checkBoxAndText">
                                    <div class="flex gap-2">


                                        <input type="checkbox" id="noVAT"
                                            class="border border-gray-300 rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <label for="noVAT"> I have no VAT ID <span class="text-red-500">*</span></label>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Please note, if you have a VAT ID and don’t insert it, later changes of the invoices are not
                                        possible.
                                    </p>

                                </div> -->


                    <!-- Sales Tax Identification Number -->

                    <div class="flex flex-col gap-1">

                        <label for="salesTaxIDN">VAT ID Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="salesTaxIDN" name="vat_id_number"
                            placeholder="Enter Your Sales Tax Identification No."
                            class="border border-gray-300 bg-[#F4F4F4]  rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 @error('vat_id_number') is-invalid @enderror">
                        @error('vat_id_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sales Tax Identification Number -->



                    <!-- Business Registration Upload -->

                    <div class="flex flex-col gap-1">
                        <label for="businessRegistration">Your Business Registration <span
                                class="text-red-500">*</span>
                            <span class="text-sm text-blue-500">(only with new customer registration)</span></label>

                        <div
                            class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] flex items-center justify-between cursor-pointer">
                            <span id="fileName" class="text-gray-500">Upload your business registration</span>
                            <input type="file" name="business_registration_file" id="businessRegistration"
                                class="hidden @error('business_registration_file') is-invalid @enderror"
                                accept=".pdf">
                            <label for="businessRegistration" class="cursor-pointer">
                                <svg class="w-5 h-5 text-gray-500 mt-[4px]" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10l7-7m0 0l7 7m-7-7v14"></path>
                                </svg>


                            </label>
                            @error('business_registration_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="flex flex-col gap-2 mt-3 instructionBusinessReg">
                            <p class="text-sm font-medium text-blue-500">Note: Upload only pdf</p>
                            {{--  <p class="text-[#6E6E6E]"> <span class="font-medium text-zinc-700"> Alternatively: </span>
                                Send your business registration afterwards</p>  --}}
                            {{--  <p class="text-[#6E6E6E]">By Mail to: MAPROM GmbH, Rohrweg 33, 37671 Höxter</p>  --}}
                            <!-- <p class="text-[#6E6E6E]">By Fax to: 05271 9719-99</p> -->
                            {{--  <p class="text-[#6E6E6E]">By E-mail to: info@maprom.de</p>  --}}


                        </div>
                    </div>



                </div>

                <!-- Note Field  -->

                <div class="flex flex-col gap-1">

                    <label for="note">Enter your note </label>
                    <textarea id="note" name="note" placeholder="Write Your Note Here..."
                        class="border border-gray-300 bg-[#F4F4F4] rounded-2xl p-[16px] focus:outline-none focus:ring-2 focus:ring-purple-500 h-32 overflow-hidden resize-none @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                    @error('note')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex gap-2">


                    <input type="checkbox" id="terms_Conditions" name="terms_accepted"
                        class="border border-gray-300 rounded-2xl p-[16px] focus:outline-none @error('terms_accepted') is-invalid @enderror"
                        {{ old('terms_accepted') ? 'checked' : '' }}>
                    <label for="terms_Conditions" class="text-[#6E6E6E]"> I have read <span
                            class="text-blue-500">privacy policy</span> <span class="text-red-500">*</span>and <span
                            class="text-blue-500"> terms and
                            conditions</span> <span class="text-red-500">*</span></label>
                    @error('terms_accepted')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>















                <!-- Register Now Button -->

                <input type="submit" value="Register Now"
                    class="bg-[#54114C] text-white p-[16px] rounded-2xl cursor-pointer hover:bg-purple-700 transition text-[16px] font-bold mt-5 ">
            </form>
        </div>
        <!-- Add this success modal HTML right after your form closing div -->
        <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
            <div class="w-full max-w-md p-8 bg-white rounded-2xl">
                <div class="text-center">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-green-100 rounded-full">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold text-gray-900">Your Account Registration request send
                        Successful!</h3>
                    <p class="mb-6 text-gray-600">Your account Registration request has been send successfully and you
                        will receive Confirmation mail soon.</p>
                    <button onclick="closeModal()"
                        class="bg-[#54114C] text-white px-6 py-3 rounded-xl font-bold hover:bg-purple-700 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>

    </section>


</main>
@endsection
