{{-- <section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">{{ __('Welcome back') }}</h3>
                            <p class="mb-0">{{ __('Create a new acount')}}<br></p>
                            <p class="mb-0">{{__('OR Sign in with these credentials:') }}</p>
                            <p class="mb-0">{{ __('Email ') }}<b>{{ __('admin@softui.com') }}</b></p>
                            <p class="mb-0">{{ __('Password ') }}<b>{{ __('secret') }}</b></p>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="login" action="#" method="POST" role="form text-left">
                                <div class="mb-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model="email" id="email" type="email" class="form-control"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror">
                                        <input wire:model="password" id="password" type="password" class="form-control"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                    </div>
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-check form-switch">
                                    <input wire:model="remember_me" class="form-check-input" type="checkbox"
                                        id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <small class="text-muted">{{ __('Forgot you password? Reset you password') }} <a
                                    href="{{ route('forgot-password') }}"
                                    class="text-info text-gradient font-weight-bold">{{ __('here') }}</a></small>
                            <p class="mb-4 text-sm mx-auto">
                                {{ __(' Don\'t have an account?') }}
                                <a href="{{ route('sign-up') }}"
                                    class="text-info text-gradient font-weight-bold">{{ __('Sign up') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<div class="login-wrapper">
    <div class="login-content">
        <div class="login-userset">
            <div class="login-logo logo-normal">
                <img src="{{ asset('assets/img/logo-senpos.png') }}" alt="img">
            </div>
            <a href="index.html" class="login-logo logo-white">
                <img src="{{ asset('assets/img/logo-white-senpos.png') }}" alt="">
            </a>
            <div class="login-userheading">
                <h3>Sign In</h3>
                <h4>Please login to your account</h4>
                <!-- Session Status -->
                {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
            </div>
            <form wire:submit.prevent="login" action="#" method="POST" >
                <div class="form-login">
                    <label for="email">{{ __('Email') }}</label>
                    <div class="form-addons @error('email')border border-danger rounded-3 @enderror">
                        <input wire:model="email" id="email" type="email" name="email" required autofocus
                            autocomplete="username" placeholder="Enter your email address">
                        <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror                    </div>
                </div>
                <div class="form-login">
                    <label>{{ __('Password') }}</label>
                    <div class="pass-group @error('password')border border-danger rounded-3 @enderror">
                        <input wire:model="password" id="password" name="password" required
                            autocomplete="current-password" type="password" class="pass-input"
                            placeholder="Enter your password">
                        <span class="fas toggle-password fa-eye-slash"></span>
                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror                    </div>
                </div>
                <div class="form-check form-switch">
                    <input wire:model="remember_me" class="form-check-input" type="checkbox"
                        id="rememberMe">
                    <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                </div>
                <div class="form-login">
                    <div class="alreadyuser">
                        <h4>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" wire:navigate class="hover-a">Forgot
                                    Password?</a>
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="form-login">
                    <button class="btn btn-login" type="submit">Sign In</button>
                    {{-- <a class="btn btn-login" href="index.html">Sign In</a> --}}
                </div>
            </form>
            
            <div class="signinform text-center">
                <h4>Don’t have an account? 
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover-a" wire:navigate>Sign Up</a>
                    @endif
                </h4>
            </div>
            <div class="form-setlogin">
                <h4>Or sign up with</h4>
            </div>
            <div class="form-sociallink">
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/img/icons/google.png') }}" class="me-2" alt="google">
                            Sign Up using Google
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/img/icons/facebook.png') }}" class="me-2" alt="google">
                            Sign Up using Facebook
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-img">
        <img src="{{ asset('assets/img/login.jpg') }}" alt="img">
    </div>
</div>