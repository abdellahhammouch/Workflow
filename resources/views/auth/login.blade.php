<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Workflow') }} | Sign In</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700" rel="stylesheet" />

        <style>
            :root {
                color-scheme: dark;
                --bg: #08111f;
                --panel: rgba(10, 15, 27, 0.86);
                --soft: rgba(255, 255, 255, 0.04);
                --line: rgba(255, 255, 255, 0.12);
                --text: #edf4ff;
                --muted: #98abc6;
                --accent: #f7b733;
                --danger: #ffb4bf;
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
                    radial-gradient(circle at top, rgba(247, 183, 51, 0.24), transparent 28%),
                    linear-gradient(155deg, #04070d 0%, #0a1120 48%, #111827 100%);
            }

            .shell {
                min-height: 100vh;
                display: grid;
                place-items: center;
                padding: 24px;
            }

            .wrap {
                width: min(1060px, 100%);
                display: grid;
                grid-template-columns: 0.95fr 1.05fr;
                border: 1px solid var(--line);
                border-radius: 30px;
                overflow: hidden;
                background: rgba(255, 255, 255, 0.04);
                box-shadow: 0 28px 80px rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(18px);
            }

            .side,
            .main {
                padding: 36px;
            }

            .side {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 28px;
                background: rgba(255, 255, 255, 0.03);
            }

            .eyebrow {
                margin: 0 0 14px;
                text-transform: uppercase;
                letter-spacing: 0.32em;
                font-size: 0.8rem;
                color: #ffd978;
            }

            h1,
            h2,
            p {
                margin: 0;
            }

            h1 {
                font-size: clamp(2.2rem, 4vw, 3.7rem);
                line-height: 1.05;
                max-width: 10ch;
            }

            h2 {
                font-size: clamp(2rem, 3vw, 3rem);
                line-height: 1.08;
            }

            .copy,
            .hint,
            .field label,
            .remember {
                color: var(--muted);
            }

            .copy,
            .hint {
                margin-top: 16px;
                line-height: 1.8;
            }

            .demo {
                border: 1px solid var(--line);
                border-radius: 24px;
                padding: 22px;
                background: rgba(0, 0, 0, 0.16);
            }

            .demo strong {
                color: #fff0be;
            }

            .main {
                background: var(--panel);
            }

            .form {
                margin-top: 34px;
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
                padding: 15px 16px;
                border-radius: 18px;
                border: 1px solid var(--line);
                background: var(--soft);
                color: var(--text);
                font: inherit;
                outline: none;
                transition: border-color 0.18s ease, background 0.18s ease;
            }

            .input::placeholder {
                color: #6d829f;
            }

            .input:focus {
                border-color: var(--accent);
                background: rgba(255, 255, 255, 0.07);
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
                padding: 15px 18px;
                background: var(--accent);
                color: #111827;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                transition: transform 0.18s ease, filter 0.18s ease;
            }

            .button:hover {
                transform: translateY(-1px);
                filter: brightness(1.04);
            }

            .error {
                color: var(--danger);
                font-size: 0.92rem;
            }

            .back-link {
                display: inline-flex;
                margin-top: 22px;
                color: var(--muted);
                text-decoration: none;
            }

            .back-link:hover {
                color: var(--text);
            }

            @media (max-width: 880px) {
                .wrap {
                    grid-template-columns: 1fr;
                }

                .side,
                .main {
                    padding: 28px;
                }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <main class="wrap">
                <section class="side">
                    <div>
                        <p class="eyebrow">Login View</p>
                        <h1>Sign in and continue your workflow.</h1>
                        <p class="copy">
                            This screen uses the existing Laravel session auth flow and shows validation feedback directly in the form.
                        </p>
                    </div>

                    <div class="demo">
                        <p><strong>Demo email:</strong> test@example.com</p>
                        <p style="margin-top: 10px;"><strong>Demo password:</strong> password</p>
                        <p class="copy" style="margin-top: 14px;">
                            Useful if you seed the database and want to test the full flow quickly.
                        </p>
                    </div>
                </section>

                <section class="main">
                    <p class="eyebrow">Authentication</p>
                    <h2>Welcome back</h2>
                    <p class="hint">Enter your credentials to access the dashboard.</p>

                    <form method="POST" action="{{ route('login.store') }}" class="form">
                        @csrf

                        <div class="field">
                            <label for="email">Email address</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="input"
                                placeholder="you@example.com"
                            >
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="input"
                                placeholder="Your password"
                            >
                        </div>

                        <label class="remember-row">
                            <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                            <span class="remember">Remember me</span>
                        </label>

                        <button type="submit" class="button">Sign In</button>
                    </form>

                    <a href="{{ route('home') }}" class="back-link">Back to home</a>
                </section>
            </main>
        </div>
    </body>
</html>
