<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Workflow') }} | Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700" rel="stylesheet" />

        <style>
            :root {
                color-scheme: dark;
                --bg: #08111f;
                --panel: rgba(12, 19, 33, 0.82);
                --card: rgba(255, 255, 255, 0.05);
                --line: rgba(255, 255, 255, 0.12);
                --text: #ecf3ff;
                --muted: #9fb1c9;
                --accent: #f7b733;
                --accent-strong: #f59e0b;
                --shadow: rgba(0, 0, 0, 0.38);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Space Grotesk', sans-serif;
                color: var(--text);
                background:
                    radial-gradient(circle at top left, rgba(247, 183, 51, 0.22), transparent 30%),
                    radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.16), transparent 24%),
                    linear-gradient(145deg, #04070d 0%, #08111f 45%, #111827 100%);
            }

            .shell {
                min-height: 100vh;
                padding: 28px;
                display: grid;
                place-items: center;
            }

            .hero {
                width: min(1120px, 100%);
                display: grid;
                grid-template-columns: 1.1fr 0.9fr;
                gap: 24px;
                align-items: stretch;
            }

            .panel,
            .card {
                border: 1px solid var(--line);
                border-radius: 32px;
                backdrop-filter: blur(20px);
                box-shadow: 0 28px 80px var(--shadow);
            }

            .panel {
                padding: 48px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.03));
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 40px;
            }

            .eyebrow {
                margin: 0 0 18px;
                color: #ffd978;
                font-size: 0.82rem;
                letter-spacing: 0.34em;
                text-transform: uppercase;
            }

            h1,
            h2 {
                margin: 0;
                line-height: 1.02;
            }

            h1 {
                max-width: 11ch;
                font-size: clamp(3rem, 6vw, 5.4rem);
            }

            .copy {
                margin-top: 22px;
                max-width: 60ch;
                color: var(--muted);
                font-size: 1rem;
                line-height: 1.9;
            }

            .actions {
                display: flex;
                flex-wrap: wrap;
                gap: 14px;
                margin-top: 32px;
            }

            .button,
            .button-secondary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 15px 20px;
                border-radius: 18px;
                text-decoration: none;
                font-weight: 700;
                transition: transform 0.18s ease, background 0.18s ease, border-color 0.18s ease;
            }

            .button {
                background: var(--accent);
                color: #111827;
            }

            .button-secondary {
                border: 1px solid var(--line);
                color: var(--text);
                background: rgba(255, 255, 255, 0.03);
            }

            .button:hover,
            .button-secondary:hover {
                transform: translateY(-1px);
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .mini-card,
            .card {
                background: var(--card);
            }

            .mini-card {
                border: 1px solid var(--line);
                border-radius: 24px;
                padding: 20px;
            }

            .mini-card p {
                margin: 0;
            }

            .mini-card .label {
                color: #ffd978;
                font-size: 0.78rem;
                letter-spacing: 0.22em;
                text-transform: uppercase;
            }

            .mini-card .value {
                margin-top: 12px;
                font-size: 1.2rem;
                font-weight: 700;
            }

            .mini-card .meta {
                margin-top: 10px;
                color: var(--muted);
                line-height: 1.7;
            }

            .card {
                padding: 32px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 28px;
            }

            .card h2 {
                font-size: clamp(1.9rem, 4vw, 3rem);
            }

            .stack {
                display: grid;
                gap: 16px;
            }

            .feature {
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 18px;
                background: rgba(255, 255, 255, 0.03);
            }

            .feature-title {
                margin: 0;
                font-size: 1rem;
                font-weight: 700;
            }

            .feature-copy {
                margin: 8px 0 0;
                color: var(--muted);
                line-height: 1.75;
            }

            @media (max-width: 900px) {
                .hero {
                    grid-template-columns: 1fr;
                }

                .panel,
                .card {
                    padding: 28px;
                }

                .grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <main class="hero">
                <section class="panel">
                    <div>
                        <p class="eyebrow">Workflow</p>
                        <h1>Clean login views for a simple Laravel app.</h1>
                        <p class="copy">
                            This project now has a proper guest landing page, a dedicated login screen, and a protected dashboard. It is ready for a simple session-based auth flow without extra packages.
                        </p>

                        <div class="actions">
                            <a href="{{ route('login') }}" class="button">Open Login</a>
                            <a href="{{ route('login') }}" class="button-secondary">Use Demo Account</a>
                        </div>
                    </div>

                    <div class="grid">
                        <article class="mini-card">
                            <p class="label">Demo Email</p>
                            <p class="value">test@example.com</p>
                            <p class="meta">Available through the default database seeder.</p>
                        </article>

                        <article class="mini-card">
                            <p class="label">Demo Password</p>
                            <p class="value">password</p>
                            <p class="meta">Use this account to test the login flow quickly.</p>
                        </article>
                    </div>
                </section>

                <aside class="card">
                    <div>
                        <p class="eyebrow">What You Get</p>
                        <h2>A focused auth entry point.</h2>
                        <p class="copy" style="margin-top: 16px;">
                            The views are designed to feel intentional, readable, and ready to extend with registration, password reset, or profile pages.
                        </p>
                    </div>

                    <div class="stack">
                        <section class="feature">
                            <p class="feature-title">Guest landing page</p>
                            <p class="feature-copy">A clear first screen with a direct path to the login form and demo credentials.</p>
                        </section>

                        <section class="feature">
                            <p class="feature-title">Dedicated login view</p>
                            <p class="feature-copy">A focused form with validation feedback and a remember-me option.</p>
                        </section>

                        <section class="feature">
                            <p class="feature-title">Protected dashboard</p>
                            <p class="feature-copy">A simple authenticated page that confirms the session and allows logout.</p>
                        </section>
                    </div>
                </aside>
            </main>
        </div>
    </body>
</html>
