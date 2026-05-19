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

        <!-- Left group: Clock + Brand -->
        <div class="d-flex align-items-center gap-2">

            <!-- Live Clock -->
            <div class="nav-clock d-flex align-items-center gap-2" aria-label="Current time">
                <div class="nav-clock__time">
                    <span id="clockH">00</span><span class="nav-clock__sep blink">:</span><span id="clockM">00</span><span class="nav-clock__sep">:</span><span id="clockS">00</span>
                </div>
                <div class="nav-clock__meta d-none d-lg-flex">
                    <span class="nav-clock__greeting" id="clockGreeting">Good evening</span>
                    <span class="nav-clock__date" id="clockDate">Mon, May 19</span>
                </div>
            </div>

            <!-- Brand / Logo -->
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2 mb-0" href="#hero" aria-label="Home">
                <span class="brand-avatar" aria-hidden="true">
                    <?= e(initials($site['name'])) ?>
                </span>
                <span class="brand-name"><?= e($site['name']) ?></span>
            </a>
        </div>

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

                <!-- Theme toggle -->
                <div id="navRight" class="d-flex align-items-center gap-2 ms-lg-3">
                    <button id="themeToggle" class="btn btn-sm theme-btn" aria-label="Toggle colour scheme">
                        <i class="bi bi-sun-fill" id="themeIcon" aria-hidden="true"></i>
                    </button>
                </div>
            </ul>
        </div>

    </div>
</nav>
