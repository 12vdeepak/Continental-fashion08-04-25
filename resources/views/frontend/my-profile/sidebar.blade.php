<!-- Sidebar -->
<div id="sidebar" class="sideBar w-full md:w-1/4 bg-[#F4F4F4] rounded-xl flex flex-col justify-between hidden md:flex">
    <div class="upperDiv p-5 flex flex-col gap-5">
        <!-- Manage Account -->
        <a href="{{ route('frontend.manageprofile') }}">
            <div
                class="button p-5 rounded-xl flex justify-center items-center
                {{ Request::routeIs('frontend.manageprofile') ? 'bg-[#54114C] text-white' : 'bg-[#E7E6E7] text-black' }}">
                Manage Account
            </div>
        </a>

        <!-- My Orders -->
        <a href="{{ route('frontend.myorder') }}">
            <div
                class="button p-5 rounded-xl flex justify-center items-center
                {{ Request::routeIs('frontend.myorder') ? 'bg-[#54114C] text-white' : 'bg-[#E7E6E7] text-black' }}">
                My Orders
            </div>
        </a>

        <!-- Manage Address -->
        <a href="{{ route('frontend.manageaddress') }}">
            <div
                class="button p-5 rounded-xl flex justify-center items-center
                {{ Request::routeIs('frontend.manageaddress') ? 'bg-[#54114C] text-white' : 'bg-[#E7E6E7] text-black' }}">
                Manage Address
            </div>
        </a>

        <!-- Settings -->
        <a href="{{ route('frontend.managesetting') }}">
            <div
                class="button p-5 rounded-xl flex justify-center items-center
                {{ Request::routeIs('frontend.managesetting') ? 'bg-[#54114C] text-white' : 'bg-[#E7E6E7] text-black' }}">
                Settings
            </div>
        </a>
    </div>

    <!-- Logout Button -->
    <div class="lowerDiv p-5">
        <a href="{{ route('frontend.logout') }}">
            <div id="logoutButton"
                class="button p-5 bg-[#54114C] rounded-xl text-[#ffffff] flex justify-center items-center text-blue-500 bg-blue-100">
                Logout
            </div>
        </a>

    </div>
</div>
