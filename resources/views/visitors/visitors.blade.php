<x-app-layout>

    <div class="visitors-page">

        <div class="visitors-container">

            {{-- HEADER --}}
            <header class="visitors-header">

                <div class="visitors-header-content">

                    <span class="visitors-eyebrow">
                        Analytics & Activity
                    </span>

                    <h1 class="visitors-title">
                        Visitors
                    </h1>

                    <p class="visitors-description">
                        Monitor visitors and activity on your portfolio.
                    </p>

                </div>

                <a
                    href="{{ route('dashboard') }}"
                    class="visitors-dashboard-button"
                >
                    <span>←</span>
                    <span>Dashboard</span>
                </a>

            </header>


            {{-- VISITORS --}}
            <main class="visitors-list">

                @forelse($visitors as $visitor)

                    <article class="visitor-card">

                        {{-- CARD HEADER --}}
                        <div class="visitor-card-header">

                            <div class="visitor-identity">

                                <div class="visitor-avatar">

                                    {{
                                        strtoupper(
                                            substr(
                                                $visitor->ip_address ?? 'V',
                                                0,
                                                1
                                            )
                                        )
                                    }}

                                </div>

                                <div class="visitor-main-info">

                                    <h2 class="visitor-title">
                                        Visitor
                                    </h2>

                                    <p class="visitor-ip">
                                        {{ $visitor->ip_address ?? 'Unknown IP' }}
                                    </p>

                                </div>

                            </div>


                            <div class="visitor-time">

                                @if($visitor->visited_at)

                                    {{ $visitor->visited_at->diffForHumans() }}

                                @else

                                    Unknown

                                @endif

                            </div>

                        </div>


                        {{-- DETAILS --}}
                        <div class="visitor-details">

                            {{-- IP --}}
                            <div class="visitor-detail">

                                <span class="visitor-detail-label">
                                    IP Address
                                </span>

                                <span class="visitor-detail-value">
                                    {{ $visitor->ip_address ?? 'Unknown' }}
                                </span>

                            </div>


                            {{-- PAGE --}}
                            <div class="visitor-detail">

                                <span class="visitor-detail-label">
                                    Page Visited
                                </span>

                                <span class="visitor-detail-value visitor-page-value">
                                    /{{ ltrim($visitor->page ?? '', '/') }}
                                </span>

                            </div>


                            {{-- VISITED --}}
                            <div class="visitor-detail">

                                <span class="visitor-detail-label">
                                    Visited At
                                </span>

                                <span class="visitor-detail-value">

                                    @if($visitor->visited_at)

                                        {{ $visitor->visited_at->format('M d, Y h:i A') }}

                                    @else

                                        Unknown

                                    @endif

                                </span>

                            </div>


                            {{-- USER AGENT --}}
                            <div class="visitor-detail visitor-user-agent">

                                <span class="visitor-detail-label">
                                    User Agent
                                </span>

                                <span class="visitor-detail-value">
                                    {{ $visitor->user_agent ?? 'Unknown' }}
                                </span>

                            </div>

                        </div>


                        {{-- FOOTER --}}
                        <div class="visitor-card-footer">

                            <span class="visitor-created">

                                @if($visitor->visited_at)

                                    Visited
                                    {{ $visitor->visited_at->format('M d, Y • h:i A') }}

                                @else

                                    Visit time unavailable

                                @endif

                            </span>


                            <span class="visitor-status">
                                Recorded
                            </span>

                        </div>

                    </article>

                @empty

                    <div class="visitors-empty">

                        <div class="visitors-empty-icon">
                            ◉
                        </div>

                        <h2>
                            No visitors yet
                        </h2>

                        <p>
                            Visitor activity from your portfolio
                            will appear here.
                        </p>

                    </div>

                @endforelse

            </main>


            {{-- PAGINATION --}}
            @if($visitors->hasPages())

                <div class="visitors-pagination">

                    {{ $visitors->links() }}

                </div>

            @endif

        </div>

    </div>

</x-app-layout>