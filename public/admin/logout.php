<?php
require_once dirname(__DIR__, 2) . '/includes/admin/auth.php';
session_destroy();
header('Location: /admin/login.php');
exit;
