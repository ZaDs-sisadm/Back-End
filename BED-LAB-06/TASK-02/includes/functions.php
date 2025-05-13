<?php
include('db.php');

function getNotes() {
    global $conn;
    $query = "SELECT * FROM notes ORDER BY created_at DESC";
    $result = $conn->query($query);

    $notes = array();
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row;
    }

    return $notes;
}

function addNote($title, $content) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    $query = "INSERT INTO notes (title, content) VALUES ('$title', '$content')";
    $conn->query($query);
}

function updateNote($id, $title, $content) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    $query = "UPDATE notes SET title='$title', content='$content' WHERE id=$id";
    $conn->query($query);
}

function deleteNote($id) {
    global $conn;
    $query = "DELETE FROM notes WHERE id=$id";
    $conn->query($query);
}

