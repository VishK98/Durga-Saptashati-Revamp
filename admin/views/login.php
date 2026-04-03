<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?= APP_NAME ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?= asset('images/favicon.png') ?>" rel="icon" type="image/png">
    <link href="../admin/assets/css/login.css" rel="stylesheet">
</head>

<body>
    <!-- Left Brand Panel -->
    <div class="login-left">
        <div class="brand-content">
            <div class="illustration">
                <img src="<?= asset('images/logo-wide.webp') ?>" alt="<?= APP_NAME ?>" class="lg-brand-logo">
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

            <?php
            $loginError = $loginError ?? ($_SESSION['login_error'] ?? '');
            $loginEmail = $_SESSION['login_email'] ?? ($_COOKIE['admin_email'] ?? '');
            unset($_SESSION['login_error'], $_SESSION['login_email']);
            ?>
            <?php if (!empty($loginError)): ?>
            <div class="login-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($loginError) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="/public/admin.php" autocomplete="on" id="loginForm">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" placeholder="admin@example.com" required autofocus
                            autocomplete="username"
                            value="<?= htmlspecialchars($loginEmail) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="passwordInput" placeholder="Enter your password"
                            required autocomplete="current-password">
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

    <script src="../admin/assets/js/login.js"></script>
</body>

</html>