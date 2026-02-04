<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - OriginX Marketplace</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Styles -->
    <style>
        /* ============================================
           CSS Variables - Dark Industrial Theme
           ============================================ */
        :root {
            /* Primary Colors - Lime Green Flat Accent */
            --accent-primary: #84cc16;
            --accent-primary-hover: #65a30d;
            --accent-primary-light: #a3e635;

            /* Dark Background Layers */
            --bg-primary: #0a0a0b;
            --bg-secondary: #111113;
            --bg-tertiary: #18181b;
            --bg-elevated: #1f1f23;
            --bg-surface: #27272a;

            /* Text Colors */
            --text-primary: #f4f4f5;
            --text-secondary: #a1a1aa;
            --text-muted: #71717a;
            --text-inverse: #0a0a0b;

            /* Border & Dividers */
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-medium: rgba(255, 255, 255, 0.12);
            --border-strong: rgba(255, 255, 255, 0.16);

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.4);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.6), 0 10px 10px -5px rgba(0, 0, 0, 0.4);

            /* Spacing */
            --spacing-xs: 0.5rem;
            --spacing-sm: 0.75rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;

            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;

            /* Typography */
            --font-display: 'Syne', sans-serif;
            --font-body: 'Rajdhani', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;

            /* Transitions */
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 250ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ============================================
           Global Styles
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--spacing-lg);
            overflow-x: hidden;
            position: relative;
        }

        /* Background Effects */
        .auth-background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            overflow: hidden;
        }

        .grid-overlay {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(var(--border-subtle) 1px, transparent 1px),
                linear-gradient(90deg, var(--border-subtle) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.3;
        }

        .gradient-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            animation: float 20s ease-in-out infinite;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: var(--accent-primary);
            top: -200px;
            left: -100px;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: var(--accent-primary);
            bottom: -150px;
            right: -100px;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            33% { transform: translate(30px, -30px); }
            66% { transform: translate(-20px, 20px); }
        }

        /* ============================================
           Auth Container
           ============================================ */
        .auth-container {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================
           Auth Card
           ============================================ */
        .auth-card {
            background: var(--bg-elevated);
            border: 1px solid var(--border-medium);
            border-radius: var(--radius-xl);
            padding: var(--spacing-xl);
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-primary), var(--accent-primary-light));
        }

        /* ============================================
           Header
           ============================================ */
        .auth-header {
            text-align: center;
            margin-bottom: var(--spacing-xl);
        }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            margin-bottom: var(--spacing-lg);
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: var(--bg-surface);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-primary);
            font-size: 1.5rem;
        }

        .logo-text {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        .logo-text .accent {
            color: var(--accent-primary);
        }

        .auth-title {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--spacing-xs);
            letter-spacing: -0.01em;
        }

        .auth-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* ============================================
           Alert Message
           ============================================ */
        .alert {
            padding: var(--spacing-md);
            border-radius: var(--radius-md);
            margin-bottom: var(--spacing-lg);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            font-size: 0.9rem;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }

        .alert i {
            font-size: 1.25rem;
        }

        /* ============================================
           Form Styles
           ============================================ */
        .auth-form {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-lg);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-xs);
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--accent-primary);
            font-size: 1rem;
        }

        .form-control {
            padding: var(--spacing-md);
            background: var(--bg-surface);
            border: 1px solid var(--border-medium);
            border-radius: var(--radius-md);
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: 1rem;
            transition: all var(--transition-fast);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:focus {
            border-color: var(--accent-primary);
            background: var(--bg-elevated);
            box-shadow: 0 0 0 3px rgba(132, 204, 22, 0.1);
        }

        .form-control:disabled,
        .form-control[readonly] {
            background: var(--bg-tertiary);
            cursor: not-allowed;
            opacity: 0.7;
        }

        .form-hint {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-hint i {
            font-size: 0.9rem;
        }

        /* ============================================
           Button Styles
           ============================================ */
        .btn {
            padding: var(--spacing-md) var(--spacing-lg);
            border-radius: var(--radius-md);
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-base);
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-xs);
            text-decoration: none;
            font-family: var(--font-body);
        }

        .btn-primary {
            background: var(--accent-primary);
            color: var(--text-inverse);
            width: 100%;
        }

        .btn-primary:hover {
            background: var(--accent-primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(132, 204, 22, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* ============================================
           Divider
           ============================================ */
        .divider {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            margin: var(--spacing-lg) 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--border-subtle);
        }

        .divider-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ============================================
           Auth Footer
           ============================================ */
        .auth-footer {
            text-align: center;
            padding-top: var(--spacing-lg);
            border-top: 1px solid var(--border-subtle);
        }

        .auth-link {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .auth-link a {
            color: var(--accent-primary);
            text-decoration: none;
            font-weight: 600;
            transition: color var(--transition-fast);
        }

        .auth-link a:hover {
            color: var(--accent-primary-hover);
            text-decoration: underline;
        }

        /* ============================================
           Back Button
           ============================================ */
        .back-to-home {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            color: var(--text-secondary);
            text-decoration: none;
            margin-bottom: var(--spacing-lg);
            font-size: 0.9rem;
            transition: all var(--transition-fast);
        }

        .back-to-home:hover {
            color: var(--accent-primary);
            transform: translateX(-4px);
        }

        .back-to-home i {
            font-size: 1rem;
        }

        /* ============================================
           Password Toggle
           ============================================ */
        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: var(--spacing-md);
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0;
            font-size: 1.1rem;
            transition: color var(--transition-fast);
        }

        .password-toggle:hover {
            color: var(--text-primary);
        }

        /* ============================================
           Responsive Design
           ============================================ */
        @media (max-width: 576px) {
            body {
                padding: var(--spacing-md);
            }

            .auth-card {
                padding: var(--spacing-lg);
            }

            .auth-title {
                font-size: 1.5rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }
        }

        /* ============================================
           Loading State
           ============================================ */
        .btn-loading {
            position: relative;
            color: transparent;
            pointer-events: none;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid var(--text-inverse);
            border-radius: 50%;
            border-top-color: transparent;
            animation: spinner 0.6s linear infinite;
        }

        @keyframes spinner {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Background Effects -->
    <div class="auth-background">
        <div class="grid-overlay"></div>
        <div class="gradient-orb orb-1"></div>
        <div class="gradient-orb orb-2"></div>
    </div>

    <!-- Auth Container -->
    <div class="auth-container">
        <!-- Back to Home -->
        <a href="/" class="back-to-home">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Beranda</span>
        </a>

        <!-- Auth Card -->
        <div class="auth-card">
            <!-- Header -->
            <div class="auth-header">
                <a href="/" class="auth-logo">
                    <div class="logo-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <span class="logo-text">Origin<span class="accent">X</span></span>
                </a>
                <h1 class="auth-title">Buat Akun Baru</h1>
                <p class="auth-subtitle">Daftar untuk mulai berbelanja sparepart motor</p>
            </div>

            <!-- Success Message -->
            @if (session('message'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('message') }}</span>
            </div>
            @endif

            <!-- Register Form -->
            <form action="{{ route('actionregister') }}" method="post" class="auth-form" id="registerForm">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-envelope"></i>
                        <span>Email</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="nama@example.com"
                        required
                        autocomplete="email"
                        id="emailInput">
                    <div class="form-hint">
                        <i class="bi bi-info-circle"></i>
                        <span>Gunakan email aktif untuk verifikasi</span>
                    </div>
                </div>

                <!-- Username Field -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-person"></i>
                        <span>Username</span>
                    </label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="username"
                        required
                        autocomplete="username"
                        id="usernameInput">
                    <div class="form-hint">
                        <i class="bi bi-info-circle"></i>
                        <span>Minimal 3 karakter, tanpa spasi</span>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-lock"></i>
                        <span>Password</span>
                    </label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                            id="passwordInput">
                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Toggle password visibility">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="form-hint">
                        <i class="bi bi-info-circle"></i>
                        <span>Minimal 8 karakter untuk keamanan</span>
                    </div>
                </div>

                <!-- Role Field (Read-only) -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-tag"></i>
                        <span>Role</span>
                    </label>
                    <input
                        type="text"
                        name="role"
                        class="form-control"
                        value="Guest"
                        readonly>
                    <div class="form-hint">
                        <i class="bi bi-info-circle"></i>
                        <span>Role default untuk pengguna baru</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="bi bi-person-plus"></i>
                    <span>Daftar Sekarang</span>
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">Atau</span>
                <div class="divider-line"></div>
            </div>

            <!-- Footer -->
            <div class="auth-footer">
                <p class="auth-link">
                    Sudah punya akun?
                    <a href="/admin">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Password Toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const icon = this.querySelector('i');
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        }

        // Form Submission Loading State
        const registerForm = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');

        if (registerForm && submitBtn) {
            registerForm.addEventListener('submit', function(e) {
                // Basic validation
                const email = document.getElementById('emailInput').value;
                const username = document.getElementById('usernameInput').value;
                const password = document.getElementById('passwordInput').value;

                if (username.length < 3) {
                    e.preventDefault();
                    alert('Username minimal 3 karakter');
                    return;
                }

                if (password.length < 8) {
                    e.preventDefault();
                    alert('Password minimal 8 karakter');
                    return;
                }

                // Add loading state
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
            });
        }

        // Auto-focus first input
        window.addEventListener('load', () => {
            const emailInput = document.getElementById('emailInput');
            if (emailInput) {
                emailInput.focus();
            }
        });

        // Form field animations
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        console.log('%c OriginX Register ', 'background: #84cc16; color: #0a0a0b; font-weight: bold; padding: 4px 8px; border-radius: 4px;');
    </script>
</body>
</html>
