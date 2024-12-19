<!--begin::Header-->
<div id="kt_app_header" class="app-header ">
    <!--begin::Header container-->
    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
        id="kt_app_header_container">
        <!--begin::Header logo-->
        <div class="app-header-logo d-flex align-items-center ps-lg-2 me-lg-10">
            <!--Menu sidebar mobile-->
            <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px ms-n2 me-2 d-flex d-lg-none"
                id="kt_app_sidebar_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Mobile toggle-->

            <!--begin::Logo image-->
            <a href="/dashboard">
                <img alt="Logo" src="{{ asset('image/logo.png') }}" class="h-16" />
                {{-- <img id="logo-image" alt="Logo" src="{{ asset('image/Smart-Lab blue.png') }}"
                        class="h-40px ms-3 mt-2" /> --}}
            </a>
            <!--end::Logo image-->
        </div>
        <!--end::Header logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::User menu-->
                <div class="app-navbar-item ms-3 ms-md-6" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                        <p class="text-md font-medium font-poppins text-gray-700 ml-8">
                            <span class="uppercase">{{ Auth::user()->name }}</span>
                        </p>
                        <span class="fs-8 badge badge-light-success">{{ Auth::user()->getRoleNames()->first() }}</span>
                    </div>

                    <!-- Profile Button -->
                    <div>
                        <a href="#" id="profile-button"
                            class="flex items-center p-3 text-white bg-blue-400 hover:bg-blue-700 transition rounded-full border border-blue-500"
                            onclick="toggleDropdown('dropdown-profile')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <!-- Dropdown Profile -->
                    <div id="dropdown-profile"
                        class="absolute hidden p-4 bg-white shadow-lg rounded-md w-max min-w-[200px] text-gray-800 text-sm z-10 transition-transform transform scale-95 opacity-0 origin-top scale-100 opacity-100"
                        style="top: 100px; right: 20px;">
                        <!-- Display Email -->
                        <h1 class="font-poppins px-4 py-2 text-xl font-bold text-gray-500 break-words">PROFILE</h1>
                        <div class="font-poppins px-4 py-2 text-md text-gray-500 break-words">Nama:
                            {{ Auth::user()->name }}
                        </div>
                        <div class="font-poppins px-4 py-2 border-b text-md text-gray-500">Email:
                            {{ Auth::user()->email }}
                        </div>

                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 flex items-center space-x-2">
                                <!-- Icon -->
                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                                </svg>
                                <!-- Text -->
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
<!--begin::Wrapper-->
<div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

    {{-- SIDEBAR --}}
    <!--begin::Sidebar-->
    <div id="kt_app_sidebar" class="app-sidebar " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

        <!--begin::Sidebar primary-->
        <div class="app-sidebar-primary ">
            <!--end::Header-->
            <!--begin::Sidebar navbar-->
            <div class="app-sidebar-nav flex-grow-1 hover-scroll-overlay-y px-5 pt-2" id="kt_app_sidebar_primary_nav"
                data-kt-scroll="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_header, #kt_app_sidebar_primary_header, #kt_app_sidebar_primary_footer"
                data-kt-scroll-wrappers="#kt_app_content, #kt_app_sidebar_primary_nav" data-kt-scroll-offset="5px">
                <!--begin::Nav-->
                <ul class="nav">
                    <li class="nav-item py-1">
                        <a href="/dashboard"
                            class="nav-link py-4 px-1 btn <?= request()->is('dashboard') ? 'active' : '' ?>">
                            <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="pt-2 fs-9 fs-lg-7 fw-bold text-blue-800">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item py-1">
                        <a href="/mapel"
                            class="nav-link py-4 px-1 btn <?= request()->is('mapel', 'materi') ? 'active' : '' ?>">
                            <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="pt-2 fs-9 fs-lg-7 fw-bold text-blue-800">Mapel</span>
                        </a>
                    </li>
                    <li class="nav-item py-1">
                        <a href="/tugas"
                            class="nav-link py-4 px-1 btn <?= request()->is('tugas') ? 'active' : '' ?>">
                            <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="pt-2 fs-9 fs-lg-7 fw-bold text-blue-800">Tugas</span>
                        </a>
                    </li>
                    @if (auth()->check() && !auth()->user()->class()->exists())
                        <li class="nav-item py-1">
                            <a href="/PilihKelas"
                                class="nav-link py-4 px-1 btn {{ request()->is('PilihKelas') ? 'active' : '' }}">
                                <svg class="w-6 h-6 text-blue-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7.402 4.5C7 5.196 7 6.13 7 8v3.027C7.43 11 7.914 11 8.435 11h7.13c.52 0 1.005 0 1.435.027V8c0-1.87 0-2.804-.402-3.5A3 3 0 0 0 15.5 3.402C14.804 3 13.87 3 12 3s-2.804 0-3.5.402A3 3 0 0 0 7.402 4.5M6.25 15.991c-.502-.02-.806-.088-1.014-.315c-.297-.324-.258-.774-.18-1.675c.055-.65.181-1.088.467-1.415C6.035 12 6.858 12 8.505 12h6.99c1.647 0 2.47 0 2.982.586c.286.326.412.764.468 1.415c.077.9.116 1.351-.181 1.675c-.208.227-.512.295-1.014.315V21a.75.75 0 1 1-1.5 0v-5h-8.5v5a.75.75 0 1 1-1.5 0z" />
                                </svg>
                                <span class="pt-2 fs-9 fs-lg-7 fw-bold text-blue-800">Kelas</span>
                            </a>
                        </li>
                    @endif

                </ul>
                <!--end::Nav-->
            </div>
            <!--end::Sidebar navbar-->
        </div>
        <!--end::Sidebar primary-->
    </div>
    <!--end::Sidebar-->

    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }
    </script>
