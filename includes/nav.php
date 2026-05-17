<?php
$site = SITE;

$navLinks = [
    ['href' => '#about',        'label' => 'About'],
    ['href' => '#skills',       'label' => 'Skills'],
    ['href' => '#projects',     'label' => 'Projects'],
    ['href' => '#certificates', 'label' => 'Certificates'],
    ['href' => '#contact',      'label' => 'Contact'],
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

        <!-- Mobile toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <?php foreach ($navLinks as $link): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= e($link['href']) ?>">
                        <?= e($link['label']) ?>
                    </a>
                </li>
                <?php endforeach; ?>

                <!-- Theme toggle + Hire Me -->
                <div id="navRight" class="d-flex align-items-center gap-2 ms-lg-3">
                    <button id="themeToggle" class="btn btn-sm theme-btn" aria-label="Toggle colour scheme">
                        <i class="bi bi-sun-fill" id="themeIcon" aria-hidden="true"></i>
                    </button>
                    <a href="#contact" class="btn btn-primary btn-sm px-3 hire-btn">
                        Hire Me
                    </a>
                </div>
            </ul>
        </div>

    </div>
</nav>
