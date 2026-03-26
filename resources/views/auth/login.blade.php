<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Connexion | {{ config('app.name', 'Workflow') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700" rel="stylesheet" />

        <style>
            :root {
                color-scheme: dark;
                --bg: #020617;
                --panel: rgba(15, 23, 42, 0.88);
                --panel-soft: rgba(15, 23, 42, 0.62);
                --line: rgba(255, 255, 255, 0.12);
                --text: #e2e8f0;
                --muted: #94a3b8;
                --accent: #fbbf24;
                --accent-soft: rgba(251, 191, 36, 0.18);
                --danger: #fda4af;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Space Grotesk', sans-serif;
                background:
                    radial-gradient(circle at top, rgba(251, 191, 36, 0.24), transparent 32%),
                    linear-gradient(160deg, #020617 0%, #0f172a 50%, #111827 100%);
                color: var(--text);
            }

            .shell {
                min-height: 100vh;
                display: grid;
                place-items: center;
                padding: 24px;
            }

            .card {
                width: min(1080px, 100%);
                display: grid;
                grid-template-columns: 1.05fr 0.95fr;
                overflow: hidden;
                border: 1px solid var(--line);
                border-radius: 28px;
                background: rgba(255, 255, 255, 0.04);
                box-shadow: 0 30px 80px rgba(2, 6, 23, 0.45);
                backdrop-filter: blur(18px);
            }

            .panel,
            .form-panel {
                padding: 40px;
            }

            .panel {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 32px;
                background: var(--panel-soft);
            }

            .eyebrow {
                margin: 0 0 16px;
                text-transform: uppercase;
                letter-spacing: 0.35em;
                font-size: 0.78rem;
                color: #fde68a;
            }

            h1,
            h2 {
                margin: 0;
                line-height: 1.1;
            }

            h1 {
                max-width: 11ch;
                font-size: clamp(2.5rem, 4vw, 4.2rem);
            }

            h2 {
                font-size: clamp(2rem, 3vw, 3rem);
            }

            .lead,
            .hint,
            .meta,
            .field label,
            .remember {
                color: var(--muted);
            }

            .lead,
            .hint {
                line-height: 1.8;
                font-size: 0.98rem;
            }

            .demo-box {
                border: 1px solid var(--line);
                border-radius: 24px;
                background: rgba(0, 0, 0, 0.18);
                padding: 24px;
            }

            .demo-box p {
                margin: 0;
            }

            .demo-box .value {
                color: #fef3c7;
                font-weight: 700;
            }

            .demo-box .meta {
                margin-top: 18px;
                font-size: 0.78rem;
                text-transform: uppercase;
                letter-spacing: 0.2em;
            }

            .form-panel {
                background: rgba(2, 6, 23, 0.84);
            }

            .form {
                margin-top: 36px;
                display: grid;
                gap: 20px;
            }

            .field {
                display: grid;
                gap: 8px;
            }

            .field label,
            .remember {
                font-size: 0.95rem;
            }

            .input {
                width: 100%;
                border: 1px solid var(--line);
                border-radius: 18px;
                background: rgba(255, 255, 255, 0.04);
                padding: 15px 16px;
                color: var(--text);
                font: inherit;
                outline: none;
                transition: border-color 0.2s ease, background 0.2s ease;
            }

            .input:focus {
                border-color: var(--accent);
                background: rgba(255, 255, 255, 0.08);
            }

            .input::placeholder {
                color: #64748b;
            }

            .remember-row {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .remember-row input {
                width: 16px;
                height: 16px;
                accent-color: var(--accent);
            }

            .button {
                border: none;
                border-radius: 18px;
                background: var(--accent);
                color: #111827;
                padding: 15px 18px;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                transition: transform 0.2s ease, filter 0.2s ease;
            }

            .button:hover {
                filter: brightness(1.05);
                transform: translateY(-1px);
            }

            .error {
                margin: 0;
                color: var(--danger);
                font-size: 0.92rem;
            }

            @media (max-width: 860px) {
                .card {
                    grid-template-columns: 1fr;
                }

                .panel,
                .form-panel {
                    padding: 28px;
                }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <main class="card">
                <section class="panel">
                    <div>
                        <p class="eyebrow">Workflow</p>
                        <h1>Un espace simple pour se connecter et avancer.</h1>
                        <p class="lead">
                            Cette base Laravel dispose maintenant d'une authentification par session avec validation, messages d'erreur, acces protege et deconnexion.
                        </p>
                    </div>

                    <div class="demo-box">
                        <p>Compte de demonstration</p>
                        <p style="margin-top: 14px;">Email: <span class="value">test@example.com</span></p>
                        <p style="margin-top: 8px;">Mot de passe: <span class="value">password</span></p>
                        <p class="meta">Seed par defaut</p>
                    </div>
                </section>

                <section class="form-panel">
                    <p class="eyebrow">Connexion</p>
                    <h2>Bienvenue</h2>
                    <p class="hint">Connectez-vous pour acceder a votre tableau de bord.</p>

                    <form method="POST" action="{{ route('login.store') }}" class="form">
                        @csrf

                        <div class="field">
                            <label for="email">Adresse email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="input"
                                placeholder="vous@exemple.com"
                            >
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Mot de passe</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="input"
                                placeholder="Votre mot de passe"
                            >
                        </div>

                        <label class="remember-row">
                            <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                            <span class="remember">Se souvenir de moi</span>
                        </label>

                        <button type="submit" class="button">Se connecter</button>
                    </form>
                </section>
            </main>
        </div>
    </body>
</html>
