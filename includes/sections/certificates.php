<?php $certs = CERTIFICATES; ?>
<section id="certificates" class="section-padded section-alt" aria-labelledby="certs-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">Verified Credentials</span>
            <h2 id="certs-heading" class="section-title">
                My <span class="text-gradient">Certificates</span>
            </h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <!-- Certificates grid -->
        <div class="row gy-4">
            <?php foreach ($certs as $index => $cert): ?>
            <div class="col-sm-6 col-xl-4"
                 data-aos="fade-up"
                 data-aos-delay="<?= ($index % 3) * 100 ?>">

                <article class="cert-card h-100" aria-label="<?= e($cert['title']) ?>">

                    <!-- Top accent bar -->
                    <div class="cert-card__bar"
                         style="--cert-color: <?= e($cert['color']) ?>;"
                         aria-hidden="true"></div>

                    <div class="cert-card__body">

                        <!-- Icon -->
                        <div class="cert-icon-wrap"
                             style="--cert-color: <?= e($cert['color']) ?>;">
                            <i class="bi <?= e($cert['icon']) ?>"
                               aria-hidden="true"></i>
                        </div>

                        <!-- Title & Issuer -->
                        <h3 class="cert-title"><?= e($cert['title']) ?></h3>
                        <p class="cert-issuer">
                            <i class="bi bi-building me-1" aria-hidden="true"></i>
                            <?= e($cert['issuer']) ?>
                        </p>

                        <!-- Dates -->
                        <div class="cert-dates">
                            <span class="cert-date-item">
                                <i class="bi bi-calendar-check me-1" aria-hidden="true"></i>
                                Issued: <strong><?= e($cert['date']) ?></strong>
                            </span>
                            <?php if ($cert['expires']): ?>
                            <span class="cert-date-item cert-expires">
                                <i class="bi bi-clock-history me-1" aria-hidden="true"></i>
                                Expires: <strong><?= e($cert['expires']) ?></strong>
                            </span>
                            <?php else: ?>
                            <span class="cert-date-item cert-no-expire">
                                <i class="bi bi-infinity me-1" aria-hidden="true"></i>
                                <strong>No Expiry</strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <!-- Tags -->
                        <div class="cert-tags mt-3">
                            <?php foreach ($cert['tags'] as $tag): ?>
                                <?= badge($tag) ?>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- Footer: View Certificate button -->
                    <div class="cert-card__footer">
                        <button type="button"
                                class="btn cert-verify-btn w-100"
                                style="--cert-color: <?= e($cert['color']) ?>;"
                                onclick="openCertModal('<?= e($cert['image_path']) ?>', '<?= e($cert['title']) ?>')"
                                aria-label="View <?= e($cert['title']) ?> certificate">
                            <i class="bi bi-eye-fill me-2" aria-hidden="true"></i>
                            View Certificate
                        </button>
                    </div>

                </article>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

