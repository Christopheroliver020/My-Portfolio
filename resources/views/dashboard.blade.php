<x-app-layout>

    <div class="dashboard-page">

        {{-- =====================================================
             DESKTOP SIDEBAR
        ====================================================== --}}

        <aside class="dashboard-sidebar">

            {{-- BRAND --}}
            <div class="dashboard-brand">

                <a href="{{ route('dashboard') }}"
                   class="dashboard-brand-link">

                    <div class="dashboard-brand-icon">
                        P
                    </div>

                    <div>
                        <h1 class="dashboard-brand-title">
                            PORTFOLIO
                        </h1>

                        <p class="dashboard-brand-subtitle">
                            Admin Panel
                        </p>
                    </div>

                </a>

            </div>


            {{-- NAVIGATION --}}
            <nav class="dashboard-nav">

                <div class="dashboard-nav-section">

                    <p class="dashboard-nav-label">
                        Overview
                    </p>


                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="dashboard-nav-link active">

                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>

                        </svg>

                        <span>Dashboard</span>

                    </a>


                    {{-- Posts --}}
                    <a href="{{ route('posts.index') }}"
                       class="dashboard-nav-link">

                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"/>

                        </svg>

                        <span>Posts</span>

                    </a>


                    {{-- Messages --}}
                    <div class="dashboard-nav-item">

                        <a href="{{ route('messages.index') }}"
                           class="dashboard-nav-link">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 10h8M8 14h5m-9 6l-3 1 1-3a8 8 0 1114.5-4"/>

                            </svg>

                            <span>Messages</span>

                        </a>

                        @if($unreadMessages > 0)

                            <span class="dashboard-message-badge">
                                {{ $unreadMessages }}
                            </span>

                        @endif

                    </div>


                    {{-- Visitors --}}
                    <a href="{{ route('visitors.index') }}"
                       class="dashboard-nav-link">

                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>

                        </svg>

                        <span>Visitors</span>

                    </a>

                </div>


                <div class="dashboard-divider"></div>


                <div class="dashboard-nav-section">

                    <p class="dashboard-nav-label">
                        Account
                    </p>


                    {{-- Profile --}}
                    <a href="{{ route('profile.edit') }}"
                       class="dashboard-nav-link">

                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

                        </svg>

                        <span>Profile</span>

                    </a>


                    {{-- Logout --}}
                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="dashboard-logout">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>

                            </svg>

                            <span>Logout</span>

                        </button>

                    </form>

                </div>

            </nav>

        </aside>


        {{-- =====================================================
             MOBILE SIDEBAR
        ====================================================== --}}

        <div class="dashboard-mobile-sidebar">

            <div class="dashboard-mobile-sidebar-header">

                <a href="{{ route('dashboard') }}"
                   class="dashboard-brand-link">

                    <div class="dashboard-brand-icon">
                        P
                    </div>

                    <div>
                        <h1 class="dashboard-brand-title">
                            PORTFOLIO
                        </h1>

                        <p class="dashboard-brand-subtitle">
                            Admin Panel
                        </p>
                    </div>

                </a>


                <button type="button"
                        class="dashboard-mobile-close"
                        id="dashboardCloseMenu">

                    <svg fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>


            <div class="dashboard-mobile-sidebar-content">

                <nav class="dashboard-nav">

                    <div class="dashboard-nav-section">

                        <p class="dashboard-nav-label">
                            Overview
                        </p>

                        <a href="{{ route('dashboard') }}"
                           class="dashboard-nav-link active">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>

                            </svg>

                            <span>Dashboard</span>

                        </a>


                        <a href="{{ route('posts.index') }}"
                           class="dashboard-nav-link">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"/>

                            </svg>

                            <span>Posts</span>

                        </a>


                        <a href="{{ route('messages.index') }}"
                           class="dashboard-nav-link">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 10h8M8 14h5m-9 6l-3 1 1-3a8 8 0 1114.5-4"/>

                            </svg>

                            <span>Messages</span>

                        </a>


                        <a href="{{ route('visitors.index') }}"
                           class="dashboard-nav-link">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>

                            </svg>

                            <span>Visitors</span>

                        </a>

                    </div>


                    <div class="dashboard-divider"></div>


                    <div class="dashboard-nav-section">

                        <p class="dashboard-nav-label">
                            Account
                        </p>

                        <a href="{{ route('profile.edit') }}"
                           class="dashboard-nav-link">

                            <svg fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

                            </svg>

                            <span>Profile</span>

                        </a>


                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                    class="dashboard-logout">

                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>

                                </svg>

                                <span>Logout</span>

                            </button>

                        </form>

                    </div>

                </nav>

            </div>

        </div>


        {{-- MOBILE OVERLAY --}}
        <div class="dashboard-mobile-overlay"
             id="dashboardMobileOverlay"></div>


        {{-- =====================================================
             MAIN
        ====================================================== --}}

        <main class="dashboard-main">


            {{-- =================================================
                 TOPBAR
            ================================================== --}}

            <header class="dashboard-topbar">

                <div class="dashboard-topbar-left">

                    <button type="button"
                            class="dashboard-mobile-menu"
                            id="dashboardOpenMenu">

                        <svg fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>

                        </svg>

                    </button>


                    <div>

                        <p class="dashboard-welcome">
                            Welcome back
                        </p>

                        <h2 class="dashboard-topbar-title">
                            {{ Auth::user()->name }}
                        </h2>

                    </div>

                </div>


                {{-- PROFILE --}}
                <a href="{{ route('profile.edit') }}"
                   class="dashboard-profile">

                    <div class="dashboard-profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="dashboard-profile-info">

                        <p class="dashboard-profile-name">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="dashboard-profile-role">
                            Administrator
                        </p>

                    </div>

                </a>

            </header>


            {{-- =================================================
                 CONTENT
            ================================================== --}}

            <div class="dashboard-content">


                {{-- PAGE HEADING --}}

                <div class="dashboard-page-heading">

                    <p class="dashboard-eyebrow">
                        Overview
                    </p>

                    <h1>
                        Dashboard
                    </h1>

                    <p>
                        Here's what's happening with your portfolio today.
                    </p>

                </div>


                {{-- =================================================
                     STAT CARDS
                ================================================== --}}

                <div class="dashboard-stat-grid">


                    {{-- POSTS --}}

                    <div class="dashboard-stat-card stat-indigo">

                        <div class="dashboard-stat-top">

                            <div class="dashboard-stat-icon">

                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"/>

                                </svg>

                            </div>

                            <span class="dashboard-stat-total">
                                Total
                            </span>

                        </div>

                        <p class="dashboard-stat-label">
                            Posts
                        </p>

                        <p class="dashboard-stat-value">
                            {{ $totalPosts }}
                        </p>

                    </div>


                    {{-- MESSAGES --}}

                    <div class="dashboard-stat-card stat-blue">

                        <div class="dashboard-stat-top">

                            <div class="dashboard-stat-icon">

                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M8 10h8M8 14h5m-9 6l-3 1 1-3a8 8 0 1114.5-4"/>

                                </svg>

                            </div>

                            <span class="dashboard-stat-total">
                                Total
                            </span>

                        </div>

                        <p class="dashboard-stat-label">
                            Messages
                        </p>

                        <p class="dashboard-stat-value">
                            {{ $totalMessages }}
                        </p>

                    </div>


                    {{-- UNREAD --}}

                    <div class="dashboard-stat-card stat-red">

                        <div class="dashboard-stat-top">

                            <div class="dashboard-stat-icon">

                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>

                                </svg>

                            </div>

                            <span class="dashboard-stat-total">
                                Attention
                            </span>

                        </div>

                        <p class="dashboard-stat-label">
                            Unread Messages
                        </p>

                        <p class="dashboard-stat-value">
                            {{ $unreadMessages }}
                        </p>

                    </div>


                    {{-- VISITORS --}}

                    <div class="dashboard-stat-card stat-green">

                        <div class="dashboard-stat-top">

                            <div class="dashboard-stat-icon">

                                <svg fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>

                                </svg>

                            </div>

                            <span class="dashboard-stat-total">
                                Total
                            </span>

                        </div>

                        <p class="dashboard-stat-label">
                            Visitors
                        </p>

                        <p class="dashboard-stat-value">
                            {{ $totalVisitors }}
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     LOWER CONTENT
                ================================================== --}}

                <div class="dashboard-lower-grid">


                    {{-- WELCOME CARD --}}

                    <div class="dashboard-welcome-card">

                        <p class="dashboard-welcome-label">
                            Portfolio Management
                        </p>

                        <h2 class="dashboard-welcome-title">
                            Keep your portfolio up to date.
                        </h2>

                        <p class="dashboard-welcome-description">
                            Manage your posts, check visitor activity,
                            and respond to messages from your portfolio.
                        </p>


                        <div class="dashboard-actions">

                            <a href="{{ route('posts.create') }}"
                               class="dashboard-button dashboard-button-primary">

                                Create Post

                            </a>

                            <a href="{{ route('messages.index') }}"
                               class="dashboard-button dashboard-button-secondary">

                                View Messages

                            </a>

                        </div>

                    </div>


                    {{-- QUICK ACTIONS --}}

                    <div class="dashboard-quick-card">

                        <h3 class="dashboard-quick-title">
                            Quick Actions
                        </h3>


                        <div class="dashboard-quick-list">

                            <a href="{{ route('posts.create') }}"
                               class="dashboard-quick-link">

                                <span class="dashboard-quick-text">
                                    Create a post
                                </span>

                                <span class="dashboard-quick-arrow">
                                    →
                                </span>

                            </a>


                            <a href="{{ route('messages.index') }}"
                               class="dashboard-quick-link">

                                <span class="dashboard-quick-text">
                                    Check messages
                                </span>

                                <span class="dashboard-quick-arrow">
                                    →
                                </span>

                            </a>


                            <a href="{{ route('profile.edit') }}"
                               class="dashboard-quick-link">

                                <span class="dashboard-quick-text">
                                    Edit profile
                                </span>

                                <span class="dashboard-quick-arrow">
                                    →
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>


    {{-- =========================================================
         MOBILE MENU SCRIPT
    ========================================================== --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const page = document.querySelector('.dashboard-page');

            const openButton =
                document.getElementById('dashboardOpenMenu');

            const closeButton =
                document.getElementById('dashboardCloseMenu');

            const overlay =
                document.getElementById('dashboardMobileOverlay');


            function openMenu() {
                page.classList.add('mobile-menu-open');
                document.body.style.overflow = 'hidden';
            }


            function closeMenu() {
                page.classList.remove('mobile-menu-open');
                document.body.style.overflow = '';
            }


            if (openButton) {
                openButton.addEventListener('click', openMenu);
            }


            if (closeButton) {
                closeButton.addEventListener('click', closeMenu);
            }


            if (overlay) {
                overlay.addEventListener('click', closeMenu);
            }


            document.querySelectorAll(
                '.dashboard-mobile-sidebar a'
            ).forEach(function (link) {

                link.addEventListener('click', closeMenu);

            });

        });
    </script>

</x-app-layout>
