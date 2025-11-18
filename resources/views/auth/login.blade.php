<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/keloang.png') }}" type="image/x-icon">
    <title>Keloang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        :root {
            --primary: #014AAD;
            --primary-dark: #003875;
            --primary-light: #4F8FD3;
            --primary-lighter: #E8F2FC;
            --bg-page: #F8FAFC;
            --bg-card: #FFFFFF;
            --bg-hover: #F0F7FF;
            --border: #E2E8F0;
            --border-light: #F1F5F9;
            --text-primary: #0F172A;
            --text-secondary: #475569;
            --text-tertiary: #64748B;
            --text-hint: #94A3B8;
            --error: #DC2626;
            --error-light: #FEE2E2;
            --success: #10B981;
            --shadow-sm: 0 1px 2px 0 rgba(1, 74, 173, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(1, 74, 173, 0.08), 0 2px 4px -1px rgba(1, 74, 173, 0.04);
            --shadow-lg: 0 10px 15px -3px rgba(1, 74, 173, 0.1), 0 4px 6px -2px rgba(1, 74, 173, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(1, 74, 173, 0.1), 0 10px 10px -5px rgba(1, 74, 173, 0.04);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #F8FAFC 0%, #E8F2FC 50%, #F0F7FF 100%);
            margin: 0;
            padding: clamp(16px, 4vw, 32px);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(1, 74, 173, 0.03) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .auth-container {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-card {
            background: var(--bg-card);
            border: 1px solid var(--border-light);
            border-radius: 24px;
            padding: clamp(28px, 5vw, 48px);
            box-shadow: var(--shadow-xl);
            backdrop-filter: blur(10px);
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
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
        }

        .auth-header {
            text-align: center;
            margin-bottom: clamp(24px, 4vw, 36px);
        }

        .auth-logo {
            width: clamp(72px, 10vw, 96px);
            height: clamp(72px, 10vw, 96px);
            margin: 0 auto clamp(16px, 3vw, 24px);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: clamp(28px, 5vw, 40px);
            box-shadow: var(--shadow-lg);
            transition: transform 0.3s ease;
        }

        .auth-logo:hover {
            transform: scale(1.05) rotate(5deg);
        }

        .auth-title {
            font-size: clamp(24px, 4vw, 32px);
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
        }

        .auth-subtitle {
            font-size: clamp(13px, 2vw, 15px);
            color: var(--text-secondary);
            margin: 0;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: clamp(18px, 3vw, 24px);
        }

        .form-label {
            display: block;
            font-size: clamp(13px, 2vw, 14px);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 10px;
            letter-spacing: 0.2px;
        }

        .form-input-wrapper {
            position: relative;
        }

        .form-input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 16px;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .form-input-wrapper:focus-within i {
            color: var(--primary-dark);
        }

        .form-input {
            width: 100%;
            padding: clamp(14px, 3vw, 16px) clamp(16px, 3vw, 20px) clamp(14px, 3vw, 16px) clamp(48px, 6vw, 52px);
            border: 2px solid var(--border);
            border-radius: 14px;
            font-size: clamp(14px, 2vw, 15px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-primary);
            background: var(--bg-card);
            outline: none;
        }

        .form-input.password-input {
            padding-right: clamp(48px, 6vw, 52px);
        }

        .password-toggle-btn {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-tertiary);
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.3s ease;
            z-index: 2;
            font-size: 16px;
        }

        .password-toggle-btn:hover {
            color: var(--primary);
        }

        .password-toggle-btn:focus {
            outline: none;
            color: var(--primary-dark);
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(1, 74, 173, 0.1);
            background: var(--bg-hover);
        }

        .form-input::placeholder {
            color: var(--text-hint);
            font-weight: 400;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: clamp(20px, 3vw, 28px);
            cursor: pointer;
        }

        .form-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
            cursor: pointer;
            border-radius: 4px;
        }

        .form-checkbox label {
            font-size: clamp(13px, 2vw, 14px);
            color: var(--text-secondary);
            cursor: pointer;
            font-weight: 500;
            user-select: none;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: clamp(14px, 3vw, 18px);
            border-radius: 14px;
            border: none;
            font-weight: 600;
            font-size: clamp(14px, 2vw, 16px);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-md);
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-submit:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-submit i {
            position: relative;
            z-index: 1;
        }

        .btn-submit .spinner {
            display: none;
            animation: spin 1s linear infinite;
        }

        .btn-submit.loading .spinner {
            display: inline-block;
        }

        .btn-submit.loading .btn-text {
            display: none;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .auth-footer {
            text-align: center;
            margin-top: clamp(24px, 4vw, 32px);
            font-size: clamp(13px, 2vw, 14px);
            color: var(--text-secondary);
            font-weight: 500;
        }

        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
            position: relative;
        }

        .auth-footer a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .auth-footer a:hover::after {
            width: 100%;
        }

        .auth-footer a:hover {
            color: var(--primary-dark);
        }

        .error-message {
            background: linear-gradient(135deg, var(--error-light) 0%, #FECACA 100%);
            color: var(--error);
            padding: clamp(12px, 2vw, 16px);
            border-radius: 12px;
            margin-bottom: clamp(20px, 3vw, 24px);
            font-size: clamp(13px, 2vw, 14px);
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #FCA5A5;
            animation: shake 0.5s ease;
        }

        .success-message {
            background: linear-gradient(135deg, #D1FAE5 0%, #A7F3D0 100%);
            color: var(--success);
            padding: clamp(12px, 2vw, 16px);
            border-radius: 12px;
            margin-bottom: clamp(20px, 3vw, 24px);
            font-size: clamp(13px, 2vw, 14px);
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #6EE7B7;
            animation: fadeInUp 0.5s ease;
        }

        .success-message i {
            font-size: 16px;
            flex-shrink: 0;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .error-message i {
            font-size: 16px;
            flex-shrink: 0;
        }

        .field-error {
            color: var(--error);
            font-size: clamp(12px, 2vw, 13px);
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .field-error i {
            font-size: 12px;
            flex-shrink: 0;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            body {
                padding: 16px;
            }

            .auth-card {
                padding: 28px 24px;
                border-radius: 20px;
            }

            .auth-title {
                font-size: 24px;
            }

            .form-input {
                padding: 14px 16px 14px 48px;
            }
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 24px 20px;
            }

            .auth-logo {
                width: 64px;
                height: 64px;
                font-size: 28px;
            }
        }

        @media (min-width: 1024px) {
            .auth-container {
                max-width: 520px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <i class="fas fa-wallet"></i>
                </div>
                <h1 class="auth-title">Masuk ke Keloang</h1>
                <p class="auth-subtitle">Kelola keuanganmu dengan lebih mudah</p>
            </div>

            @if (session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="form-input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-input"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="form-input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-input password-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle-btn" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="btn-text">Masuk</span>
                    <i class="fas fa-spinner spinner"></i>
                </button>
            </form>

            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('signup') }}">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        // Prevent double submission and show loading state
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        
        loginForm.addEventListener('submit', function(e) {
            // Check if form is already submitting
            if (submitBtn.disabled) {
                e.preventDefault();
                return false;
            }
            
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            
            // Ensure CSRF token is fresh
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const tokenInput = loginForm.querySelector('input[name="_token"]');
                if (tokenInput) {
                    tokenInput.value = csrfToken.getAttribute('content');
                }
            }
        });

        // Password toggle functionality
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        
        if (passwordInput && passwordToggle) {
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                const icon = passwordToggle.querySelector('i');
                if (type === 'password') {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        }

        // Refresh CSRF token periodically to prevent expiration
        setInterval(function() {
            fetch('{{ route("home") }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                const newToken = response.headers.get('X-CSRF-TOKEN');
                if (newToken) {
                    const metaToken = document.querySelector('meta[name="csrf-token"]');
                    const formToken = loginForm.querySelector('input[name="_token"]');
                    if (metaToken) metaToken.setAttribute('content', newToken);
                    if (formToken) formToken.value = newToken;
                }
            })
            .catch(() => {
                // Silent fail - token refresh is optional
            });
        }, 300000); // Refresh every 5 minutes
    </script>
</body>
</html>
