<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Christopher — IT Student and Vibe Coder"
    >

    <title>Topher — Portfolio</title>

    @vite('resources/js/app.js')
</head>

<body>

    <!-- =====================================================
         THREE.JS
    ====================================================== -->

    <canvas id="three-canvas"></canvas>


    <!-- =====================================================
         PORTFOLIO
    ====================================================== -->

    <div class="portfolio-page">


        <!-- =================================================
             NAVIGATION
        ================================================== -->

        <nav class="portfolio-nav">

            <a
                href="#home"
                class="logo"
            >
                TOPHER
            </a>


            <details class="mobile-nav">
                <summary class="nav-toggle" aria-label="Toggle navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </summary>

                <ul id="primary-navigation" class="nav-links">

                    <li>
                        <a href="#about">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="#skills">
                            Skills
                        </a>
                    </li>

                    <li>
                        <a href="#projects">
                            Posts
                        </a>
                    </li>

                    <li>
                        <a href="#contact">
                            Contact
                        </a>
                    </li>

                </ul>
            </details>

        </nav>


        <!-- =================================================
             HERO
        ================================================== -->

        <main id="home">

            <section class="hero">

                <div class="hero-content">

                    <p class="hero-eyebrow">
                        IT STUDENT / VIBE CODER
                    </p>

                    <h1>
                        Hello,
                        <span>I'm Christopher.</span>
                    </h1>

                    <p class="hero-description">
                        I build modern web applications,
                        interactive digital experiences,
                        and creative projects using
                        technology and design.
                    </p>


                    <div class="hero-actions">

                        <a
                            href="#projects"
                            class="btn btn-primary"
                        >
                            Explore My Work
                        </a>

                        <a
                            href="#contact"
                            class="btn btn-outline"
                        >
                            Contact Me
                        </a>

                    </div>

                </div>


                <div class="scroll-indicator">

                    <span class="scroll-line"></span>

                    Scroll to explore

                </div>

            </section>


            <!-- =================================================
                 ABOUT
            ================================================== -->

            <section
                id="about"
                class="section"
            >

                <div class="section-inner">

                    <div class="section-number">
                        01 / ABOUT
                    </div>

                    <h2 class="section-title">
                        About Me
                    </h2>

                    <p class="section-description">
                        I'm an IT student passionate about
                        building web applications and
                        experimenting with modern
                        technologies. I enjoy turning ideas
                        into functional and interactive
                        digital experiences.
                    </p>

                </div>

            </section>


            <!-- =================================================
                 SKILLS
            ================================================== -->

            <section
                id="skills"
                class="section"
            >

                <div class="section-inner">

                    <div class="section-number">
                        02 / SKILLS
                    </div>

                    <h2 class="section-title">
                        What I Use
                    </h2>


                    <div class="skills-grid">

                        <div class="skill-card">

                            <span class="skill-number">
                                01
                            </span>

                            <span class="skill-name">
                                Laravel
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                02
                            </span>

                            <span class="skill-name">
                                PHP
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                03
                            </span>

                            <span class="skill-name">
                                MySQL
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                04
                            </span>

                            <span class="skill-name">
                                JavaScript
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                05
                            </span>

                            <span class="skill-name">
                                Three.js
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                06
                            </span>

                            <span class="skill-name">
                                HTML / CSS
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                07
                            </span>

                            <span class="skill-name">
                                Git
                            </span>

                        </div>


                        <div class="skill-card">

                            <span class="skill-number">
                                08
                            </span>

                            <span class="skill-name">
                                UI / UX
                            </span>

                        </div>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 PROJECTS / POSTS
            ================================================== -->

            <section
                id="projects"
                class="section"
            >

                <div class="section-inner">

                    <div class="section-number">
                        03 / POSTS
                    </div>

                    <h2 class="section-title">
                        My Posts
                    </h2>


                    @if ($posts->count())

                        <div class="posts-grid">

                            @foreach($posts as $post)

                                <article class="work-card">

                                    <h2>
                                        {{ $post->title }}
                                    </h2>

                                    @if($post->type === 'text')

                                        <p>
                                            {{ $post->content }}
                                        </p>

                                    @elseif($post->type === 'image')

                                        @if($post->media_path)
                                            <img
                                                src="{{ asset('storage/' . $post->media_path) }}"
                                                alt="{{ $post->title }}"
                                            >
                                        @endif

                                        @if($post->content)
                                            <p>{{ $post->content }}</p>
                                        @endif

                                    @elseif($post->type === 'video')

                                        <video
                                            class="work-card-video"
                                            data-hover-video
                                            muted
                                            playsinline
                                            preload="metadata"
                                            @if($post->thumbnail_path)
                                                poster="{{ asset('storage/' . $post->thumbnail_path) }}"
                                            @endif
                                        >
                                            <source
                                                src="{{ asset('storage/' . $post->media_path) }}"
                                                type="video/mp4"
                                            >
                                        </video>

                                        @if($post->content)
                                            <p>{{ $post->content }}</p>
                                        @endif

                                    @endif

                                    <small>
                                        {{ $post->created_at->format('M d, Y') }}
                                    </small>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <p class="section-description">
                            My projects and latest work
                            will appear here.
                        </p>

                    @endif

                </div>

            </section>


            <!-- =================================================
                 CONTACT
            ================================================== -->

            <section
                id="contact"
                class="section"
            >

                <div class="section-inner">

                    <div class="contact-grid">


                        <div class="contact-info">

                            <div class="section-number">
                                04 / CONTACT
                            </div>

                            <h2 class="section-title">
                                Let's Talk.
                            </h2>

                            <p>
                                Have a question, project idea,
                                or just want to say hello?
                                Send me a message.
                            </p>

                        </div>


                        <form
                            action="{{ route('contact.store') }}"
                            method="POST"
                            class="contact-form"
                        >

                            @csrf


                            <div class="form-row">

                                <input
                                    type="text"
                                    name="name"
                                    class="form-input"
                                    placeholder="Your name"
                                    value="{{ old('name') }}"
                                    required
                                >

                                <input
                                    type="email"
                                    name="email"
                                    class="form-input"
                                    placeholder="Your email"
                                    value="{{ old('email') }}"
                                    required
                                >

                            </div>


                            <textarea
                                name="message"
                                class="form-input"
                                placeholder="Your message"
                                required
                            ></textarea>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Send Message
                            </button>

                        </form>

                    </div>

                </div>

            </section>

        </main>


        <!-- =================================================
             FOOTER
        ================================================== -->

        <footer class="footer">

            © {{ date('Y') }}
            Christopher.
            All rights reserved.

        </footer>

    </div>

</body>

</html>
