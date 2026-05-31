<?php $projects = PROJECTS; ?>
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

            <div class="modal-footer d-flex flex-column flex-sm-row gap-2">
                <a href="<?= e($project['github']) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-outline-secondary w-100 w-sm-auto d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-github me-2" aria-hidden="true"></i>View on GitHub
                </a>
                <?php if ($project['demo'] !== '#'): ?>
                <a href="<?= e($project['demo']) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-primary w-100 w-sm-auto d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Live Demo
                </a>
                <?php endif; ?>
                <button type="button" class="btn btn-ghost w-100 w-sm-auto justify-content-center" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>
