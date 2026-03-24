<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?= APP_NAME ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        font-family: 'Inter', system-ui, sans-serif;
        min-height: 100vh;
        display: flex;
        background: #f0f2f5;
        overflow-x: hidden;
        width: 100%;
    }

    /* Left Panel - Brand Side */
    .login-left {
        flex: 1;
        background: linear-gradient(135deg, #1a1b2e 0%, #f26522 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 40px;
        position: relative;
        overflow: hidden;
    }

    .login-left::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: rgba(242, 101, 34, 0.15);
    }

    .login-left::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
    }

    .login-left .brand-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 400px;
    }

    .login-left .illustration {
        width: 280px;
        height: 280px;
        margin: 0 auto 30px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .login-left h1 {
        color: #fff;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .login-left p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
        line-height: 1.6;
    }

    .login-left .features {
        margin-top: 30px;
        display: flex;
        gap: 25px;
    }

    .login-left .feature-item {
        text-align: center;
    }

    .login-left .feature-item .feat-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        color: #fff;
        font-size: 1rem;
    }

    .login-left .feature-item span {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.72rem;
        font-weight: 500;
    }

    /* Right Panel - Form Side */
    .login-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background: #f8f9fb;
        position: relative;
        overflow: hidden;
    }

    .login-right::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(242, 101, 34, 0.05);
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 24px;
        padding: 45px 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.06);
        position: relative;
        z-index: 2;
    }

    .login-card .card-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .login-card .card-header .star-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(242, 101, 34, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        color: #f26522;
        font-size: 1.1rem;
    }

    .login-card .card-header h2 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #1a1b2e;
        margin-bottom: 6px;
    }

    .login-card .card-header p {
        color: #9ca3af;
        font-size: 0.88rem;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.88rem;
        color: #374151;
        margin-bottom: 8px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: all 0.3s;
        background: #fff;
        color: #1a1b2e;
    }

    .input-wrapper input:focus {
        outline: none;
        border-color: #f26522;
        box-shadow: 0 0 0 4px rgba(242, 101, 34, 0.1);
    }

    .input-wrapper input::placeholder {
        color: #c4c9d2;
    }

    .input-wrapper .toggle-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        font-size: 1rem;
        padding: 5px;
        transition: color 0.2s;
    }

    .input-wrapper .toggle-password:hover {
        color: #f26522;
    }

    .form-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        font-size: 0.85rem;
        color: #6b7280;
        user-select: none;
    }

    .remember-me input[type="checkbox"] {
        display: none;
    }

    .remember-me .checkmark {
        width: 20px;
        height: 20px;
        border: 2px solid #d1d5db;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .remember-me .checkmark i {
        display: none;
        font-size: 0.65rem;
        color: #fff;
    }

    .remember-me input:checked+.checkmark {
        background: #f26522;
        border-color: #f26522;
    }

    .remember-me input:checked+.checkmark i {
        display: block;
    }

    .forgot-link {
        color: #f26522;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-link:hover {
        color: #d4541a;
    }

    .login-btn {
        width: 100%;
        padding: 15px;
        background: #f26522;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .login-btn:hover {
        background: #d4541a;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(242, 101, 34, 0.4);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .login-btn:disabled {
        opacity: 0.8;
        cursor: not-allowed;
        transform: none;
    }

    .btn-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        vertical-align: middle;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .login-error {
        background: #fef2f2;
        color: #dc2626;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 0.85rem;
        margin-bottom: 22px;
        border-left: 4px solid #ef4444;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .back-link {
        text-align: center;
        margin-top: 25px;
    }

    .back-link a {
        color: #9ca3af;
        font-size: 0.85rem;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }

    .back-link a:hover {
        color: #f26522;
    }

    .back-link a i {
        margin-right: 5px;
    }

    /* Responsive */
    @media (max-width: 968px) {
        .login-left {
            display: none;
        }

        .login-right {
            flex: 1;
        }

        body {
            background: #f8f9fb;
        }
    }

    @media (max-width: 480px) {
        .login-right {
            padding: 20px;
        }

        .login-card {
            padding: 30px 25px;
            border-radius: 18px;
        }
    }
    </style>
</head>

<body>
    <!-- Left Brand Panel -->
    <div class="login-left">
        <div class="brand-content">
            <div class="illustration">
                <img src="<?= asset('images/logo-wide.webp') ?>" alt="<?= APP_NAME ?>" style="max-width:180px;filter:brightness(0) invert(1);">
            </div>

            <h1>Welcome Back!</h1>
            <p>Access your dashboard and manage everything with full control.</p>
        </div>
    </div>

    <!-- Right Form Panel -->
    <div class="login-right">
        <div class="login-card">
            <div class="card-header">
                <div class="star-icon"><i class="fas fa-star"></i></div>
                <h2>Start Your Journey!</h2>
                <p>Enter your details and step back into your account.</p>
            </div>

            <?php if (!empty($loginError)): ?>
            <div class="login-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($loginError) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="admin.php">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" placeholder="admin@example.com" required autofocus
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="passwordInput" placeholder="Enter your password"
                            required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" checked>
                        <span class="checkmark"><i class="fas fa-check"></i></span>
                        Remember me
                    </label>
                    <a href="#" class="forgot-link"
                        onclick="alert('Please contact the administrator to reset your password.'); return false;">Forgot
                        password?</a>
                </div>

                <input type="hidden" name="login" value="1">
                <button type="submit" class="login-btn" id="loginBtn">SIGN IN</button>
            </form>

            <div class="back-link">
                <a href="<?= url('index.php') ?>"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </div>
    </div>

    <script>
    document.querySelector('form').addEventListener('submit', function() {
        var btn = document.getElementById('loginBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="btn-spinner"></span>';
    });

    function togglePassword() {
        var input = document.getElementById('passwordInput');
        var icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }
    </script>
</body>

</html>