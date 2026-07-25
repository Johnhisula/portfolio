<?php
require_once dirname(__DIR__, 2) . '/includes/admin/auth.php';
require_once INCLUDES_PATH . '/admin/layout.php';
requireAuth();

// Handle actions
$flash = '';
$flashType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id     = $_POST['id'] ?? '';

    if ($action === 'delete' && $id) {
        deleteMessage($id);
        $flash = 'Message deleted.';
    } elseif ($action === 'mark_read' && $id) {
        markMessageRead($id);
        $flash = 'Message marked as read.';
    }
}

// Mark read via GET (from dashboard click)
if (!empty($_GET['read'])) {
    markMessageRead($_GET['read']);
}

$messages   = getAllMessages();
$msgStats   = getMessageStats();
$viewMsg    = null;

// View single message
if (!empty($_GET['view'])) {
    foreach ($messages as $m) {
        if ($m['id'] === $_GET['view']) {
            $viewMsg = $m;
            markMessageRead($m['id']);
            break;
        }
    }
}

adminHeader('Messages', 'messages');
?>

<!-- Flash -->
<?php if ($flash): ?>
<div class="alert alert-<?= $flashType ?> alert-dismissible fade show mb-4" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i><?= e($flash) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<!-- Stats Row -->
<div class="row g-3 mb-4">
    <div class="col-4">
        <div class="mini-stat">
            <span class="mini-stat__num"><?= $msgStats['total'] ?></span>
            <span class="mini-stat__label">Total</span>
        </div>
    </div>
    <div class="col-4">
        <div class="mini-stat mini-stat--accent">
            <span class="mini-stat__num"><?= $msgStats['unread'] ?></span>
            <span class="mini-stat__label">Unread</span>
        </div>
    </div>
    <div class="col-4">
        <div class="mini-stat mini-stat--green">
            <span class="mini-stat__num"><?= $msgStats['today'] ?></span>
            <span class="mini-stat__label">Today</span>
        </div>
    </div>
</div>

<div class="row g-4">

    <!-- Message List -->
    <div class="col-lg-5">
        <div class="admin-card h-100">
            <div class="admin-card__header">
                <h2 class="admin-card__title">
                    <i class="bi bi-inbox-fill me-2"></i>Inbox
                </h2>
            </div>
            <div class="admin-card__body p-0">
                <?php if (empty($messages)): ?>
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>Your inbox is empty.</p>
                </div>
                <?php else: ?>
                <div class="msg-list">
                    <?php foreach ($messages as $msg): ?>
                    <a href="/admin/messages.php?view=<?= e($msg['id']) ?>"
                       class="msg-row <?= !$msg['read'] ? 'msg-row--unread' : '' ?>
                              <?= (isset($viewMsg['id']) && $viewMsg['id'] === $msg['id']) ? 'msg-row--active' : '' ?>">
                        <div class="msg-avatar"><?= e(mb_strtoupper(mb_substr($msg['name'], 0, 1))) ?></div>
                        <div class="msg-info">
                            <span class="msg-name"><?= e($msg['name']) ?></span>
                            <span class="msg-subject"><?= e($msg['subject']) ?></span>
                        </div>
                        <div class="msg-meta">
                            <span class="msg-date"><?= date('M d', strtotime($msg['date'])) ?></span>
                            <?php if (!$msg['read']): ?>
                            <span class="msg-unread-dot"></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Message Detail -->
    <div class="col-lg-7">
        <div class="admin-card h-100">
            <?php if ($viewMsg): ?>
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title mb-1"><?= e($viewMsg['subject']) ?></h2>
                    <p class="text-muted small mb-0">
                        From <strong><?= e($viewMsg['name']) ?></strong>
                        &lt;<a href="mailto:<?= e($viewMsg['email']) ?>"><?= e($viewMsg['email']) ?></a>&gt;
                        · <?= date('D, d M Y H:i', strtotime($viewMsg['date'])) ?>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="mailto:<?= e($viewMsg['email']) ?>?subject=Re: <?= e($viewMsg['subject']) ?>"
                       class="btn btn-sm btn-outline-accent">
                        <i class="bi bi-reply-fill me-1"></i>Reply
                    </a>
                    <form method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= e($viewMsg['id']) ?>">
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Delete this message?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="admin-card__body">
                <div class="msg-detail-body">
                    <?= nl2br(e($viewMsg['message'])) ?>
                </div>
            </div>
            <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-chat-square-text"></i>
                <p>Select a message to read it.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php adminFooter(); ?>
