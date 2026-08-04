<?php $site = SITE; ?>
<section id="hero" class="hero-section d-flex align-items-center" aria-label="Hero introduction">

    <!-- Animated background grid -->
    <div class="hero-grid" aria-hidden="true"></div>

    <!-- Floating orbs -->
    <div class="orb orb-1" aria-hidden="true"></div>
    <div class="orb orb-2" aria-hidden="true"></div>
    <div class="orb orb-3" aria-hidden="true"></div>

    <div class="container position-relative z-1">
        <div class="row align-items-center gy-5">

            <!-- Text column -->
            <div class="col-lg-7 hero-text">
                <div class="hero-role-badge">
                    <span class="hero-role-dot"></span>
                    <span><?= e($site['role']) ?></span>
                </div>

                <h1 class="hero-title">
                    Hi, I am
                    <span class="text-gradient"><?= e($site['name']) ?></span>
                </h1>

                <p class="hero-tagline"><?= e($site['tagline']) ?></p>

                <div class="hero-cta-group d-flex flex-wrap gap-3 mt-4">
                    <a href="#projects" class="btn btn-primary btn-lg hero-btn-primary">
                        <i class="bi bi-grid-3x3-gap-fill me-2" aria-hidden="true"></i>View Projects
                    </a>
                    <a href="#contact" class="btn btn-outline-light btn-lg hero-btn-secondary">
                        <i class="bi bi-send-fill me-2" aria-hidden="true"></i>Get In Touch
                    </a>
                </div>

                <!-- Tech strip -->
                <div class="tech-strip mt-5">
                    <span class="tech-strip-label">Tech stack:</span>
                    <div class="tech-chips d-flex flex-wrap gap-2 mt-2">
                        <?php
                        $chips = ['Figma', 'HTML5 / CSS3', 'JavaScript', 'Bootstrap 5', 'PHP', 'Git'];
                        foreach ($chips as $chip): ?>
                            <span class="tech-chip"><?= e($chip) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Hero visual column — profile image -->
            <div class="col-lg-5 d-flex justify-content-center hero-visual">
                <div class="hero-profile-wrap">
                    <!-- Decorative rings -->
                    <div class="hero-ring hero-ring--outer" aria-hidden="true"></div>
                    <div class="hero-ring hero-ring--inner" aria-hidden="true"></div>
                    <!-- Floating accent dots -->
                    <div class="hero-float-dot hero-float-dot--1" aria-hidden="true"></div>
                    <div class="hero-float-dot hero-float-dot--2" aria-hidden="true"></div>
                    <div class="hero-float-dot hero-float-dot--3" aria-hidden="true"></div>
                    <!-- Profile image -->
                    <div class="hero-profile-img">
                        <?php $profilePath = PUBLIC_PATH . '/assets/images/profile.jpg'; ?>
                        <img src="<?= ASSETS_PATH ?>/images/profile.jpg?v=<?= filemtime($profilePath) ?>"
                             alt="<?= e($site['name']) ?>"
                             loading="eager">
                    </div>
                    <!-- Status badge -->
                    <div class="hero-status-badge">
                        <span class="hero-status-dot"></span>
                        Open to work
                    </div>
                </div>
            </div>

        </div>

        <!-- Scroll hint -->
        <div class="scroll-hint" aria-hidden="true">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
            <span>Scroll down</span>
        </div>
    </div>

</section>
