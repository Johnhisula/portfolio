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
