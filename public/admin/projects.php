<?php
require_once dirname(__DIR__, 2) . '/includes/admin/auth.php';
require_once INCLUDES_PATH . '/admin/layout.php';
requireAuth();

$projects = PROJECTS;

adminHeader('Projects', 'projects');
?>

<div class="admin-card">
    <div class="admin-card__header">
        <h2 class="admin-card__title">
            <i class="bi bi-grid-3x3-gap-fill me-2"></i>All Projects
            <span class="admin-count-badge"><?= count($projects) ?></span>
        </h2>
        <div class="text-muted small">
            Edit project data in <code>includes/config.php</code>
        </div>
    </div>
    <div class="admin-card__body p-0">
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Links</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $i => $proj): ?>
                    <tr>
                        <td class="table-idx"><?= $i + 1 ?></td>
                        <td>
                            <strong><?= e($proj['title']) ?></strong>
                            <p class="table-desc"><?= e(mb_substr($proj['description'], 0, 80)) ?>…</p>
                        </td>
                        <td>
                            <span class="table-badge"><?= e($proj['category']) ?></span>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <?php foreach (array_slice($proj['tags'], 0, 3) as $tag): ?>
                                <span class="tag-chip"><?= e($tag) ?></span>
                                <?php endforeach; ?>
                                <?php if (count($proj['tags']) > 3): ?>
                                <span class="tag-chip tag-chip--more">+<?= count($proj['tags']) - 3 ?></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?= e($proj['github']) ?>" target="_blank"
                                   class="table-icon-btn" aria-label="GitHub">
                                    <i class="bi bi-github"></i>
                                </a>
                                <?php if ($proj['demo'] !== '#'): ?>
                                <a href="<?= e($proj['demo']) ?>" target="_blank"
                                   class="table-icon-btn" aria-label="Demo">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Info notice -->
<div class="admin-info-box mt-4">
    <i class="bi bi-info-circle-fill me-2"></i>
    <div>
        <strong>How to edit projects:</strong>
        Open <code>includes/config.php</code> and update the <code>PROJECTS</code> array.
        Each entry supports: <code>title</code>, <code>category</code>, <code>description</code>,
        <code>tags</code>, <code>image</code>, <code>github</code>, <code>demo</code>, <code>long_desc</code>.
    </div>
</div>

<?php adminFooter(); ?>
