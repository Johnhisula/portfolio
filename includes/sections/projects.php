<?php $projects = PROJECTS; ?>
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
