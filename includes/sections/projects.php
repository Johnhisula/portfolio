<?php
$projects = PROJECTS;

// ── Pull in contact-form image submissions ────────────────
$submittedCards = [];
$msgsFile = STORAGE_PATH . '/messages.json';
if (file_exists($msgsFile)) {
    $msgs = json_decode(file_get_contents($msgsFile), true) ?? [];
    foreach ($msgs as $msg) {
        $att = $msg['attachment'] ?? null;
        if ($att && !empty($att['is_image']) && !empty($att['web_path'])) {
            $submittedCards[] = [
                'image'   => $att['web_path'],
                'title'   => !empty($msg['subject']) ? $msg['subject'] : 'Submitted Work',
                'desc'    => !empty($msg['message']) ? mb_strimwidth($msg['message'], 0, 120, '…') : '',
                'from'    => $msg['name'] ?? 'Anonymous',
                'date'    => isset($msg['date']) ? date('M j, Y', strtotime($msg['date'])) : '',
            ];
        }
    }
}
?>
<section id="projects" class="section-padded" aria-labelledby="projects-heading">
    <div class="container">

        <!-- Section heading -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-label">What I've Built</span>
            <h2 id="projects-heading" class="section-title">Featured <span class="text-gradient">Projects</span></h2>
            <div class="section-divider" aria-hidden="true"></div>
        </div>

        <!-- Filter buttons -->
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-btn active" data-filter="all">All</button>
            <?php
            $categories = array_unique(array_column($projects, 'category'));
            foreach ($categories as $cat): ?>
            <button class="filter-btn" data-filter="<?= e($cat) ?>"><?= e($cat) ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Project grid -->
        <div class="row gy-4 projects-grid" id="projectsGrid">
            <?php foreach ($projects as $index => $project): ?>
            <div class="col-sm-6 col-xl-4 project-col"
                 data-category="<?= e($project['category']) ?>"
                 data-aos="fade-up"
                 data-aos-delay="<?= ($index % 3) * 100 ?>">

                <article class="project-card h-100" aria-label="<?= e($project['title']) ?>">

                    <!-- Card image / placeholder -->
                    <div class="project-card__img-wrap">
                        <img src="<?= e($project['image']) ?>"
                             alt="<?= e($project['title']) ?> preview"
                             class="project-card__img"
                             loading="lazy"
                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                        <div class="project-card__img-fallback" style="display:none" aria-hidden="true">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <div class="project-card__overlay">
                            <span class="project-category-badge"><?= e($project['category']) ?></span>
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="project-card__body">
                        <h3 class="project-card__title"><?= e($project['title']) ?></h3>
                        <p class="project-card__desc"><?= e($project['description']) ?></p>

                        <!-- Tags -->
                        <div class="project-tags mb-3">
                            <?php foreach ($project['tags'] as $tag): ?>
                                <?= badge($tag) ?>
                            <?php endforeach; ?>
                        </div>

                        <!-- Actions -->
                        <div class="project-card__footer d-flex gap-2">
                            <button class="btn btn-primary btn-sm flex-grow-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-<?= e($project['id']) ?>"
                                    aria-label="View details for <?= e($project['title']) ?>">
                                <i class="bi bi-eye-fill me-1" aria-hidden="true"></i>Details
                            </button>
                            <a href="<?= e($project['github']) ?>" target="_blank" rel="noopener noreferrer"
                               class="btn btn-outline-secondary btn-sm"
                               aria-label="GitHub repo for <?= e($project['title']) ?>">
                                <i class="bi bi-github" aria-hidden="true"></i>
                            </a>
                            <?php if ($project['demo'] !== '#'): ?>
                            <a href="<?= e($project['demo']) ?>" target="_blank" rel="noopener noreferrer"
                               class="btn btn-outline-secondary btn-sm"
                               aria-label="Live demo for <?= e($project['title']) ?>">
                                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </article>
            </div><!-- .project-col -->
            <?php endforeach; ?>
        </div><!-- #projectsGrid -->

        <?php if (!empty($submittedCards)): ?>
        <!-- Submitted images from contact form -->
        <div class="mt-5 pt-4" data-aos="fade-up">
            <div class="d-flex align-items-center gap-3 mb-4">
                <h3 class="fs-5 fw-700 mb-0">
                    <i class="bi bi-inbox-fill me-2 text-gradient"></i>
                    Submitted Work
                </h3>
                <span class="tag-badge"><?= count($submittedCards) ?> submission<?= count($submittedCards) > 1 ? 's' : '' ?></span>
            </div>
            <div class="row gy-4">
                <?php foreach ($submittedCards as $i => $card): ?>
                <div class="col-sm-6 col-xl-4" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 100 ?>">
                    <article class="project-card h-100">
                        <div class="project-card__img-wrap">
                            <img src="<?= e($card['image']) ?>"
                                 alt="<?= e($card['title']) ?>"
                                 class="project-card__img"
                                 loading="lazy"
                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                            <div class="project-card__img-fallback" style="display:none" aria-hidden="true">
                                <i class="bi bi-image"></i>
                            </div>
                            <div class="project-card__overlay">
                                <span class="project-category-badge" style="background:rgba(6,182,212,.7)">Submitted</span>
                            </div>
                        </div>
                        <div class="project-card__body">
                            <h3 class="project-card__title"><?= e($card['title']) ?></h3>
                            <?php if ($card['desc']): ?>
                            <p class="project-card__desc"><?= e($card['desc']) ?></p>
                            <?php endif; ?>
                            <div class="d-flex align-items-center gap-2 mt-auto pt-2">
                                <i class="bi bi-person-fill" style="color:var(--accent-2);font-size:.85rem"></i>
                                <span style="font-size:.8rem;color:var(--text-muted)"><?= e($card['from']) ?></span>
                                <?php if ($card['date']): ?>
                                <span class="ms-auto" style="font-size:.75rem;color:var(--text-muted)"><?= e($card['date']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<!-- ─────────────────────────────────────────────
     Project Detail Modals
     ───────────────────────────────────────────── -->
<?php foreach ($projects as $project): ?>
<div class="modal fade project-modal" id="modal-<?= e($project['id']) ?>"
     tabindex="-1"
     aria-labelledby="modal-<?= e($project['id']) ?>-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <span class="modal-category"><?= e($project['category']) ?></span>
                    <h2 class="modal-title" id="modal-<?= e($project['id']) ?>-label">
                        <?= e($project['title']) ?>
                    </h2>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="modal-long-desc"><?= e($project['long_desc']) ?></p>

                <h3 class="modal-sub-heading">Technologies Used</h3>
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <?php foreach ($project['tags'] as $tag): echo badge($tag); endforeach; ?>
                </div>
            </div>

            <div class="modal-footer">
                <a href="<?= e($project['github']) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-github me-2" aria-hidden="true"></i>View on GitHub
                </a>
                <?php if ($project['demo'] !== '#'): ?>
                <a href="<?= e($project['demo']) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Live Demo
                </a>
                <?php endif; ?>
                <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>
