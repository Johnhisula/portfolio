<?php
// ─────────────────────────────────────────────
// Admin Credentials (change these!)
// ─────────────────────────────────────────────
define('ADMIN_USERNAME', 'admin');
// Generate hash: password_hash('your_password', PASSWORD_BCRYPT)
define('ADMIN_PASSWORD_HASH', '$2y$10$ts1fBPzbyM5QirxEHU05Z.x1a6QTxeUN8blE0oVmr183ivasXylw2'); // "admin123"
define('ADMIN_SESSION_NAME', 'portfolio_admin');
define('ADMIN_SESSION_DURATION', 3600 * 4); // 4 hours
