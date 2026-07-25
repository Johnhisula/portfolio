<?php
// ─────────────────────────────────────────────
// Vercel API Entry Point
// Wraps the public/index.php for serverless execution
// ─────────────────────────────────────────────

// Vercel serves from project root, adjust paths accordingly
$_SERVER['SCRIPT_NAME'] = '/api/index.php';

// Include the main application entry point
require __DIR__ . '/../public/index.php';
