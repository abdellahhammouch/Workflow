<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tableau de bord | {{ config('app.name', 'Workflow') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700" rel="stylesheet" />

        <style>
            :root {
                color-scheme: light;
                --bg: #f8fafc;
                --panel: rgba(255, 255, 255, 0.84);
                --line: rgba(15, 23, 42, 0.08);
                --text: #0f172a;
                --muted: #475569;
                --accent: #f59e0b;
                --dark-panel: #0f172a;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Space Grotesk', sans-serif;
                background:
                    radial-gradient(circle at top left, rgba(245, 158, 11, 0.2), transparent 28%),
                    linear-gradient(180deg, #fafaf9 0%, #f5f5f4 100%);
                color: var(--text);
            }

            .shell {
                min-height: 100vh;
                padding: 24px;
            }

            .card {
                width: min(1080px, 100%);
                margin: 0 auto;
                border: 1px solid var(--line);
                border-radius: 28px;
                background: var(--panel);
                box-shadow: 0 24px 60px rgba(148, 163, 184, 0.22);
                backdrop-filter: blur(16px);
                padding: 32px;
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
                letter-spacing: 0.35em;
                font-size: 0.8rem;
                color: #b45309;
            }

            h1 {
                margin: 0;
                font-size: clamp(2.2rem, 4vw, 4rem);
                line-height: 1.05;
            }

            .lead {
                margin-top: 18px;
                max-width: 750px;
                color: var(--muted);
                line-height: 1.8;
            }

            .logout {
                border: 1px solid rgba(15, 23, 42, 0.18);
                border-radius: 16px;
                background: white;
                color: var(--text);
                padding: 14px 18px;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
            }

            .logout:hover {
                background: var(--dark-panel);
                color: white;
                border-color: var(--dark-panel);
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
                margin-top: 36px;
            }

            .tile {
                border-radius: 24px;
                padding: 24px;
                border: 1px solid var(--line);
            }

            .tile-dark {
                background: var(--dark-panel);
                color: #e2e8f0;
            }

            .tile-light {
                background: #fff7ed;
                border-color: rgba(245, 158, 11, 0.24);
            }

            .tile p {
                margin: 0;
            }

            .tile .label {
                text-transform: uppercase;
                letter-spacing: 0.25em;
                font-size: 0.76rem;
            }

            .tile .value {
                margin-top: 16px;
                font-size: 1.8rem;
                font-weight: 700;
            }

            .tile .copy {
                margin-top: 12px;
                line-height: 1.75;
                color: inherit;
                opacity: 0.84;
            }

            @media (max-width: 820px) {
                .card {
                    padding: 24px;
                }

                .header {
                    flex-direction: column;
                }

                .grid {
                    grid-template-columns: 1fr;
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
                        <h1>Bonjour {{ auth()->user()->name }}</h1>
                        <p class="lead">
                            Vous etes connecte. Cette page est protegee par le middleware Laravel <code>auth</code>, la session est regeneree apres login, puis invalidee proprement a la deconnexion.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout">Se deconnecter</button>
                    </form>
                </div>

                <section class="grid">
                    <article class="tile tile-dark">
                        <p class="label">Session</p>
                        <p class="value">{{ auth()->user()->email }}</p>
                        <p class="copy">
                            Le login repose sur la couche d'authentification native de Laravel et utilise la table des utilisateurs existante.
                        </p>
                    </article>

                    <article class="tile tile-light">
                        <p class="label">Etat</p>
                        <p class="value">Acces autorise</p>
                        <p class="copy">
                            Vous pouvez maintenant connecter d'autres pages, des roles ou des permissions sur cette base simple.
                        </p>
                    </article>
                </section>
            </main>
        </div>
    </body>
</html>
