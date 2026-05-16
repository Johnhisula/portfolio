<?php $site = SITE; ?>
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row align-items-center gy-3">

            <!-- Left: Brand -->
            <div class="col-md-4 text-center text-md-start">
                <a href="#hero" class="footer-brand d-inline-flex align-items-center gap-2 text-decoration-none">
                    <span class="brand-avatar brand-avatar--sm" aria-hidden="true">
                        <?= e(initials($site['name'])) ?>
                    </span>
                    <span class="fw-semibold"><?= e($site['name']) ?></span>
                </a>
            </div>

            <!-- Center: Copyright -->
            <div class="col-md-4 text-center">
                <p class="footer-copy mb-0">
                    &copy; <?= date('Y') ?> <?= e($site['name']) ?>. Built with
                    <i class="bi bi-heart-fill text-danger" aria-label="love"></i>
                    &amp; PHP 8.2
                </p>
            </div>

            <!-- Right: Social Icons -->
            <div class="col-md-4 text-center text-md-end">
                <div class="footer-socials d-inline-flex gap-3">
                    <a href="<?= e($site['github']) ?>" target="_blank" rel="noopener noreferrer"
                       class="social-icon" aria-label="GitHub">
                        <i class="bi bi-github" aria-hidden="true"></i>
                    </a>
                    <a href="<?= e($site['linkedin']) ?>" target="_blank" rel="noopener noreferrer"
                       class="social-icon" aria-label="LinkedIn">
                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="<?= e($site['twitter']) ?>" target="_blank" rel="noopener noreferrer"
                       class="social-icon" aria-label="Twitter / X">
                        <i class="bi bi-twitter-x" aria-hidden="true"></i>
                    </a>
                    <a href="mailto:<?= e($site['email']) ?>" class="social-icon" aria-label="Email">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>
