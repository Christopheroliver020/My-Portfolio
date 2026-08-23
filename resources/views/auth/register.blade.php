<x-guest-layout>
    <div class="register-page">
        {{-- Background --}}
        <div class="register-bg">
            <div class="register-glow register-glow-indigo"></div>
            <div class="register-glow register-glow-purple"></div>
            <div class="register-glow-center"></div>
        </div>

        <div class="register-wrapper">
            {{-- LEFT SIDE --}}
            <section class="register-hero">
                <div class="register-hero-content">
                    <a href="/" class="register-brand">
                        <div class="register-brand-icon">I</div>
                        <div>
                            <h1>ICHIGO</h1>
                            <p>PORTFOLIO</p>
                        </div>
                    </a>

                    <div class="register-hero-main">
                        <p class="register-hero-label">CREATE YOUR ACCOUNT</p>
                        <h2>
                            Start your
                            <span>journey.</span>
                        </h2>
                        <p>Create an account and become part of the Ichigo experience.</p>
                        <div class="register-hero-line"></div>
                    </div>

                    <div class="register-hero-footer">
                        <span>ICHIGO</span>
                        <span>BUILD / CREATE / EXPLORE</span>
                    </div>
                </div>
            </section>

            {{-- RIGHT SIDE --}}
            <section class="register-section">
                <div class="register-container">
                    {{-- Mobile Header --}}
                    <div class="register-mobile-header">
                        <a href="/" class="register-brand">
                            <div class="register-brand-icon">I</div>
                            <h1>ICHIGO</h1>
                        </a>
                        <a href="/" class="register-home">Home</a>
                    </div>

                    {{-- CARD --}}
                    <div class="register-card">
                        <div class="register-heading">
                            <p>GET STARTED</p>
                            <h2>Create account</h2>
                            <span>Join and start building your profile.</span>
                        </div>

                        {{-- VALIDATION ERRORS --}}
                        @if ($errors->any())
                            <div class="register-error-box">
                                <strong>Please fix the following:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="register-form">
                            @csrf

                            <div class="register-field">
                                <label for="name">Name</label>
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Your name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                >
                                @error('name')
                                    <p class="register-input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="register-field">
                                <label for="email">Email</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="you@example.com"
                                    required
                                    autocomplete="username"
                                >
                                @error('email')
                                    <p class="register-input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="register-field">
                                <label for="password">Password</label>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Create a password"
                                    required
                                    autocomplete="new-password"
                                >
                                @error('password')
                                    <p class="register-input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="register-field">
                                <label for="password_confirmation">Confirm Password</label>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Confirm your password"
                                    required
                                    autocomplete="new-password"
                                >
                                @error('password_confirmation')
                                    <p class="register-input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="register-button">Create Account</button>
                        </form>

                        <div class="register-login">
                            <p>
                                Already have an account?
                                <a href="{{ route('login') }}">Sign in</a>
                            </p>
                        </div>
                    </div>

                    <div class="register-mobile-footer">
                        &copy; {{ date('Y') }} Christopher. All rights reserved.
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>