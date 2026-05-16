<?php
// ─────────────────────────────────────────────
// Helper Functions
// ─────────────────────────────────────────────

/**
 * Safely escape output for HTML context.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Generate a Bootstrap badge HTML string for a tag.
 */
function badge(string $tag): string
{
    return '<span class="badge tag-badge">' . e($tag) . '</span>';
}

/**
 * Convert a skill level (0–100) to a human-readable label.
 */
function skillLabel(int $level): string
{
    return match(true) {
        $level >= 90 => 'Expert',
        $level >= 75 => 'Advanced',
        $level >= 55 => 'Proficient',
        default      => 'Familiar',
    };
}

/**
 * Return initials from a full name (max 2 chars).
 */
function initials(string $name): string
{
    $parts = explode(' ', trim($name));
    $init  = '';
    foreach ($parts as $p) {
        $init .= mb_strtoupper(mb_substr($p, 0, 1));
    }
    return mb_substr($init, 0, 2);
}
