<?php
// ─────────────────────────────────────────────
// Contact Form Handler
// ─────────────────────────────────────────────

$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

// --- Validation ---
if ($name !== '' && mb_strlen($name) < 2) {
    $errors[] = 'If provided, name must be at least 2 characters.';
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
    $displayName = $name ?: 'Anonymous';

    saveMessage([
        'name'    => $displayName,
        'email'   => $email,
        'subject' => $subject,
        'message' => $message,
    ]);

    $to      = SITE['email'];
    $headers = implode("\r\n", [
        'From: ' . $displayName . ' <' . $email . '>',
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . PHP_VERSION,
        'Content-Type: text/plain; charset=UTF-8',
    ]);
    $body = "Name: {$displayName}\nEmail: {$email}\nSubject: {$subject}\n\nMessage:\n{$message}\n";
    @mail($to, '[Portfolio] ' . $subject, $body, $headers);

    $_SESSION['flash'] = [
        'message' => 'Thanks' . ($name ? ", {$name}" : '') . '! Your message has been received. I\'ll be in touch soon.',
        'error'   => false,
    ];
} else {
    $_SESSION['flash'] = ['message' => implode(' ', $errors), 'error' => true];
}

header('Location: ' . $_SERVER['REQUEST_URI'] . '#contact');
exit;
