<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>
<div class="login-wrapper">
    <div class="login-content">
        <div class="login-userset">
            <div class="login-logo logo-normal">
                <img src="{{ asset('assets/img/logo-senpos.png')}}" alt="img">
            </div>
            <a href="index.html" class="login-logo logo-white">
                <img src="{{ asset('assets/img/logo-white-senpos.png')}}"  alt="">
            </a>
            <div class="login-userheading">
                <h3>Create an Account</h3>
                <h4>Continue where you left off</h4>
            </div>
            <form wire:submit="register">
            <div class="form-login">
                <label>Full Name</label>
                <div class="form-addons">
                    <input wire:model="name" id="name" name="name" required autofocus autocomplete="full name" type="text" placeholder="Enter your full name">
                    <img src="assets/img/icons/users1.svg" alt="img">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 alert alert-danger alert-dismissible fade show" />
                </div>
            </div>
            <div class="form-login">
                <label>Email</label>
                <div class="form-addons">
                    <input type="email" name="email" required autocomplete="username"  wire:model="email" id="email" placeholder="Enter your email address">
                    <img src="assets/img/icons/mail.svg" alt="img">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger alert-dismissible fade show" />
                </div>
            </div>
            <div class="form-login">
                <label>Password</label>
                <div class="pass-group">
                    <input wire:model="password" id="password" type="password" name="password"
                    required autocomplete="new-password" class="pass-input" placeholder="Enter your password">
                    <span class="fas toggle-password fa-eye-slash"></span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger alert-dismissible fade show" />
                </div>
            </div>
            <div class="form-login">
                <label for="password_confirmation">Confirm Password</label>
                <div class="pass-group">
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="pass-input" placeholder="confirm your password">
                    <span class="fas toggle-password fa-eye-slash"></span>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 alert alert-danger alert-dismissible fade show" /> 
                </div>
            </div>
            <div class="form-login">
                <button class="btn btn-login" type="submit">Sign Up</button>
                {{-- <a class="btn btn-login">Sign Up</a> --}}
            </div>
            </form>
            <div class="signinform text-center">
                <h4>Already a user? <a  href="{{ route('login') }}" wire:navigate class="hover-a">Sign In</a></h4>
            </div>
            <div class="form-setlogin">
                <h4>Or sign up with</h4>
            </div>
            <div class="form-sociallink">
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/img/icons/google.png')}}" class="me-2" alt="google">
                            Sign Up using Google
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/img/icons/facebook.png')}}" class="me-2" alt="google">
                            Sign Up using Facebook
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-img">
        <img src="{{ asset('assets/img/login.jpg')}}" alt="img">
    </div>
</div>
{{-- <div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}
