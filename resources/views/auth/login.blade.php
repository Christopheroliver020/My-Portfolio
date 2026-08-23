<x-guest-layout>
    <div class="login-page">
        {{-- BACKGROUND EFFECTS --}}
        <div class="login-bg">
            <div class="glow glow-indigo"></div>
            <div class="glow glow-purple"></div>
            <div class="glow glow-center"></div>
        </div>

        <div class="login-wrapper">
            {{-- ================================================= --}}
            {{-- LEFT SIDE --}}
            {{-- ================================================= --}}
            <section class="login-hero">
                <div class="hero-content">
                    {{-- LOGO --}}
                    <a href="{{ url('/') }}" class="brand">
                        <div class="brand-icon">I</div>
                        <span>ICHIGO</span>
                    </a>

                    {{-- HERO CONTENT --}}
                    <div class="hero-main">
                        <p class="hero-label">IT STUDENT / DEVELOPER</p>
                        <h1>
                            Welcome
                            <span>back.</span>
                        </h1>
                        <p class="hero-description">
                            Sign in to manage your portfolio,
                            projects, messages, and digital experiences
                            from one place.
                        </p>
                        <div class="hero-divider">
                            <span></span>
                            <small>PERSONAL PORTFOLIO</small>
                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div class="hero-footer">
                        <span>&copy; {{ date('Y') }} Christopher</span>
                        <span>Portfolio</span>
                    </div>
                </div>
            </section>

            {{-- ================================================= --}}
            {{-- RIGHT SIDE --}}
            {{-- ================================================= --}}
            <section class="login-section">
                <div class="login-container">
                    {{-- MOBILE HEADER --}}
                    <div class="mobile-header">
                        <a href="{{ url('/') }}" class="brand">
                            <div class="brand-icon">T</div>
                            <span>TOPHER</span>
                        </a>
                        <a href="{{ url('/') }}" class="home-link">Home</a>
                    </div>

                    {{-- LOGIN CARD --}}
                    <div class="login-card">
                        {{-- HEADING --}}
                        <div class="login-heading">
                            <p class="login-label">ADMIN PORTAL</p>
                            <h2>Welcome back</h2>
                            <p>Sign in to continue to your portfolio.</p>
                        </div>

                        {{-- SESSION STATUS --}}
                        <x-auth-session-status class="session-status" :status="session('status')" />

                        {{-- VALIDATION ERRORS --}}
                        @if ($errors->any())
                            <div class="error-box">
                                <p>Please check your information and try again.</p>
                            </div>
                        @endif

                        {{-- LOGIN FORM --}}
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    placeholder="you@example.com"
                                    required
                                    autofocus
                                    autocomplete="username"
                                >
                                @error('email')
                                    <p class="input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="form-group">
                                <div class="password-header">
                                    <label for="password">Password</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot password?</a>
                                    @endif
                                </div>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Enter your password"
                                    required
                                    autocomplete="current-password"
                                >
                                @error('password')
                                    <p class="input-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- REMEMBER ME --}}
                            <div class="remember-row">
                                <label>
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <span>Remember me</span>
                                </label>
                            </div>

                            {{-- BUTTON --}}
                            <button type="submit" class="login-button">
                                <span>Sign In</span>
                            </button>
                        </form>

                        {{-- REGISTER --}}
                        @if (Route::has('register'))
                            <div class="register-section">
                                <p>
                                    Don't have an account?
                                    <a href="{{ route('register') }}">Create one</a>
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- MOBILE FOOTER --}}
                    <p class="mobile-footer">&copy; {{ date('Y') }} Christopher. All rights reserved.</p>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>
