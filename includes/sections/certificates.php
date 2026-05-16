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

<!-- Certificate Lightbox Modal -->
<div id="certLightbox" class="cert-lightbox" role="dialog" aria-modal="true" aria-label="Certificate viewer" onclick="closeCertModal(event)">
    <div class="cert-lightbox__inner">
        <button class="cert-lightbox__close" onclick="closeCertLightbox()" aria-label="Close certificate viewer">
            <i class="bi bi-x-lg"></i>
        </button>
        <p class="cert-lightbox__title" id="certLightboxTitle"></p>
        <img id="certLightboxImg" src="" alt="Certificate" class="cert-lightbox__img" />
    </div>
</div>

<style>
/* ── Lightbox ─────────────────────────────── */
.cert-lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0,0,0,.85);
    backdrop-filter: blur(6px);
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}
.cert-lightbox.is-open {
    display: flex;
    animation: lbFadeIn .2s ease;
}
@keyframes lbFadeIn {
    from { opacity: 0; }
    to   { opacity: 1; }
}
.cert-lightbox__inner {
    position: relative;
    max-width: 900px;
    width: 100%;
    text-align: center;
}
.cert-lightbox__title {
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: .75rem;
    letter-spacing: .03em;
}
.cert-lightbox__img {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 24px 80px rgba(0,0,0,.6);
    max-height: 80vh;
    object-fit: contain;
}
.cert-lightbox__close {
    position: absolute;
    top: -2.5rem;
    right: 0;
    background: rgba(255,255,255,.15);
    border: none;
    color: #fff;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s;
}
.cert-lightbox__close:hover {
    background: rgba(255,255,255,.3);
}
</style>

<script>
function openCertModal(imgSrc, title) {
    document.getElementById('certLightboxImg').src = imgSrc;
    document.getElementById('certLightboxTitle').textContent = title;
    document.getElementById('certLightbox').classList.add('is-open');
    document.body.style.overflow = 'hidden';
}
function closeCertLightbox() {
    document.getElementById('certLightbox').classList.remove('is-open');
    document.body.style.overflow = '';
}
function closeCertModal(e) {
    if (e.target === document.getElementById('certLightbox')) closeCertLightbox();
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeCertLightbox();
});
</script>
