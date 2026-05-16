<?php
// ─────────────────────────────────────────────
// JSON File-based Message Store
// ─────────────────────────────────────────────

function getMessagesFile(): string
{
    $dir = STORAGE_PATH;
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return $dir . '/messages.json';
}

function getAllMessages(): array
{
    $file = getMessagesFile();
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? array_reverse($data) : [];
}

function saveMessage(array $msg): void
{
    $file     = getMessagesFile();
    $messages = file_exists($file)
        ? (json_decode(file_get_contents($file), true) ?? [])
        : [];

    $msg['id']      = uniqid('msg_', true);
    $msg['date']    = date('Y-m-d H:i:s');
    $msg['read']    = false;
    $messages[]     = $msg;

    file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT), LOCK_EX);
}

function markMessageRead(string $id): void
{
    $file     = getMessagesFile();
    $messages = json_decode(file_get_contents($file), true) ?? [];
    foreach ($messages as &$msg) {
        if ($msg['id'] === $id) {
            $msg['read'] = true;
            break;
        }
    }
    file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT), LOCK_EX);
}

function deleteMessage(string $id): void
{
    $file     = getMessagesFile();
    $messages = json_decode(file_get_contents($file), true) ?? [];
    $messages = array_values(array_filter($messages, fn($m) => $m['id'] !== $id));
    file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT), LOCK_EX);
}

function countUnreadMessages(): int
{
    return count(array_filter(getAllMessages(), fn($m) => !$m['read']));
}

function getMessageStats(): array
{
    $all = getAllMessages();
    return [
        'total'  => count($all),
        'unread' => count(array_filter($all, fn($m) => !$m['read'])),
        'today'  => count(array_filter($all, fn($m) => str_starts_with($m['date'], date('Y-m-d')))),
    ];
}
