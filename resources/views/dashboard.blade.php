<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Workflow') }} | Dashboard</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700" rel="stylesheet" />

        <style>
            :root {
                color-scheme: light;
                --bg: #f8fafc;
                --card: rgba(255, 255, 255, 0.84);
                --line: rgba(15, 23, 42, 0.08);
                --text: #0f172a;
                --muted: #53657e;
                --accent: #f59e0b;
                --dark: #0f172a;
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
                    radial-gradient(circle at top left, rgba(245, 158, 11, 0.18), transparent 28%),
                    linear-gradient(180deg, #fafaf9 0%, #f4f4f5 100%);
            }

            .shell {
                min-height: 100vh;
                padding: 28px;
            }

            .card {
                width: min(1120px, 100%);
                margin: 0 auto;
                border: 1px solid var(--line);
                border-radius: 30px;
                background: var(--card);
                box-shadow: 0 24px 70px rgba(148, 163, 184, 0.24);
                backdrop-filter: blur(18px);
                padding: 34px;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 24px;
            }

            .eyebrow {
                margin: 0 0 16px;
                text-transform: uppercase;
                letter-spacing: 0.34em;
                font-size: 0.8rem;
                color: #b45309;
            }

            h1,
            p {
                margin: 0;
            }

            h1 {
                font-size: clamp(2.4rem, 4vw, 4.2rem);
                line-height: 1.03;
            }

            .copy {
                margin-top: 18px;
                max-width: 62ch;
                color: var(--muted);
                line-height: 1.85;
            }

            .logout {
                border: 1px solid rgba(15, 23, 42, 0.16);
                border-radius: 16px;
                background: white;
                color: var(--text);
                padding: 14px 18px;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                transition: background 0.18s ease, color 0.18s ease, border-color 0.18s ease;
            }

            .logout:hover {
                background: var(--dark);
                color: white;
                border-color: var(--dark);
            }

            .grid {
                margin-top: 34px;
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 18px;
            }

            .tile {
                border-radius: 24px;
                padding: 22px;
                border: 1px solid var(--line);
                background: white;
            }

            .tile-dark {
                background: var(--dark);
                color: #edf4ff;
            }

            .tile-accent {
                background: #fff7ed;
                border-color: rgba(245, 158, 11, 0.24);
            }

            .tile-label {
                font-size: 0.78rem;
                text-transform: uppercase;
                letter-spacing: 0.24em;
            }

            .tile-value {
                margin-top: 14px;
                font-size: 1.6rem;
                font-weight: 700;
            }

            .tile-copy {
                margin-top: 10px;
                line-height: 1.75;
                color: inherit;
                opacity: 0.84;
            }

            @media (max-width: 960px) {
                .grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 760px) {
                .card {
                    padding: 24px;
                }

                .header {
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <main class="card">
                <div class="header">
                    <div>
                        <p class="eyebrow">Dashboard</p>
                        <h1>Hello {{ auth()->user()->name }}</h1>
                        <p class="copy">
                            You are signed in. This page is protected by Laravel's <code>auth</code> middleware, so it only renders when a valid session exists.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout">Log Out</button>
                    </form>
                </div>

                <section class="grid">
                    <article class="tile tile-dark">
                        <p class="tile-label">Session</p>
                        <p class="tile-value">{{ auth()->user()->email }}</p>
                        <p class="tile-copy">The login flow regenerates the session after sign-in and invalidates it on logout.</p>
                    </article>

                    <article class="tile tile-accent">
                        <p class="tile-label">Access</p>
                        <p class="tile-value">Authorized</p>
                        <p class="tile-copy">This confirms the view is behind the authentication wall.</p>
                    </article>

                    <article class="tile">
                        <p class="tile-label">Next Step</p>
                        <p class="tile-value">Extend it</p>
                        <p class="tile-copy">You can now add registration, roles, profile settings, or password reset screens on top of this base.</p>
                    </article>
                </section>
            </main>
        </div>
    </body>
</html>
