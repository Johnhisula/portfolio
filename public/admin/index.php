<?php
require_once dirname(__DIR__, 2) . '/includes/admin/auth.php';
require_once INCLUDES_PATH . '/admin/layout.php';
requireAuth();

// ── Stats ───────────────────────────────────────────────────
$msgStats   = getMessageStats();
$projects   = PROJECTS;
$certs      = CERTIFICATES;
$skills     = SKILLS;
$skillCount = array_sum(array_map('count', $skills));
$recentMsgs = array_slice(getAllMessages(), 0, 5);

adminHeader('Dashboard', 'dashboard');
?>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card stat-card--purple">
        <div class="stat-card__icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
        <div class="stat-card__body">
            <span class="stat-card__num"><?= count($projects) ?></span>
            <span class="stat-card__label">Projects</span>
        </div>
        <div class="stat-card__bg-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
    </div>
    <div class="stat-card stat-card--cyan">
        <div class="stat-card__icon"><i class="bi bi-patch-check-fill"></i></div>
        <div class="stat-card__body">
            <span class="stat-card__num"><?= count($certs) ?></span>
            <span class="stat-card__label">Certificates</span>
        </div>
        <div class="stat-card__bg-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
    <div class="stat-card stat-card--green">
        <div class="stat-card__icon"><i class="bi bi-envelope-fill"></i></div>
        <div class="stat-card__body">
            <span class="stat-card__num"><?= $msgStats['total'] ?></span>
            <span class="stat-card__label">Total Messages</span>
            <?php if ($msgStats['unread'] > 0): ?>
            <span class="stat-card__sub"><?= $msgStats['unread'] ?> unread</span>
            <?php endif; ?>
        </div>
        <div class="stat-card__bg-icon"><i class="bi bi-envelope-fill"></i></div>
    </div>
    <div class="stat-card stat-card--orange">
        <div class="stat-card__icon"><i class="bi bi-braces"></i></div>
        <div class="stat-card__body">
            <span class="stat-card__num"><?= $skillCount ?></span>
            <span class="stat-card__label">Skills Listed</span>
        </div>
        <div class="stat-card__bg-icon"><i class="bi bi-braces"></i></div>
    </div>
</div>

<!-- Content Row -->
<div class="row g-4 mt-1">

    <!-- Recent Messages -->
    <div class="col-lg-7">
        <div class="admin-card h-100">
            <div class="admin-card__header">
                <h2 class="admin-card__title">
                    <i class="bi bi-envelope me-2" aria-hidden="true"></i>Recent Messages
                </h2>
                <a href="/admin/messages.php" class="btn btn-sm btn-outline-accent">View All</a>
            </div>
            <div class="admin-card__body p-0">
                <?php if (empty($recentMsgs)): ?>
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>No messages yet.<br>They'll appear here once someone submits the contact form.</p>
                </div>
                <?php else: ?>
                <div class="msg-list">
                    <?php foreach ($recentMsgs as $msg): ?>
                    <a href="/admin/messages.php?read=<?= e($msg['id']) ?>"
                       class="msg-row <?= !$msg['read'] ? 'msg-row--unread' : '' ?>">
                        <div class="msg-avatar"><?= e(mb_strtoupper(mb_substr($msg['name'], 0, 1))) ?></div>
                        <div class="msg-info">
                            <span class="msg-name"><?= e($msg['name']) ?></span>
                            <span class="msg-subject"><?= e($msg['subject']) ?></span>
                        </div>
                        <div class="msg-meta">
                            <span class="msg-date"><?= date('M d', strtotime($msg['date'])) ?></span>
                            <?php if (!$msg['read']): ?>
                            <span class="msg-unread-dot" aria-label="Unread"></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Quick Info -->
    <div class="col-lg-5">
        <!-- Skills Breakdown -->
        <div class="admin-card mb-4">
            <div class="admin-card__header">
                <h2 class="admin-card__title">
                    <i class="bi bi-bar-chart-fill me-2" aria-hidden="true"></i>Skills Breakdown
                </h2>
            </div>
            <div class="admin-card__body">
                <?php foreach ($skills as $cat => $items): ?>
                <div class="skill-mini mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="skill-mini__label"><?= e($cat) ?></span>
                        <span class="skill-mini__count"><?= count($items) ?> skills</span>
                    </div>
                    <div class="skill-mini__bar">
                        <div class="skill-mini__fill"
                             style="width:<?= round(count($items) / $skillCount * 100) ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="admin-card">
            <div class="admin-card__header">
                <h2 class="admin-card__title">
                    <i class="bi bi-lightning-fill me-2" aria-hidden="true"></i>Quick Actions
                </h2>
            </div>
            <div class="admin-card__body">
                <div class="quick-links">
                    <a href="/" target="_blank" class="quick-link">
                        <i class="bi bi-eye-fill"></i> View Live Site
                    </a>
                    <a href="/admin/messages.php" class="quick-link">
                        <i class="bi bi-envelope-fill"></i> Check Messages
                        <?php if ($msgStats['unread']): ?>
                        <span class="badge bg-danger ms-auto"><?= $msgStats['unread'] ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="/admin/projects.php" class="quick-link">
                        <i class="bi bi-grid-3x3-gap-fill"></i> Manage Projects
                    </a>
                    <a href="/admin/logout.php" class="quick-link quick-link--danger">
                        <i class="bi bi-power"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php adminFooter(); ?>
