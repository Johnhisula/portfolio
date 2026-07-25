<?php
require_once dirname(__DIR__, 2) . '/includes/admin/auth.php';
require_once INCLUDES_PATH . '/admin/layout.php';

// Handle POST login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';
    if (attemptLogin($u, $p)) {
        header('Location: /admin/index.php');
        exit;
    }
    $error = 'Invalid username or password.';
}

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: /admin/index.php');
    exit;
}

$site    = SITE;
$expired = !empty($_GET['expired']);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — <?= e($site['name']) ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body class="login-page">

    <!-- Background orbs -->
    <div class="login-orb login-orb-1" aria-hidden="true"></div>
    <div class="login-orb login-orb-2" aria-hidden="true"></div>

    <main class="login-container">
        <div class="login-card">

            <!-- Logo -->
            <div class="login-brand">
                <span class="brand-avatar brand-avatar--lg">
                    <?= e(initials($site['name'])) ?>
                </span>
                <div>
                    <p class="login-brand-name"><?= e($site['name']) ?></p>
                    <p class="login-brand-sub">Admin Dashboard</p>
                </div>
            </div>

            <h1 class="login-title">Welcome back</h1>
            <p class="login-subtitle">Sign in to manage your portfolio.</p>

            <!-- Alerts -->
            <?php if ($expired): ?>
            <div class="alert alert-warning d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-clock-history"></i>
                Your session expired. Please sign in again.
            </div>
            <?php endif; ?>
            <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <?= e($error) ?>
            </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="/admin/login.php" class="login-form" novalidate>

                <div class="login-field">
                    <label for="login_username" class="login-label">Username</label>
                    <div class="login-input-wrap">
                        <i class="bi bi-person-fill login-input-icon" aria-hidden="true"></i>
                        <input type="text"
                               id="login_username"
                               name="username"
                               class="login-input"
                               placeholder="admin"
                               required
                               autocomplete="username"
                               value="<?= e($_POST['username'] ?? '') ?>">
                    </div>
                </div>

                <div class="login-field">
                    <label for="login_password" class="login-label">Password</label>
                    <div class="login-input-wrap">
                        <i class="bi bi-lock-fill login-input-icon" aria-hidden="true"></i>
                        <input type="password"
                               id="login_password"
                               name="password"
                               class="login-input"
                               placeholder="••••••••"
                               required
                               autocomplete="current-password">
                    </div>
                </div>

                <button type="submit" class="login-btn">
                    <i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>
                    Sign In
                </button>

            </form>

            <a href="/" class="login-back">
                <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to Portfolio
            </a>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
