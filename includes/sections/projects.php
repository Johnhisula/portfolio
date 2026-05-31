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

