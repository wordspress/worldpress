<?php
$file = 'submissions.txt';
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Submissions</title>
    <style>
        body { font-family: sans-serif; padding: 30px; background: #f9f9f9; }
        pre { background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px; max-width: 800px; }
    </style>
</head>
<body>
    <h2>Recorded Submissions</h2>
    <pre><?php 
        if (file_exists($file)) {
            echo htmlspecialchars(file_get_contents($file));
        } else {
            echo "No submissions recorded yet.";
        }
    ?></pre>
</body>
</html>
