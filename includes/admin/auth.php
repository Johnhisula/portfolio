<?php
// ─────────────────────────────────────────────
// Auth Guard — include at top of every admin page
// ─────────────────────────────────────────────
define('BASE_PATH', dirname(__DIR__, 2));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', '/assets');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('ADMIN_PATH', BASE_PATH . '/public/admin');

require_once INCLUDES_PATH . '/admin/admin_config.php';
require_once INCLUDES_PATH . '/config.php';
require_once INCLUDES_PATH . '/helpers.php';
require_once INCLUDES_PATH . '/admin/message_store.php';

if (session_status() === PHP_SESSION_NONE) {
    session_name(ADMIN_SESSION_NAME);
    session_set_cookie_params([
        'lifetime' => ADMIN_SESSION_DURATION,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Strict',
    ]);
    session_start();
}

/**
 * Require admin login — redirect to login page if not authenticated.
 */
function requireAuth(): void
{
    if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: /admin/login.php');
        exit;
    }
    // Expire idle session
    if (isset($_SESSION['admin_last_active']) &&
        (time() - $_SESSION['admin_last_active']) > ADMIN_SESSION_DURATION) {
        session_destroy();
        header('Location: /admin/login.php?expired=1');
        exit;
    }
    $_SESSION['admin_last_active'] = time();
}

/**
 * Check if currently logged in.
 */
function isLoggedIn(): bool
{
    return !empty($_SESSION['admin_logged_in']);
}

/**
 * Attempt login — returns true on success.
 */
function attemptLogin(string $username, string $password): bool
{
    if ($username === ADMIN_USERNAME &&
        password_verify($password, ADMIN_PASSWORD_HASH)) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in']   = true;
        $_SESSION['admin_last_active'] = time();
        return true;
    }
    return false;
}
