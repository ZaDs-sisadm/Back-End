<?php include('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Notes App</title>
</head>
<body>
<div class="container" id="notes-container">
    <?php
    $notes = getNotes();
    foreach ($notes as $note) {
        echo "<div class='note' data-id='{$note['id']}'>";
        echo "<h2>{$note['title']}</h2>";
        echo "<p>{$note['content']}</p>";
        echo "<button class='edit-btn'>Edit</button>";
        echo "<button class='delete-btn'>Delete</button>";
        echo "</div>";
    }
    ?>
</div>

<form id="note-form">
    <input type="text" id="title" placeholder="Title" required>
    <textarea id="content" placeholder="Content" required></textarea>
    <button type="submit">Add Note</button>
</form>

<script src="script.js"></script>
</body>
</html>
