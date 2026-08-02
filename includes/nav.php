<?php
$site = SITE;

$navLinks = [
    ['href' => '#about',        'label' => 'About',        'icon' => 'bi-person-fill'],
    ['href' => '#skills',       'label' => 'Skills',       'icon' => 'bi-lightning-charge-fill'],
    ['href' => '#experience',   'label' => 'Experience',   'icon' => 'bi-briefcase-fill'],
    ['href' => '#projects',     'label' => 'Projects',     'icon' => 'bi-code-slash'],
    ['href' => '#certificates', 'label' => 'Certificates', 'icon' => 'bi-award-fill'],
    ['href' => '#contact',      'label' => 'Contact',      'icon' => 'bi-envelope-fill'],
];
?>
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav" aria-label="Primary navigation">
    <div class="container">

        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#hero" aria-label="Home">
            <span class="brand-avatar" aria-hidden="true">
                <?= e(initials($site['name'])) ?>
            </span>
            <span class="brand-name"><?= e($site['name']) ?></span>
        </a>

        <!-- Mobile toggle (animated hamburger → X) -->
        <button class="navbar-toggler" type="button"
                id="mobileMenuToggle"
                aria-controls="navbarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="toggler-line toggler-line--1"></span>
            <span class="toggler-line toggler-line--2"></span>
            <span class="toggler-line toggler-line--3"></span>
        </button>

        <!-- Desktop Links (standard) -->
        <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarMenuDesktop">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <?php foreach ($navLinks as $link): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= e($link['href']) ?>">
                        <?= e($link['label']) ?>
                    </a>
                </li>
                <?php endforeach; ?>

                <!-- Theme toggle & Resume -->
                <li class="nav-item ms-lg-2">
                    <div id="navRight" class="d-flex align-items-center gap-2">
                        <a href="<?= ASSETS_PATH ?>/files/Resume.pdf" class="btn btn-sm btn-primary" download>
                            <i class="bi bi-file-earmark-arrow-down-fill me-1" aria-hidden="true"></i>Resume
                        </a>
                        <button id="themeToggle" class="btn btn-sm theme-btn" aria-label="Toggle colour scheme">
                            <i class="bi bi-sun-fill" id="themeIcon" aria-hidden="true"></i>
                        </button>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- ═══════════════════════════════════════════════
     MOBILE FULL-SCREEN OVERLAY MENU
     ═══════════════════════════════════════════════ -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay" aria-hidden="true">
    <div class="mobile-menu-bg"></div>
    <div class="mobile-menu-content">
        <!-- Branding at top -->
        <div class="mobile-menu-header">
            <span class="brand-avatar brand-avatar--lg" aria-hidden="true">
                <?= e(initials($site['name'])) ?>
            </span>
            <span class="mobile-menu-name"><?= e($site['name']) ?></span>
            <span class="mobile-menu-role"><?= e($site['role']) ?></span>
        </div>

        <!-- Navigation links -->
        <ul class="mobile-menu-nav">
            <?php foreach ($navLinks as $i => $link): ?>
            <li class="mobile-menu-item" style="--item-index: <?= $i ?>">
                <a href="<?= e($link['href']) ?>" class="mobile-menu-link">
                    <span class="mobile-menu-icon"><i class="bi <?= e($link['icon']) ?>" aria-hidden="true"></i></span>
                    <span class="mobile-menu-label"><?= e($link['label']) ?></span>
                    <span class="mobile-menu-arrow"><i class="bi bi-chevron-right" aria-hidden="true"></i></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <!-- Bottom actions -->
        <div class="mobile-menu-footer" style="--item-index: <?= count($navLinks) ?>">
            <a href="<?= ASSETS_PATH ?>/files/Resume.pdf" class="btn btn-primary btn-mobile-resume" download>
                <i class="bi bi-file-earmark-arrow-down-fill me-2" aria-hidden="true"></i>Download Resume
            </a>
            <div class="mobile-menu-socials">
                <button id="themeToggleMobile" class="btn btn-sm theme-btn" aria-label="Toggle colour scheme">
                    <i class="bi bi-sun-fill" id="themeIconMobile" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>
