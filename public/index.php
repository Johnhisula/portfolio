<?php
// ─────────────────────────────────────────────
// Bootstrap application
// ─────────────────────────────────────────────
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', '/assets');          // Web-root relative
define('STORAGE_PATH', BASE_PATH . '/storage');

// Load site configuration
require_once INCLUDES_PATH . '/config.php';

// Load helper functions
require_once INCLUDES_PATH . '/helpers.php';

// Load message store (used by contact handler)
require_once INCLUDES_PATH . '/admin/message_store.php';

// Start session for contact-form flash messages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle contact form POST
$formMessage = null;
$formError   = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    require_once INCLUDES_PATH . '/contact_handler.php';
}

// Pull any flash message from session
if (isset($_SESSION['flash'])) {
    $formMessage = $_SESSION['flash']['message'];
    $formError   = $_SESSION['flash']['error'];
    unset($_SESSION['flash']);
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <?php require_once INCLUDES_PATH . '/head.php'; ?>
</head>
<body>

    <?php require_once INCLUDES_PATH . '/nav.php'; ?>

    <main id="main-content">
        <?php require_once INCLUDES_PATH . '/sections/hero.php'; ?>
        <?php require_once INCLUDES_PATH . '/sections/about.php'; ?>
        <?php require_once INCLUDES_PATH . '/sections/skills.php'; ?>
        <?php require_once INCLUDES_PATH . '/sections/projects.php'; ?>
        <?php require_once INCLUDES_PATH . '/sections/certificates.php'; ?>
        <?php require_once INCLUDES_PATH . '/sections/contact.php'; ?>
    </main>

    <?php require_once INCLUDES_PATH . '/footer.php'; ?>

    <!-- Bootstrap 5.3 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmTMNJ/8E1N9EtFAnfYklXHCQJV"
            crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="<?= ASSETS_PATH ?>/js/main.js"></script>

</body>
</html>
