<x-layouts.base>
    {{-- If the user is authenticated --}}
    @auth()
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @if (in_array(request()->route()->getName(),
                ['static-sign-up', 'sign-up']))
            <!-- Main Wrapper -->
            <div class="{{ Route::currentRouteName() == 'pos' ? 'main-wrappers' : 'main-wrapper' }}">
                <!-- Header -->
                @if (Route::currentRouteName() == 'pos')
                    @include('layouts.navbars.auth.pos-header')
                @else
                    @include('layouts.navbars.auth.header')
                @endif
                <!-- Header -->

                <!-- Sidebar -->
                @if (Route::currentRouteName() !== 'pos')
                    @include('layouts.navbars.auth.sidebar')
                @endif
                <!-- /Sidebar -->
                {{-- @include('layouts.navbars.auth.nav-profile') --}}
                <div class="page-wrapper {{ Route::currentRouteName() == 'pos' ? 'ms-0' : '' }}"
                    style="{{ Route::currentRouteName() == 'pos' ? 'min-height: 731px;' : '' }}">
                    <div class="content">
                        <!-- Page Heading -->
                        @if (isset($header))
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $header }}
                                </div>
                                @if (Route::currentRouteName() == 'listeProduits')
                                    <div class="page-btn">
                                        <button type="button" class="btn btn-added" data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                            <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"
                                                class="me-1">Add New Product
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif
                        {{ $slot }}
                        {{-- @include('layouts.footers.auth.footer') --}}
                    </div>
                </div>
            </div>
            <!-- /Main Wrapper -->
            {{-- @include('components.plugins.fixed-plugin') --}}
            {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),
                ['sign-in', 'login']))
            <!-- Main Wrapper -->
            <div class="{{ Route::currentRouteName() == 'pos' ? 'main-wrappers' : 'main-wrapper' }}">
                <!-- Header -->
                @if (Route::currentRouteName() == 'pos')
                    @include('layouts.navbars.auth.pos-header')
                @else
                    @include('layouts.navbars.auth.header')
                @endif
                <!-- Header -->

                <!-- Sidebar -->
                @if (Route::currentRouteName() !== 'pos')
                    @include('layouts.navbars.auth.sidebar')
                @endif
                <!-- /Sidebar -->
                {{-- @include('layouts.navbars.auth.nav-profile') --}}
                <div class="page-wrapper {{ Route::currentRouteName() == 'pos' ? 'ms-0' : '' }}"
                    style="{{ Route::currentRouteName() == 'pos' ? 'min-height: 731px;' : '' }}">
                    <div class="content">
                        <!-- Page Heading -->
                        @if (isset($header))
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $header }}
                                </div>
                                @if (Route::currentRouteName() == 'listeProduits')
                                    <div class="page-btn">
                                        <button type="button" class="btn btn-added" data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                            <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"
                                                class="me-1">Add New Product
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif
                        {{ $slot }}
                        {{-- @include('layouts.footers.auth.footer') --}}
                    </div>
                </div>
            </div>
            <!-- /Main Wrapper -->
            {{-- @include('components.plugins.fixed-plugin') --}}
        @elseif (in_array(request()->route()->getName(),
                ['profile', 'my-profile']))
            <!-- Main Wrapper -->
            <div class="{{ Route::currentRouteName() == 'pos' ? 'main-wrappers' : 'main-wrapper' }}">
                <!-- Header -->
                @if (Route::currentRouteName() == 'pos')
                    @include('layouts.navbars.auth.pos-header')
                @else
                    @include('layouts.navbars.auth.header')
                @endif
                <!-- Header -->

                <!-- Sidebar -->
                @if (Route::currentRouteName() !== 'pos')
                    @include('layouts.navbars.auth.sidebar')
                @endif
                <!-- /Sidebar -->
                {{-- @include('layouts.navbars.auth.nav-profile') --}}
                <div class="page-wrapper {{ Route::currentRouteName() == 'pos' ? 'ms-0' : '' }}"
                    style="{{ Route::currentRouteName() == 'pos' ? 'min-height: 731px;' : '' }}">
                    <div class="content">
                        <!-- Page Heading -->
                        @if (isset($header))
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $header }}
                                </div>
                                @if (Route::currentRouteName() == 'listeProduits')
                                    <div class="page-btn">
                                        <button type="button" class="btn btn-added" data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                            <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"
                                                class="me-1">Add New Product
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif
                        {{ $slot }}
                        {{-- @include('layouts.footers.auth.footer') --}}
                    </div>
                </div>
            </div>
            <!-- /Main Wrapper -->
            {{-- @include('components.plugins.fixed-plugin') --}}
        @else
            <!-- Main Wrapper -->
            <div class="{{ Route::currentRouteName() == 'pos' ? 'main-wrappers' : 'main-wrapper' }}">
                <!-- Header -->
                @if (Route::currentRouteName() == 'pos')
                    @include('layouts.navbars.auth.pos-header')
                @else
                    @include('layouts.navbars.auth.header')
                @endif
                <!-- Header -->

                <!-- Sidebar -->
                @if (Route::currentRouteName() !== 'pos')
                    @include('layouts.navbars.auth.sidebar')
                @endif
                <!-- /Sidebar -->
                <div class="page-wrapper {{ Route::currentRouteName() == 'pos' ? 'ms-0' : '' }}"
                    style="{{ Route::currentRouteName() == 'pos' ? 'min-height: 731px;' : '' }}">
                    <div class="content">
                        <!-- Page Heading -->
                        @if (isset($header))
                            <div class="page-header">
                                <div class="page-title">
                                    {{ $header }}
                                </div>
                                @if (Route::currentRouteName() == 'listeProduits')
                                    <div class="page-btn">
                                        <button type="button" class="btn btn-added" data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                            <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"
                                                class="me-1">Add New Product
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif
                        {{ $slot }}
                        {{-- @include('layouts.footers.auth.footer') --}}
                    </div>
                </div>
            </div>
            <!-- /Main Wrapper -->
        @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (
            !auth()->check() &&
                in_array(request()->route()->getName(),
                    ['login']))
            {{ $slot }}
            {{-- If the user is on the sign up page --}}
        @elseif (
            !auth()->check() &&
                in_array(request()->route()->getName(),
                    ['sign-up']))
            <div>
                {{ $slot }}
            </div>
        @endif
    @endguest

</x-layouts.base>
