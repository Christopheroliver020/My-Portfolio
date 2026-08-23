<x-app-layout>

    <div class="messages-page">

        <div class="messages-container">

            {{-- =====================================================
                 HEADER
            ====================================================== --}}

            <header class="messages-header">

                <div class="messages-header-content">

                    <span class="messages-eyebrow">
                        COMMUNICATION
                    </span>

                    <h1 class="messages-title">
                        Messages
                    </h1>

                    <p class="messages-description">
                        Manage messages and inquiries from your portfolio.
                    </p>

                </div>

                <a
                    href="{{ route('dashboard') }}"
                    class="messages-dashboard-button"
                >
                    <span>←</span>
                    <span>Dashboard</span>
                </a>

            </header>


            {{-- =====================================================
                 SUCCESS MESSAGE
            ====================================================== --}}

            @if(session('success'))

                <div class="messages-success">

                    <span class="messages-success-icon">
                        ✓
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- =====================================================
                 MESSAGE LIST
            ====================================================== --}}

            <main class="messages-list">

                @forelse($messages as $message)

                    <article
                        class="message-card {{ $message->is_read ? 'read' : 'unread' }}"
                    >

                        {{-- MESSAGE HEADER --}}

                        <div class="message-card-header">

                            <div class="message-sender">

                                <div class="message-avatar">
                                    {{ strtoupper(substr($message->name ?? 'U', 0, 1)) }}
                                </div>

                                <div class="message-sender-info">

                                    <h2 class="message-name">
                                        {{ $message->name }}
                                    </h2>

                                    <p class="message-email">
                                        {{ $message->email }}
                                    </p>

                                </div>

                            </div>


                            {{-- STATUS --}}

                            <div class="message-status">

                                @if($message->is_read)

                                    <span class="message-read">
                                        Read
                                    </span>

                                @else

                                    <span class="message-unread">
                                        New
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- MESSAGE CONTENT --}}

                        <div class="message-content">

                            <h3>
                                {{ $message->subject ?? 'No Subject' }}
                            </h3>

                            <p>
                                {{ $message->message }}
                            </p>

                        </div>


                        {{-- MESSAGE FOOTER --}}

                        <div class="message-footer">

                            <span class="message-time">
                                {{ $message->created_at->diffForHumans() }}
                            </span>


                            <div class="message-actions">

                                {{-- MARK AS READ --}}

                                @if(!$message->is_read)

                                    <form
                                        action="{{ route('messages.read', $message) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="message-action read-action"
                                        >
                                            ✓ Mark as Read
                                        </button>

                                    </form>

                                @endif


                                {{-- DELETE --}}

                                <form
                                    action="{{ route('messages.destroy', $message) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this message?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="message-action delete-action"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

                @empty

                    {{-- =================================================
                         EMPTY STATE
                    ================================================== --}}

                    <div class="messages-empty">

                        <div class="messages-empty-icon">
                            ✉
                        </div>

                        <h2>
                            No messages yet
                        </h2>

                        <p>
                            Messages submitted through your portfolio
                            contact form will appear here.
                        </p>

                        <a
                            href="{{ route('dashboard') }}"
                            class="messages-empty-button"
                        >
                            ← Back to Dashboard
                        </a>

                    </div>

                @endforelse

            </main>


            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}

            @if($messages->hasPages())

                <div class="messages-pagination">

                    {{ $messages->links() }}

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
