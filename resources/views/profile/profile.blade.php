@vite('resources/js/app.js')

<x-app-layout>

    <div class="profile-page">

        <div class="profile-wrapper">

            {{-- HEADER --}}
            <div class="profile-header">

                <div>

                    <p class="profile-eyebrow">
                        Account
                    </p>

                    <h1>
                        Profile Settings
                    </h1>

                    <p class="profile-description">
                        Manage your account information, password, and security settings.
                    </p>

                </div>

                <a href="{{ route('dashboard') }}"
                   class="profile-back">
                    ← Dashboard
                </a>

            </div>


            {{-- PROFILE INFORMATION --}}
            <section class="profile-card">

                <div class="profile-card-heading">

                    <div class="profile-card-icon profile-icon-indigo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>

                    <div>
                        <h2>
                            Profile Information
                        </h2>

                        <p>
                            Update your name and email address.
                        </p>
                    </div>

                </div>

                <div class="profile-form-container">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </section>


            {{-- PASSWORD --}}
            <section class="profile-card">

                <div class="profile-card-heading">

                    <div class="profile-card-icon profile-icon-blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2zm10-9V7a4 4 0 00-8 0v3h8z"/>
                        </svg>
                    </div>

                    <div>
                        <h2>
                            Update Password
                        </h2>

                        <p>
                            Use a strong password to keep your account secure.
                        </p>
                    </div>

                </div>

                <div class="profile-form-container">

                    @include('profile.partials.update-password-form')

                </div>

            </section>


            {{-- DELETE ACCOUNT --}}
            <section class="profile-card profile-danger-card">

                <div class="profile-card-heading">

                    <div class="profile-card-icon profile-icon-red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"/>
                        </svg>
                    </div>

                    <div>
                        <h2>
                            Delete Account
                        </h2>

                        <p>
                            Permanently delete your account and all associated data.
                        </p>
                    </div>

                </div>

                <div class="profile-form-container">

                    @include('profile.partials.delete-user-form')

                </div>

            </section>

        </div>

    </div>

</x-app-layout>
