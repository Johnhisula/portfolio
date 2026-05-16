<?php
/**
 * Admin Layout Helper
 * Call adminHeader($title, $activePage) at the top of each admin page.
 * Call adminFooter() at the bottom.
 */
function adminHeader(string $title, string $activePage = 'dashboard'): void
{
    $site    = SITE;
    $unread  = countUnreadMessages();
    $navItems = [
        'dashboard' => ['icon' => 'bi-speedometer2',  'label' => 'Dashboard',   'href' => '/admin/index.php'],
        'messages'  => ['icon' => 'bi-envelope-fill', 'label' => 'Messages',    'href' => '/admin/messages.php'],
        'projects'  => ['icon' => 'bi-grid-3x3-gap-fill','label'=>'Projects',   'href' => '/admin/projects.php'],
    ];
    ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title) ?> — Admin · <?= e($site['name']) ?></title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
<div class="admin-wrapper">

    <!-- ── Sidebar ─────────────────────────────── -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <span class="brand-avatar"><?= e(initials($site['name'])) ?></span>
                <div class="sidebar-brand-text">
                    <span class="sidebar-brand-name"><?= e($site['name']) ?></span>
                    <span class="sidebar-brand-role">Admin Panel</span>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav" aria-label="Admin navigation">
            <ul class="sidebar-menu list-unstyled">
                <?php foreach ($navItems as $key => $item): ?>
                <li>
                    <a href="<?= e($item['href']) ?>"
                       class="sidebar-link <?= $activePage === $key ? 'active' : '' ?>">
                        <i class="bi <?= e($item['icon']) ?>" aria-hidden="true"></i>
                        <span><?= e($item['label']) ?></span>
                        <?php if ($key === 'messages' && $unread > 0): ?>
                        <span class="sidebar-badge"><?= $unread ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="sidebar-divider"></div>

            <ul class="sidebar-menu list-unstyled">
                <li>
                    <a href="/" class="sidebar-link" target="_blank">
                        <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                        <span>View Site</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/logout.php" class="sidebar-link sidebar-link--danger">
                        <i class="bi bi-power" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <i class="bi bi-clock me-1" aria-hidden="true"></i>
            <?= date('D, d M Y') ?>
        </div>
    </aside>

    <!-- ── Main Content ─────────────────────────── -->
    <div class="admin-main">

        <!-- Topbar -->
        <header class="admin-topbar">
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                <i class="bi bi-list" aria-hidden="true"></i>
            </button>
            <h1 class="topbar-title"><?= e($title) ?></h1>
            <div class="topbar-actions">
                <a href="/admin/messages.php" class="topbar-icon-btn" aria-label="Messages">
                    <i class="bi bi-envelope" aria-hidden="true"></i>
                    <?php if ($unread > 0): ?>
                    <span class="topbar-badge"><?= $unread ?></span>
                    <?php endif; ?>
                </a>
                <div class="topbar-user">
                    <span class="brand-avatar brand-avatar--sm"><?= e(initials($site['name'])) ?></span>
                    <span><?= e(ADMIN_USERNAME) ?></span>
                </div>
            </div>
        </header>

        <!-- Page content -->
        <div class="admin-content">
    <?php
}

function adminFooter(): void
{
    ?>
        </div><!-- .admin-content -->
    </div><!-- .admin-main -->
</div><!-- .admin-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Sidebar toggle for mobile
document.getElementById('sidebarToggle')?.addEventListener('click', () => {
    document.getElementById('adminSidebar')?.classList.toggle('open');
});
</script>
</body>
</html>
    <?php
}
