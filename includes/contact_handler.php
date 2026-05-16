<?php
// ─────────────────────────────────────────────
// Contact Form Handler
// ─────────────────────────────────────────────
// Included by index.php only on POST requests.
// ─────────────────────────────────────────────

$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

// --- Validation ---
if (mb_strlen($name) < 2) {
    $errors[] = 'Please enter your full name (min 2 characters).';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}
if (mb_strlen($subject) < 3) {
    $errors[] = 'Subject must be at least 3 characters.';
}
if (mb_strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters.';
}

if (empty($errors)) {
    // ── Save to storage first (always) ──────────────────────
    saveMessage([
        'name'    => $name,
        'email'   => $email,
        'subject' => $subject,
        'message' => $message,
    ]);

    // ── Also attempt to send email ───────────────────────────
    $to      = SITE['email'];
    $headers = implode("\r\n", [
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . PHP_VERSION,
        'Content-Type: text/plain; charset=UTF-8',
    ]);

    $body  = "Name: {$name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Subject: {$subject}\n\n";
    $body .= "Message:\n{$message}\n";

    @mail($to, '[Portfolio] ' . $subject, $body, $headers);

    $_SESSION['flash'] = [
        'message' => "Thanks {$name}! Your message has been received. I'll be in touch soon.",
        'error'   => false,
    ];
} else {
    $_SESSION['flash'] = [
        'message' => implode(' ', $errors),
        'error'   => true,
    ];
}

// PRG pattern — redirect to avoid form re-submission
header('Location: ' . $_SERVER['REQUEST_URI'] . '#contact');
exit;
