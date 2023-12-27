<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(session('url.intended', RouteServiceProvider::HOME), navigate: true);
    }
}; ?>

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
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <form wire:submit="login">
                <div class="form-login">
                    <label for="email">Email</label>
                    <div class="form-addons">
                        <input wire:model="form.email" id="email" type="email" name="email" required autofocus
                            autocomplete="username" placeholder="Enter your email address">
                        <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                            <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger alert-dismissible fade show" />
                    </div>
                </div>
                <div class="form-login">
                    <label>Password</label>
                    <div class="pass-group">
                        <input wire:model="form.password" id="password" name="password" required
                            autocomplete="current-password" type="password" class="pass-input"
                            placeholder="Enter your password">
                        <span class="fas toggle-password fa-eye-slash"></span>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger alert-dismissible fade show" />
                    </div>
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember" class="inline-flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div><br>
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

{{-- <div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}
