<?php
// ─────────────────────────────────────────────
// Contact Form Handler
// ─────────────────────────────────────────────

$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors     = [];
$attachment = null;

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

// --- File Upload (optional) ---
if (empty($errors) && isset($_FILES['attachment']) && $_FILES['attachment']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file      = $_FILES['attachment'];
    $maxSize   = 5 * 1024 * 1024; // 5 MB
    $imgTypes  = ['jpg','jpeg','png','gif','webp'];
    $allTypes  = array_merge($imgTypes, ['pdf','doc','docx','zip','txt']);
    $ext       = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $isImage   = in_array($ext, $imgTypes);

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'File upload failed. Please try again.';
    } elseif ($file['size'] > $maxSize) {
        $errors[] = 'Attachment must be under 5 MB.';
    } elseif (!in_array($ext, $allTypes)) {
        $errors[] = 'File type not allowed. Allowed: ' . implode(', ', $allTypes);
    } else {
        $safeName  = uniqid('attach_', true) . '.' . $ext;
        $webPath   = null;

        // Images → save to public/assets/uploads/ so they can be shown on the site
        if ($isImage) {
            $uploadDir = PUBLIC_PATH . '/assets/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $dest = $uploadDir . $safeName;
            if (move_uploaded_file($file['tmp_name'], $dest)) {
                $webPath = '/assets/uploads/' . $safeName;
            } else {
                $errors[] = 'Could not save the attachment. Please try again.';
            }
        } else {
            // Non-images → save to storage/attachments/
            $uploadDir = STORAGE_PATH . '/attachments/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $dest = $uploadDir . $safeName;
            if (!move_uploaded_file($file['tmp_name'], $dest)) {
                $errors[] = 'Could not save the attachment. Please try again.';
            }
        }

        if (empty($errors)) {
            $attachment = [
                'original' => $file['name'],
                'saved'    => $safeName,
                'size'     => $file['size'],
                'mime'     => $file['type'],
                'is_image' => $isImage,
                'web_path' => $webPath,   // only set for images
            ];
        }
    }
}

if (empty($errors)) {
    $displayName = $name ?: 'Anonymous';

    saveMessage([
        'name'       => $displayName,
        'email'      => $email,
        'subject'    => $subject,
        'message'    => $message,
        'attachment' => $attachment,
    ]);

    // Email notification
    $to      = SITE['email'];
    $headers = implode("\r\n", [
        'From: ' . $displayName . ' <' . $email . '>',
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . PHP_VERSION,
        'Content-Type: text/plain; charset=UTF-8',
    ]);
    $body  = "Name: {$displayName}\nEmail: {$email}\nSubject: {$subject}\n\nMessage:\n{$message}\n";
    if ($attachment) {
        $body .= "\nAttachment: " . $attachment['original'];
        if ($attachment['web_path']) $body .= " (shown in projects)";
        $body .= "\n";
    }
    @mail($to, '[Portfolio] ' . $subject, $body, $headers);

    $successMsg = 'Thanks' . ($name ? ", {$name}" : '') . '! Your message has been received. I\'ll be in touch soon.';
    if ($attachment && $attachment['is_image']) {
        $successMsg .= ' Your image will appear in the Featured section ✓';
    } elseif ($attachment) {
        $successMsg .= ' (Attachment received ✓)';
    }

    $_SESSION['flash'] = ['message' => $successMsg, 'error' => false];
} else {
    $_SESSION['flash'] = ['message' => implode(' ', $errors), 'error' => true];
}

header('Location: ' . $_SERVER['REQUEST_URI'] . '#contact');
exit;
